<?php

declare(strict_types=1);

$model = simplexml_load_file(__DIR__ . '/../br-monitoring/datamodel.br-monitoring.xml', SimpleXMLElement::class, LIBXML_NONET);
if ($model === false) {
    throw new RuntimeException('Cannot load the monitoring data model.');
}
$nodes = static function (string $path) use ($model): array {
    $result = $model->xpath($path);
    if ($result === false || $result === []) {
        throw new RuntimeException('Missing model definition: ' . $path);
    }
    return $result;
};
$value = static function (string $path) use ($nodes): string {
    $result = $nodes($path);
    if (count($result) !== 1) {
        throw new RuntimeException('Ambiguous model definition: ' . $path);
    }
    return trim((string) $result[0]);
};
$equal = static function ($actual, $expected): void {
    if ($actual !== $expected) {
        throw new RuntimeException('Expected ' . var_export($expected, true) . ', got ' . var_export($actual, true));
    }
};
$class = '/itop_design/classes/class';

// Capture the actual module and dictionary registrations without loading iTop.
class SetupWebPage
{
    public static array $modules = [];
    public static function AddModule(string $file, string $id, array $definition): void
    {
        self::$modules[$id] = $definition;
    }
}
class Dict
{
    public static array $entries = [];
    public static function Add(string $locale, string $language, string $label, array $entries): void
    {
        self::$entries[$locale] = array_merge(self::$entries[$locale] ?? [], $entries);
    }
}
require __DIR__ . '/../br-monitoring/module.br-monitoring.php';
require __DIR__ . '/../br-monitoring/dictionaries/de.dict.br-monitoring.php';
require __DIR__ . '/../br-monitoring/dictionaries/en.dict.br-monitoring.php';

return [
    'monitoring classes retain their inheritance and concrete types' => static function () use ($value, $equal, $class): void {
        foreach (['MonitoringDevice' => ['FunctionalCI', 'true'], 'MonitoringCore' => ['MonitoringDevice', 'false'], 'MonitoringProbe' => ['MonitoringDevice', 'false']] as $id => [$parent, $abstract]) {
            $equal($value("{$class}[@id='$id']/parent"), $parent);
            $equal($value("{$class}[@id='$id']/properties/abstract"), $abstract);
            $equal($value("{$class}[@id='$id']/properties/obsolescence/condition"), $id === 'MonitoringProbe' ? "status='obsolete'" : "status = 'obsolete'");
        }
    },
    'core and probe assignments have matching reverse links' => static function () use ($value, $equal, $class): void {
        foreach ([['MonitoringCore', 'monitoringprobe_list', 'MonitoringProbe', 'monitoringcore_id'], ['MonitoringProbe', 'functionalci_list', 'FunctionalCI', 'monitoringprobe_id']] as [$owner, $list, $target, $key]) {
            $equal($value("{$class}[@id='$owner']/fields/field[@id='$list']/linked_class"), $target);
            $equal($value("{$class}[@id='$owner']/fields/field[@id='$list']/ext_key_to_me"), $key);
            $equal($value("{$class}[@id='$target']/fields/field[@id='$key']/target_class"), $owner);
            $equal($value("{$class}[@id='$target']/fields/field[@id='$key']/on_target_delete"), 'DEL_MANUAL');
        }
    },
    'monitoring hosts and IPs use the intended selection filters' => static function () use ($value, $equal, $class): void {
        $host = "{$class}[@id='MonitoringDevice']/fields/field[@id='functionalci_id']";
        $equal($value("$host/target_class"), 'FunctionalCI');
        $equal($value("$host/is_null_allowed"), 'false');
        $equal($value("$host/filter"), "SELECT FunctionalCI AS F WHERE (F.org_id = :this->org_id AND ( F.finalclass = 'Server' OR F.finalclass = 'VirtualMachine' ))");
        $equal($value("$host/dependencies/attribute/@id"), 'org_id');
        $ip = "{$class}[@id='FunctionalCI']/fields/field[@id='monitoringip_id']";
        $equal($value("$ip/target_class"), 'IPAddress');
        $equal($value("$ip/filter"), "SELECT IPAddress AS ip WHERE ip.status = 'allocated'");
    },
    'CIs and interfaces expose consistent monitoring implementation states' => static function () use ($nodes, $value, $equal, $class): void {
        foreach (['FunctionalCI', 'NetworkInterface'] as $id) {
            $field = "{$class}[@id='$id']/fields/field[@id='monitoringstatus']";
            $equal(array_map('strval', $nodes("$field/values/value/code")), ['unknown', 'implemented', 'required', 'unnecessary']);
            $equal($value("$field/default_value"), 'unknown');
            $equal($value("$field/is_null_allowed"), 'false');
            $equal($value("{$class}[@id='$id']/fields/field[@id='monitoringparameter']/is_null_allowed"), 'true');
        }
    },
    'monitoring fields remain accessible in supported device forms' => static function () use ($nodes, $class): void {
        foreach (['Server', 'VirtualMachine', 'NetworkDevice', 'ApplicationSolution'] as $id) {
            foreach (['monitoringstatus', 'monitoringparameter', 'monitoringprobe_id', 'monitoringip_id'] as $field) {
                $nodes("{$class}[@id='$id']/presentation/details//item[@id='$field']");
            }
        }
        foreach (['DBServer', 'Middleware', 'OtherSoftware', 'WebServer', 'WebApplication', 'AggregateLink', 'PhysicalInterface'] as $id) {
            foreach (['monitoringstatus', 'monitoringparameter'] as $field) {
                $nodes("{$class}[@id='$id']/presentation/details//item[@id='$field']");
            }
        }
    },
    'dashboard exposes core and probe entries' => static function () use ($nodes, $equal): void {
        $equal(array_map('strval', $nodes('/itop_design/menus/menu/definition/cells/cell/dashlets/dashlet/class')), ['MonitoringCore', 'MonitoringProbe']);
    },
    'German and English dictionaries cover monitoring attributes and states' => static function () use ($nodes, $equal, $class): void {
        $english = Dict::$entries['EN US'];
        $german = Dict::$entries['DE DE'];
        $enKeys = array_keys($english);
        $deKeys = array_keys($german);
        sort($enKeys);
        sort($deKeys);
        $equal($enKeys, $deKeys);
        foreach (['FunctionalCI', 'NetworkInterface'] as $id) {
            foreach (['monitoringstatus', 'monitoringparameter'] as $field) {
                if (empty($english["Class:$id/Attribute:$field"]) || empty($german["Class:$id/Attribute:$field"])) {
                    throw new RuntimeException("Missing translation for $id/$field");
                }
            }
            foreach ($nodes("{$class}[@id='$id']/fields/field[@id='monitoringstatus']/values/value/code") as $state) {
                $key = "Class:$id/Attribute:monitoringstatus/Value:$state";
                if (empty($english[$key]) || empty($german[$key])) {
                    throw new RuntimeException('Missing state translation: ' . $key);
                }
            }
        }
    },
    'module registration matches manifest and required integrations' => static function () use ($equal): void {
        $manifest = simplexml_load_file(__DIR__ . '/../extension.xml');
        $equal(array_keys(SetupWebPage::$modules), ['br-monitoring/' . trim((string) $manifest->version)]);
        $module = reset(SetupWebPage::$modules);
        $equal($module['dependencies'], ['itop-config-mgmt/3.2.0', 'itop-datacenter-mgmt/3.2.0', 'itop-virtualization-mgmt/3.2.0', 'teemip-network-mgmt-extended/3.2.0']);
        $equal($module['mandatory'], false);
        $equal($module['visible'], true);
        $equal($module['label'], trim((string) $manifest->label));
    },
];

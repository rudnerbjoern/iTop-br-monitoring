<?php

/**
 * @copyright   Copyright (C) 2021 Björn Rudner
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 * @version     2021-06-15
 *
 * Localized data
 */

Dict::Add('DE DE', 'German', 'Deutsch', array(
    // Dictionary entries go here
    'Class:FunctionalCI/Attribute:monitoringstatus' => 'Monitoring Status',
    'Class:FunctionalCI/Attribute:monitoringstatus+' => 'Status der Implementierung der Überwachung',
    'Class:FunctionalCI/Attribute:monitoringstatus/Value:unknown' => 'unbekannt',
    'Class:FunctionalCI/Attribute:monitoringstatus/Value:unknown+' => 'unbekannt',
    'Class:FunctionalCI/Attribute:monitoringstatus/Value:implemented' => 'implementiert',
    'Class:FunctionalCI/Attribute:monitoringstatus/Value:implemented+' => 'Eine Überwachung ist implementiert',
    'Class:FunctionalCI/Attribute:monitoringstatus/Value:required' => 'erforderlich',
    'Class:FunctionalCI/Attribute:monitoringstatus/Value:required+' => 'Eine Überwachung ist erforderlich',
    'Class:FunctionalCI/Attribute:monitoringstatus/Value:unnecessary' => 'unnötig',
    'Class:FunctionalCI/Attribute:monitoringstatus/Value:unnecessary+' => 'Eine Überwachung ist nicht erforderlich',
    'Class:FunctionalCI/Attribute:monitoringcore_id' => 'Monitoring Core',
    'Class:FunctionalCI/Attribute:monitoringcore_id+' => 'Der Core-Server, dem dieses Gerät zugewiesen ist',
    'Class:FunctionalCI/Attribute:monitoringcore_id_friendlyname' => 'Monitoring Core',
    'Class:FunctionalCI/Attribute:monitoringprobe_id' => 'Monitoring Probe',
    'Class:FunctionalCI/Attribute:monitoringprobe_id+' => 'Der Probe-Server, dem dieses Gerät zugewiesen ist',
    'Class:FunctionalCI/Attribute:monitoringprobe_id_friendlyname' => 'Monitoring Probe',
    'Class:FunctionalCI/Attribute:monitoringip_id' => 'Monitoring IP',
    'Class:FunctionalCI/Attribute:monitoringip_id+' => 'IP-Adresse, die zur Überwachung dieses CIs verwendet werden soll.',
    'Class:FunctionalCI/Attribute:monitoringip_id_friendlyname' => 'Monitoring IP',
    'Class:MonitoringDevice' => 'Monitoring Gerät',
    'Class:MonitoringDevice+' => 'Ein Gerät, dass dazu verwendet wird, andere Geräte zu überwachen',
    'Class:MonitoringDevice/Attribute:functionalci_id' => 'Monitoring Server',
    'Class:MonitoringCore' => 'Monitoring Core',
    'Class:MonitoringCore+' => 'Der Core-Server zur Überwachung anderer Geräte',
    'Class:MonitoringCore/Attribute:monitoringprobe_list' => 'Monitoring Probes',
    'Class:MonitoringCore/Attribute:functionalci_list' => 'FunctionalCI Liste',
    'Class:MonitoringCore/Attribute:monitoringprobe_list' => 'Monitoring Probes',
    'Class:MonitoringProbe' => 'Monitoring Probe',
    'Class:MonitoringProbe+' => 'Der Probe-Server zur Überwachung anderer Geräte',
    'Class:MonitoringProbe/Attribute:functionalci_list' => 'FunctionalCI Liste',
    'Menu:ConfigManagement:Monitoring' => 'Systemüberwachung',
    'Menu:ConfigManagement:Monitoring+' => 'Systemüberwachung',
    'Server:monitoring' => 'Systemüberwachung',
));

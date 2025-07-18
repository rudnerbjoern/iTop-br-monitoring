<?php

/**
 * @copyright   Copyright (C) 2021-2025 Björn Rudner
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 * @version     2025-06-24
 *
 * Localized data
 */


/**
 *  Class: Menu, UI
 */

/** @disregard P1009 Undefined type Dict */
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Menu:ConfigManagement:Monitoring' => 'Systemüberwachung',
    'Menu:ConfigManagement:Monitoring+' => 'Systemüberwachung',
    'Server:monitoring' => 'Systemüberwachung',
));

/**
 *  Class: FunctionalCI
 */
/** @disregard P1009 Undefined type Dict */
Dict::Add('DE DE', 'German', 'Deutsch', array(
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
    'Class:FunctionalCI/Attribute:monitoringparameter' => 'Monitoring Parameter',
    'Class:FunctionalCI/Attribute:monitoringparameter+' => 'Parameter zur Verwendung innerhalb der Monitoring-Software',
    'Class:FunctionalCI/Attribute:monitoringprobe_id' => 'Monitoring Probe',
    'Class:FunctionalCI/Attribute:monitoringprobe_id+' => 'Der Probe-Server, dem dieses Gerät zugewiesen ist',
    'Class:FunctionalCI/Attribute:monitoringprobe_id_friendlyname' => 'Monitoring Probe',
    'Class:FunctionalCI/Attribute:monitoringip_id' => 'Monitoring IP',
    'Class:FunctionalCI/Attribute:monitoringip_id+' => 'IP-Adresse, die zur Überwachung dieses CIs verwendet werden soll (muss den Status \'Zugewiesen\' haben.',
    'Class:FunctionalCI/Attribute:monitoringip_id_friendlyname' => 'Monitoring IP',
));

/**
 *  Class: MonitoringDevice, MonitoringCore, MonitoringProbe
 */
/** @disregard P1009 Undefined type Dict */
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:MonitoringDevice' => 'Monitoring Gerät',
    'Class:MonitoringDevice+' => 'Ein Gerät, dass dazu verwendet wird, andere Geräte zu überwachen',
    'Class:MonitoringDevice/ComplementaryName' => 'Server: %1$s',
    'Class:MonitoringDevice/Attribute:functionalci_id' => 'Monitoring Server',
    'Class:MonitoringCore' => 'Monitoring Core',
    'Class:MonitoringCore+' => 'Der Core-Server zur Überwachung anderer Geräte',
    'Class:MonitoringCore/ComplementaryName' => 'Server: %1$s',
    'Class:MonitoringCore/Attribute:monitoringprobe_list' => 'Monitoring Probes',
    'Class:MonitoringProbe' => 'Monitoring Probe',
    'Class:MonitoringProbe+' => 'Der Probe-Server zur Überwachung anderer Geräte',
    'Class:MonitoringProbe/ComplementaryName' => 'Core: %1$s (%2$s)',
    'Class:MonitoringProbe/Attribute:monitoringcore_id' => 'Monitoring Core',
    'Class:MonitoringProbe/Attribute:monitoringcore_id+' => 'Der Core-Server, dem dieses Gerät zugewiesen ist',
    'Class:MonitoringProbe/Attribute:monitoringcore_id_friendlyname' => 'Monitoring Core',
    'Class:MonitoringProbe/Attribute:functionalci_list' => 'FunctionalCI Liste',
));

/**
 *  Class: NetworkInterface
 */
/** @disregard P1009 Undefined type Dict */
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:NetworkInterface/Attribute:monitoringstatus' => 'Monitoring Status',
    'Class:NetworkInterface/Attribute:monitoringstatus+' => 'Status der Implementierung der Überwachung',
    'Class:NetworkInterface/Attribute:monitoringstatus/Value:unknown' => 'unbekannt',
    'Class:NetworkInterface/Attribute:monitoringstatus/Value:unknown+' => 'unbekannt',
    'Class:NetworkInterface/Attribute:monitoringstatus/Value:implemented' => 'implementiert',
    'Class:NetworkInterface/Attribute:monitoringstatus/Value:implemented+' => 'Eine Überwachung ist implementiert',
    'Class:NetworkInterface/Attribute:monitoringstatus/Value:required' => 'erforderlich',
    'Class:NetworkInterface/Attribute:monitoringstatus/Value:required+' => 'Eine Überwachung ist erforderlich',
    'Class:NetworkInterface/Attribute:monitoringstatus/Value:unnecessary' => 'unnötig',
    'Class:NetworkInterface/Attribute:monitoringstatus/Value:unnecessary+' => 'Eine Überwachung ist nicht erforderlich',
    'Class:NetworkInterface/Attribute:monitoringparameter' => 'Monitoring Parameter',
    'Class:NetworkInterface/Attribute:monitoringparameter+' => 'Parameter zur Verwendung innerhalb der Monitoring-Software',
));

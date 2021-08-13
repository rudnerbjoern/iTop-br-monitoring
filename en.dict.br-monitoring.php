<?php

/**
 * @copyright   Copyright (C) 2021 Björn Rudner
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 * @version     2021-08-13
 *
 * Localized data
 */

Dict::Add('EN US', 'English', 'English', array(
    // Dictionary entries go here
    'Class:FunctionalCI/Attribute:monitoringstatus' => 'Monitoring status',
    'Class:FunctionalCI/Attribute:monitoringstatus+' => 'Status of the monitoring implementation',
    'Class:FunctionalCI/Attribute:monitoringstatus/Value:unknown' => 'unknown',
    'Class:FunctionalCI/Attribute:monitoringstatus/Value:unknown+' => 'Implementation status is unknown',
    'Class:FunctionalCI/Attribute:monitoringstatus/Value:implemented' => 'implemented',
    'Class:FunctionalCI/Attribute:monitoringstatus/Value:implemented+' => 'Monitoring is implemented',
    'Class:FunctionalCI/Attribute:monitoringstatus/Value:required' => 'required',
    'Class:FunctionalCI/Attribute:monitoringstatus/Value:required+' => 'Monitoring is required',
    'Class:FunctionalCI/Attribute:monitoringstatus/Value:unnecessary' => 'unnecessary',
    'Class:FunctionalCI/Attribute:monitoringstatus/Value:unnecessary+' => 'Monitoring is not necessary',
    'Class:FunctionalCI/Attribute:monitoringcore_id' => 'Monitoring Core',
    'Class:FunctionalCI/Attribute:monitoringcore_id+' => 'The monitoring core server this device is applied to',
    'Class:FunctionalCI/Attribute:monitoringcore_id_friendlyname' => 'Monitoring Core',
    'Class:FunctionalCI/Attribute:monitoringprobe_id' => 'Monitoring Probe',
    'Class:FunctionalCI/Attribute:monitoringprobe_id+' => 'The monitoring probe server this device is applied to',
    'Class:FunctionalCI/Attribute:monitoringprobe_id_friendlyname' => 'Monitoring Probe',
    'Class:FunctionalCI/Attribute:monitoringip_id' => 'Monitoring IP',
    'Class:FunctionalCI/Attribute:monitoringip_id+' => 'The IP address of this CI to be used for monitoring (must be of status \'assigned\').',
    'Class:FunctionalCI/Attribute:monitoringip_id_friendlyname' => 'Monitoring IP',
    'Class:NetworkInterface/Attribute:monitoringstatus' => 'Monitoring status',
    'Class:NetworkInterface/Attribute:monitoringstatus+' => 'Status of the monitoring implementation',
    'Class:NetworkInterface/Attribute:monitoringstatus/Value:unknown' => 'unknown',
    'Class:NetworkInterface/Attribute:monitoringstatus/Value:unknown+' => 'Implementation status is unknown',
    'Class:NetworkInterface/Attribute:monitoringstatus/Value:implemented' => 'implemented',
    'Class:NetworkInterface/Attribute:monitoringstatus/Value:implemented+' => 'Monitoring is implemented',
    'Class:NetworkInterface/Attribute:monitoringstatus/Value:required' => 'required',
    'Class:NetworkInterface/Attribute:monitoringstatus/Value:required+' => 'Monitoring is required',
    'Class:NetworkInterface/Attribute:monitoringstatus/Value:unnecessary' => 'unnecessary',
    'Class:NetworkInterface/Attribute:monitoringstatus/Value:unnecessary+' => 'Monitoring is not necessary',
    'Class:MonitoringDevice' => 'Monitoring Device',
    'Class:MonitoringDevice+' => 'The device (core or probe server) used to monitor other devices',
    'Class:MonitoringDevice/Attribute:functionalci_id' => 'Monitoring Server',
    'Class:MonitoringCore' => 'Monitoring Core',
    'Class:MonitoringCore+' => 'The core server used to monitor other devices',
    'Class:MonitoringCore/Attribute:monitoringprobe_list' => 'Monitoring Probes',
    'Class:MonitoringCore/Attribute:functionalci_list' => 'FunctionalCI list',
    'Class:MonitoringCore/Attribute:monitoringprobe_list' => 'Monitoring Probes',
    'Class:MonitoringProbe' => 'Monitoring Probe',
    'Class:MonitoringProbe+' => 'The probe server used to monitor other devices',
    'Class:MonitoringProbe/Attribute:functionalci_list' => 'FunctionalCI list',
    'Menu:ConfigManagement:Monitoring' => 'Monitoring',
    'Menu:ConfigManagement:Monitoring+' => 'Systems monitoring',
    'Server:monitoring' => 'Monitoring',
));

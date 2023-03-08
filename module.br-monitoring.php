<?php

/**
 * @copyright   Copyright (C) 2021-2023 Björn Rudner
 * @license     https://www.gnu.org/licenses/gpl-3.0.en.html
 * @version     2023-03-08
 *
 * iTop module definition file
 */

SetupWebPage::AddModule(
    __FILE__, // Path to the current file, all other file names are relative to the directory containing this file
    'br-monitoring/0.6.1',
    array(
        // Identification
        //
        'label' => 'Datamodel: Monitoring',
        'category' => 'business',

        // Setup
        //
        'dependencies' => array(
            '(itop-config-mgmt/2.5.0 & itop-config-mgmt/<3.0.0)||itop-structure/3.0.0',
            'itop-virtualization-mgmt/0.0.0',
            'teemip-network-mgmt-extended/0.0.0'
        ),
        'mandatory' => false,
        'visible' => true,

        // Components
        //
        'datamodel' => array(
        ),
        'webservice' => array(),
        'data.struct' => array(
            // add your 'structure' definition XML files here,
        ),
        'data.sample' => array(
            // add your sample data XML files here,
        ),

        // Documentation
        //
        'doc.manual_setup' => '', // hyperlink to manual setup documentation, if any
        'doc.more_information' => '', // hyperlink to more information, if any

        // Default settings
        //
        'settings' => array(
            // Module specific settings go here, if any
        ),
    )
);

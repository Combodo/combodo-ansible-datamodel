<?php

/**
 * @copyright   Copyright (C) 2023 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//
// Class: Ansible
//
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:Ansible' => 'Ansible Anwendung',
    'Class:Ansible+' => '',
    'Class:Ansible:baseinfo' => 'Allgemeine Informationen',
    'Class:Ansible:operation' => 'Operationen',
    'Class:Ansible/Attribute:name+' => 'Name der Ansible Anwendung',
    'Class:Ansible/Attribute:org_id+' => 'Organisation, zu der die Anwendung gehört',
    'Class:Ansible/Attribute:status' => 'Status',
    'Class:Ansible/Attribute:status+' => '',
    'Class:Ansible/Attribute:status/Value:obsolete' => 'Obsolet',
    'Class:Ansible/Attribute:status/Value:production' => 'Produktiv',
    'Class:Ansible/Attribute:status/Value:implementation' => 'Implementierung',
    'Class:Ansible/Attribute:location_id' => 'Standort',
    'Class:Ansible/Attribute:location_id+' => 'Standort, an dem die Anwendung installiert ist',
    'Class:Ansible/Attribute:location_name' => 'Standortname',
    'Class:Ansible/Attribute:location_name+' => '',
    'Class:Ansible/Attribute:uuid' => 'UUID',
    'Class:Ansible/Attribute:uuid+' => 'Universal Unique Identifier der Anwendung',
    'Class:Ansible/Attribute:functionalci_id' => 'CI',
    'Class:Ansible/Attribute:functionalci_id+' => 'Funktionales CI, das die Anwendung hostet. Kann ein Server, eine virtuelle Maschine oder eine Anwendungslösung sein',
    'Class:Ansible/Attribute:ansibleinventories_list' => 'Inventare',
    'Class:Ansible/Attribute:ansibleinventories_list+' => 'Liste aller der Anwendung zugeordneten Inventare',
    'Class:Ansible/Attribute:ansibleinventorygroups_list' => 'Inventargruppen',
    'Class:Ansible/Attribute:ansibleinventorygroups_list+' => 'Liste aller der Anwendung zugeordneten Inventargruppen',
));

//
// Class: AnsibleInventory
//
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:AnsibleInventory' => 'Ansible Inventar',
    'Class:AnsibleInventory+' => '',
    'Class:AnsibleInventory/Attribute:name' => 'Name',
    'Class:AnsibleInventory/Attribute:name+' => 'Name des Ansible Inventars',
    'Class:AnsibleInventory/Attribute:ansible_id' => 'Ansible Anwendung',
    'Class:AnsibleInventory/Attribute:ansible_id+' => 'Ansible Anwendung, zu der das Inventar gehört',
    'Class:AnsibleInventory/Attribute:ansible_name' => 'Name der Ansible Anwendung',
    'Class:AnsibleInventory/Attribute:ansible_name+' => '',
    'Class:AnsibleInventory/Attribute:org_id+' => 'Organisation, zu der das Inventar gehört',
    'Class:AnsibleInventory/Attribute:description' => 'Beschreibung',
    'Class:AnsibleInventory/Attribute:description+' => '',
    'Class:AnsibleInventory/Attribute:ansibleinventorygroups_list' => 'Inventargruppen',
    'Class:AnsibleInventory/Attribute:ansibleinventorygroups_list+' => 'Alle Inventargruppen, die zum Inventar gehören',
    'Class:AnsibleInventory/Tab:cis_list' => 'CIs',
    'Class:AnsibleInventory/Tab:cis_list+' => 'Liste aller CIs, die einer Inventargruppe des Inventars zugeordnet sind',
));

//
// Class: AnsibleInventoryGroup
//
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:AnsibleInventoryGroup' => 'Ansible Inventargruppe',
    'Class:AnsibleInventoryGroup+' => '',
    'Class:AnsibleInventoryGroup/Attribute:name' => 'Name',
    'Class:AnsibleInventoryGroup/Attribute:name+' => 'Name der Ansible Inventargruppe',
    'Class:AnsibleInventoryGroup/Attribute:ansible_id' => 'Ansible Anwendung',
    'Class:AnsibleInventoryGroup/Attribute:ansible_id+' => 'Ansible Anwendung, zu der die Inventargruppe gehört',
    'Class:AnsibleInventoryGroup/Attribute:ansible_name' => 'Name der Ansible Anwendung',
    'Class:AnsibleInventoryGroup/Attribute:ansible_name+' => '',
    'Class:AnsibleInventoryGroup/Attribute:org_id+' => 'Organisation, zu der die Inventargruppe gehört',
    'Class:AnsibleInventoryGroup/Attribute:ansibleinventory_id' => 'Ansible Inventar',
    'Class:AnsibleInventoryGroup/Attribute:ansibleinventory_id+' => 'Ansible Inventar, zu dem die Gruppe gehört',
    'Class:AnsibleInventoryGroup/Attribute:parent_id' => 'Übergeordnete Gruppe',
    'Class:AnsibleInventoryGroup/Attribute:parent_id+' => 'Übergeordnete Inventargruppe',
    'Class:AnsibleInventoryGroup/Attribute:parent_name' => 'Name der übergeordneten Gruppe',
    'Class:AnsibleInventoryGroup/Attribute:parent_name+' => '',
    'Class:AnsibleInventoryGroup/Attribute:description' => 'Beschreibung',
    'Class:AnsibleInventoryGroup/Attribute:description+' => '',
    'Class:AnsibleInventoryGroup/Attribute:functionalcis_list' => 'CIs',
    'Class:AnsibleInventoryGroup/Attribute:functionalcis_list+' => 'Alle der Gruppe zugeordneten CIs',
));

//
// Class lnkAnsibleInventoryGroupToCI
//
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Class:lnkAnsibleInventoryGroupToCI' => 'Link Ansible Inventargruppe / Funktionales CI',
    'Class:lnkAnsibleInventoryGroupToCI+' => '',
    'Class:lnkAnsibleInventoryGroupToCI/Name' => '%1$s / %2$s',
    'Class:lnkAnsibleInventoryGroupToCI/Attribute:functionalci_id' => 'CI',
    'Class:lnkAnsibleInventoryGroupToCI/Attribute:functionalci_id+' => 'CI oder Host, der zur Gruppe gehört',
    'Class:lnkAnsibleInventoryGroupToCI/Attribute:functionalci_name' => 'CI Name',
    'Class:lnkAnsibleInventoryGroupToCI/Attribute:functionalci_name+' => '',
    'Class:lnkAnsibleInventoryGroupToCI/Attribute:ansibleinventorygroup_id' => 'Inventargruppe',
    'Class:lnkAnsibleInventoryGroupToCI/Attribute:ansibleinventorygroup_id+' => '',
    'Class:lnkAnsibleInventoryGroupToCI/Attribute:ansibleinventorygroup_name' => 'Name der Inventargruppe',
    'Class:lnkAnsibleInventoryGroupToCI/Attribute:ansibleinventorygroup_name+' => '',
    'Class:lnkAnsibleInventoryGroupToCI/Attribute:tag' => 'Tag',
    'Class:lnkAnsibleInventoryGroupToCI/Attribute:tag+' => '',
));

//
// Menus and messages
//
Dict::Add('DE DE', 'German', 'Deutsch', array(
    'Menu:ConfigManagement:Ansible' => 'Ansible',
    'Menu:Ansible:General' => 'Allgemein',
    'UI:AnsibleInventory:Action:FileDisplay:Menu' => 'Inventardatei anzeigen',
    'UI:AnsibleInventory:Action:Details:Menu' => 'Details',
    'UI:AnsibleInventory:Action:FileDisplay:PageTitle' => 'Inventardatei %1$s',
    'UI:AnsibleInventory:Action:FileDisplay:Title' => 'Inventardatei',
    'UI:AnsibleInventory:Action:FileDisplay:Title:Title_Class_Object' => 'Inventardatei für %1$s %2$s',
    'UI:AnsibleInventory:Action:FileDisplay:Title:PageTitle_Object_Class' => 'Inventardatei',
    'UI:AnsibleInventory:Action:FileDisplay:Format:ini' => 'Inventardatei im INI-Format anzeigen',
    'UI:AnsibleInventory:Action:FileDisplay:Format:yml' => 'Inventardatei im YML-Format anzeigen',
    'UI:AnsibleInventoryGroup:Action:New:lnkAnsibleInventoryGroupToCI:WrongCIClass' => 'Nur die folgenden CI-Klassen können einer Inventargruppe zugeordnet werden: %1$s',
));

<?php

function calendarjp_update_ConfValues_1_1_1()
{
    global $_CONF, $_CAJP_DEFAULT;

    require_once $_CONF['path_system'] . 'classes/config.class.php';

    $c = config::get_instance();
    
    $c->add('addeventloginrequired', $_CAJP_DEFAULT['addeventloginrequired'], 'select', 0, 0, 0, 15, true, 'calendarjp');

    return true;
}

function calendarjp_update_ConfValues_1_1_2()
{
    global $_CONF, $_CAJP_DEFAULT;

    require_once $_CONF['path_system'] . 'classes/config.class.php';

    $c = config::get_instance();
    
    $c->add('wikitext_editor', $_CAJP_DEFAULT['wikitext_editor'], 'select', 0, 0, 1, 125, true, 'calendarjp');

    return true;
}

function calendarjp_update_ConfValues_1_1_4()
{
    global $_CONF, $_CAJP_DEFAULT, $_CAJP_CONF;

    require_once $_CONF['path_system'] . 'classes/config.class.php';
    
    $c = config::get_instance();
    
    require_once $_CONF['path'] . 'plugins/calendarjp/install_defaults.php';

    // Autotag Usuage Defaults    
    $c->add('fs_autotag_permissions', NULL, 'fieldset', 
            0, 10, NULL, 0, true, 'calendarjp', 10);
    $c->add('autotag_permissions_event', $_CAJP_DEFAULT['autotag_permissions_event'], '@select', 
            0, 10, 13, 10, true, 'calendarjp', 10);       
    
    // Add in all the New Tabs
    $c->add('tab_main', NULL, 'tab', 0, 0, NULL, 0, true, 'calendarjp', 0);
    $c->add('tab_permissions', NULL, 'tab', 0, 1, NULL, 0, true, 'calendarjp', 1);
    $c->add('tab_autotag_permissions', NULL, 'tab', 0, 10, NULL, 0, true, 'calendarjp', 10);

    return true;
}

?>
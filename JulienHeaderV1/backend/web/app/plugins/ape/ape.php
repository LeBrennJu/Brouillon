<?php
/*
* Plugin Name:  APE Crosmières
* Version:      1.0
* Author:       Le Brenn Julien
*/
require_once plugin_dir_path(__FILE__) . "post-types/event.php";
require_once plugin_dir_path(__FILE__) . "post-types/sale.php";

require_once plugin_dir_path(__FILE__) . "custom-roles/membreape.php";


register_activation_hook(__FILE__, 'ape_create_custom_roles');
require_once plugin_dir_path(__FILE__) . "custom-endpoints/registration.php";

function ape_create_custom_roles()
{
    ape_create_membre_role();
}

register_deactivation_hook(__FILE__, 'ape_remove_custom_roles');
function ape_remove_custom_roles()
{
    ape_remove_membre_role();
}
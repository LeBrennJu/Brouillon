<?php

use FrontAdmin\Router;

// a chaque fois que wp charge un template en fct de l'url, on intercepte l'action et on verifie que l'url n'est pas une à nous
add_action('template_redirect', 'oprofile_front_admin_router');

// fct qui agit lorsqu'on change de route en front
function oprofile_front_admin_router()
{
    // pour ajouter la barre d'admin
    if (is_user_logged_in()) {
        require plugin_dir_path(__FILE__) . '../front_admin/views/template-parts/admin_bar.php';
    }

    // si l'utilisateur est connecté et qu'il a la capability 'custom_backoffice,
    // il peux acceder aux routes personnalisées du back office
    if (is_user_logged_in() && current_user_can('custom_backoffice')) {
        $router = new Router();
    }
}

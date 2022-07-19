<?php

add_action('admin_menu', 'oprofile_back_office_check');

function oprofile_back_office_check()
{
    // si l'utilisateur est connecté
    // et si l'utilisateur a la capabilité 'custom_backoffice'
    if (is_user_logged_in() && current_user_can('custom_backoffice')) {
        wp_redirect(home_url());
        exit;
    }
}

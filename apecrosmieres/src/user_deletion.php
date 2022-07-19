<?php

// hook qui s'execute après la suppression d'1 utilisateur ds la bdd
add_action('deleted_user', 'oprofile_delete_user', 10, 1);

function oprofile_delete_user($user_id)
{
    global $wpdb;
    $wpdb->query("
    DELETE FROM wp_oprofile_user_post
    WHERE user_id = $user_id;
    ");
}

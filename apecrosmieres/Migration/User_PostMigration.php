<?php

namespace Migration;

use wpdb;

class User_PostMigration
{
    //déclaration d'1 constante qui ne pourra pas etre changée
    const TABLE_NAME = "wp_oprofile_user_post";

    public static function createTable()
    {
        // recupération de la variable qui contient les données de connection à la bdd wp
        global $wpdb;

        //on défini le nom de la table

        // pour s'asssurer qu'on va stocker nos données ds un format compréhensible par wp
        $charset = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE " . self::TABLE_NAME . "(
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            user_id mediumint(9) NOT NULL,
            post_id mediumint(9) NOT NULL,
            PRIMARY KEY (id)
        ) $charset;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    public static function deleteTable()
    {
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS " . self::TABLE_NAME);
    }
}

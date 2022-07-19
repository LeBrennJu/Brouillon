<?php
namespace Migration;

class Link_PostMigration
{
    const TABLE_NAME = "wp_link";
    public static function createTable()
    {
        // Recuperation de la variable $wpdb qui contient toutes les infos de la BDD Wordpress
        global $wpdb;
        // On definit la collation
        $charset = $wpdb->get_charset_collate();

        // Création de la requete
        $sql = "CREATE TABLE "  . self::TABLE_NAME . "(
            id bigint(64) NOT NULL AUTO_INCREMENT,
            user_id bigint(64) NOT NULL,
            child_id bigint(64) NOT NULL,
            PRIMARY KEY (id)
        ) $charset;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($sql);
    }

    public static function deleteTable()
    {
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS "  . self::TABLE_NAME . "");
    }
}
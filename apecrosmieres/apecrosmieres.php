<?php
/* 
Plugin Name: APE Crosmières custom
Description: ajout de gestion d'évenements et ventes initiatives pour les Association de parent d'élèves
Author: Natalène D, Emilie P, Loïc D, Julien L et Christophe D
Version: 0.0.1
*/

use Migration\User_PostMigration;

require __DIR__ . '/vendor/autoload.php';

// inclure le fichier qui charge le CPT
include plugin_dir_path(__FILE__) . 'src/CPT_client.php';
include plugin_dir_path(__FILE__) . 'src/CPT_developper.php';
include plugin_dir_path(__FILE__) . 'src/CPT_project.php';


// inclure le fichier qui charge les taxonomies
include plugin_dir_path(__FILE__) . 'src/CT_skill.php';
include plugin_dir_path(__FILE__) . 'src/CT_activity_area.php';


// creer un nouveau rôle
include plugin_dir_path(__FILE__) . 'src/CR_client.php';
include plugin_dir_path(__FILE__) . 'src/CR_developper.php';


// Suppressiond es données de la table custom lors d ela suppression d'un utilisateur
include plugin_dir_path(__FILE__) . 'src/user_deletion.php';


// modif formulaire inscription d'1 new user
include plugin_dir_path(__FILE__) . 'src/custom_registration.php';


// ajout interdiction connexion au BO pour certain role
include plugin_dir_path(__FILE__) . 'src/back_office_permission.php';

// ajout interdiction connexion au BO pour certain role
include plugin_dir_path(__FILE__) . 'src/front_admin.php';


// fct qui s'execute lors de l'activation du plugin
register_activation_hook(__FILE__, 'oprofile_create_custom_role');

function oprofile_create_custom_role()
{
    oprofile_create_client_role();
    oprofile_create_developper_role();
    User_PostMigration::createTable();
}

// lors de la desactivation du plugin
register_deactivation_hook(__FILE__, 'oprofile_remove_custom_role');

function oprofile_remove_custom_role()
{
    oprofile_remove_client_role();
    oprofile_remove_developper_role();
    User_PostMigration::deleteTable();
}

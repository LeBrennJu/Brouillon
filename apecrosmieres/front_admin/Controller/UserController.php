<?php

namespace Controller;

use Controller\TemplateController;

class UserController
{

    public static function admin()
    {
        if (is_user_logged_in()) {
            // charger le fichier view
            require plugin_dir_path(__FILE__) . '../views/admin.php';
            // empecher le déroulement du reste par wp
            die;
        } else {
            // TODO redirect vers l'accueil
        }
    }

    public static function update()
    {
        if (is_user_logged_in()) {
            $user = wp_get_current_user();
            // on verifie si les données existent
            $url = $_POST['url'] !== '' ? $_POST['url'] : false;
            $email = $_POST['email'] !== '' ? $_POST['email'] : false;
            $password = $_POST['password'] !== '' ? $_POST['password'] : false;
            $github_url = $_POST['github_url'] !== '' ? $_POST['github_url'] : false;

            if ($url) {
                wp_update_user([
                    'ID' => $user->ID,
                    'user_url' => $url,
                ]);
            }
            if ($password) {
                wp_update_user([
                    'ID' => $user->ID,
                    'user_pass' => $password,
                ]);
            }
            if ($email) {
                wp_update_user([
                    'ID' => $user->ID,
                    'user_email' => $email,
                ]);
            }
            if ($github_url) {
                update_user_meta($user->ID, 'github_url', $github_url);
            }

            // déconnecte l'utilisateur courant
            wp_logout();
            wp_redirect(wp_login_url());
        }
    }

    public static function delete()
    {
        if (is_user_logged_in()) {
            // charger le fichier view
            require plugin_dir_path(__FILE__) . '../views/delete_confirm.php';
            // empecher le déroulement du reste par wp
            die;
        }
    }

    public static function deleteConfirm()
    {
        // d($_POST['confirmation']);
        if (is_user_logged_in() && $_POST['confirmation'] === "confirm") {
            $user = wp_get_current_user();
            $user_id = $user->ID;
            $name = $user->user_nicename;
            require_once(ABSPATH . 'wp-admin/includes/user.php');
            wp_logout();
            wp_delete_user($user_id);
            // echo "<h1>L\'utilisateur <strong>$name</strong> a bien été supprimé.</h1>";
            TemplateController::home(); // = wp_redirect(home_url());

        } else {
            TemplateController::messageAlert("<script>alert('Annulation')</script>");
            // echo '<h1 style="font-size:3rem;background-color:green;text-align:center;"><strong>Annulation</strong></h1>';
        }
        // wp_redirect(home_url());
    }

    public static function cardUpdate()
    {
        // TODO verifier le contenue pour eviter les injections sql et autres 
        // TODO et verifier que le post existe
        $post_id = $_POST['post_id'];
        $post_content = $_POST['post_content'];

        wp_update_post([
            'ID' => $post_id,
            'post_content' => $post_content
        ]);

        wp_redirect(home_url() . "/user/admin");
    }


    public static function viewAddProject()
    {
        if (is_user_logged_in()) {
            // charger le fichier view
            require plugin_dir_path(__FILE__) . '../views/add_project.php';
            die;
        }
    }

    public static function addProject()
    {

        $title = $_POST['project_title'];
        $content = $_POST['project_content'];

        if (is_user_logged_in()) {
            $user = wp_get_current_user();
            $user_id = $user->ID;
            $name = $user->user_nicename;
            // créer un nouveau post de type project
            wp_insert_post([
                'post_author' => $user_id,
                'post_title' => $title,
                'post_content' => $content,
                'post_status' => 'publish',
                'post_type' => 'project',
            ]);
        }
        wp_redirect(home_url());
    }

    public static function viewListSkill()
    {
        if (is_user_logged_in()) {
            // charger le fichier view
            require plugin_dir_path(__FILE__) . '../views/remove_skill.php';
            die;
        }
    }

    public static function removeSkill()
    {
        foreach ($_POST as $term => $term_id) {
            wp_delete_term($term_id, 'skill');
        }
        wp_redirect(home_url() . '/user/skill/remove');
    }
}

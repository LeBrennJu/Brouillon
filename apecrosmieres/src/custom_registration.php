<?php

add_action('register_form', 'oprofile_register_form_custom');

// 1. on ajoute des input au formulaire
function oprofile_register_form_custom()
{
    $listActivities = get_terms([
        'taxonomy' => 'activity_area',
        'hide_empty' => false,
    ]);
    $listSkills = get_terms([
        'taxonomy' => 'skill',
        'hide_empty' => false,
    ]);

?>
    <p>
        <label for="password">Password <br />
            <input type="password" name="password" id="password" class="input" />
        </label>
    </p>
    <p>
        <label for="url">Site url <br />
            <input type="url" name="url" id="url" class="input" />
        </label>
    </p>
    <p>
        <label>Choix du rôle<br>
            <input class="choix" type="radio" id="client" name="role" value="client" checked>
            <label for="client">Client</label><br>
            <input class="choix" type="radio" id="developper" name="role" value="developper">
            <label for="developper">Developper</label><br>
        </label>
    </p>

    <p>
    <div id="clientChoice">
        <p class="subtitle">Select activity</p>

        <?php foreach ($listActivities as $activity) : ?>
            <?php //d($activity); 
            ?>
            <div>
                <input class="is-info" type="checkbox" id="<?= $activity->name ?>" name="activitiesList[]" value="<?= $activity->name ?>">
                <label class="subtitle" for="activitiesList[]"><?= $activity->name ?></label>
            </div>

        <?php endforeach ?>
    </div>
    </p>

    <p>
    <div id="developperChoice" style="display:none;">
        <p class="subtitle">Select skill</p>

        <?php foreach ($listSkills as $skill) : ?>
            <?php //d($activity); 
            ?>
            <div>
                <input class="is-info" type="checkbox" id="<?= $skill->name ?>" name="skillList[]" value="<?= $skill->name ?>">
                <label class="subtitle" for="skillList[]"><?= $skill->name ?></label>
            </div>

        <?php endforeach ?>
    </div>
    </p>


    <script>
        let choix = document.querySelectorAll('input[type="radio"]');
        console.log(choix);
        choix.forEach(element => {

            element.addEventListener('click', addChoice);
        });

        function addChoice(evt) {
            let elmt = evt.currentTarget;
            console.log(elmt.value);

            let content = document.querySelector('#' + elmt.value + 'Choice');
            content.style.display = 'block';
            if (elmt.value === 'client') {
                document.querySelector('#developperChoice').style.display = 'none';
            } else {
                document.querySelector('#clientChoice').style.display = 'none';
            }
        }
    </script>

<?php
}


// TODO gestion des erreur

// 2. on valide les entrée du formulaire
add_filter('registration_errors', 'oprofile_register_check_form', 10, 3);

//param 1 : objet error
//2 et 3 obligatoires
function oprofile_register_check_form($errors, $user_login, $user_email)
{

    if (mb_strlen($_POST['password']) <= 3) {
        $errors->add('oprofile_registration_error', '<strong>Error</strong>: Le mot de passe doit contenir plus de 3 caractères');
    }

    // verif si url est au format (http(s)//texte.text)
    if (preg_match('/^(http(s)?:\/\/)?[a-zA-Z]*\.[a-zA-Z]*$/', $_POST['url']) === 0) {
        $errors->add('oprofile_registration_error', '<strong>Error</strong>: L\'adresse du site n\'est pas une adresse valide');
    }


    if (isset($_POST['role']) && (!in_array($_POST['role'], ['developper', 'client']) === 0)) {
        $errors->add('oprofile_registration_error', '<strong>Error</strong>: Le rôle n\'est pas valide');
    }


    // d($_POST);


    // $listActivities = get_terms([
    //     'taxonomy' => 'activity_area',
    //     'hide_empty' => false,
    // ]);
    // $listSkills = get_terms([
    //     'taxonomy' => 'skill',
    //     'hide_empty' => false,
    // ]);


    // //si le role est client
    // if ($_POST['role'] === 'client') {
    //     // je parcours toutes les activitées cochées ds le formulaire
    //     foreach ($_POST['activitiesList'] as $index => $activity) {
    //         //je verifie que toutes les valeurs correspondent à celle créée
    //         if (in_array($activity, $listActivities) === false) {
    //             $errors->add('oprofile_registration_error', '<strong>Error</strong>: L\'activité n\'est pas valide');
    //         }
    //     }
    // }


    // if ($_POST['role'] === 'developper') {
    //     // je parcours toutes les activitées cochées ds le formulaire
    //     foreach ($_POST['skillList'] as $index => $skill) {
    //         //je verifie que toutes les valeurs correspondent à celle créée
    //         if (in_array($skill, $listSkills->name) === false) {
    //             d($skill, $listSkills);
    //             $errors->add('oprofile_registration_error', '<strong>Error</strong>: La skill n\'est pas valide');
    //         }
    //     }
    // }
    // activitiesList[]
    // skillList[]
    // $listActivities
    // $listSkills 

    // on doit toujours renvoyer $errors
    return $errors;
}



// 3. après la création du compte, on va le customiser
add_action('user_register', 'oprofile_register_user_update');


// $user_id est fourni automatiquement à la fct par le Hook 'user_register'
function oprofile_register_user_update($user_id)
{
    global $wpdb;

    $userdata = [
        'ID' => $user_id,
        'user_pass' => $_POST['password'],
        'user_url' => $_POST['url'],
        'role' => $_POST['role']
    ];

    wp_update_user($userdata);

    //pour ajouter une metakeys 'github_url' pour le role developper
    if ($_POST['role'] === 'developper') {
        add_user_meta($user_id, 'github_url', '');
    }

    // créer un nouveau post de type client
    $post_id = wp_insert_post([
        'post_author' => $user_id,
        'post_type' => $_POST['role'],
        'post_status' => 'publish',
        'post_content' => '',
        // on récupere le 'user_login' du formulaire précédement créer
        'post_title' => $_POST['user_login']
    ]);

    // TODO : rediriger vers la page de connexion
    // via le hook add_filter('registration_redirect', 'oprofile_redirect');

    // ou
    // $redirect = 'http://oprofile.local/wp/wp-login.php';
    // header('location: ' . $redirect);
    // exit;


    // on relie le post à l'utilisateur via la table custom
    // user_id et post_id
    // insert : 
    // 1. la table
    // 2. le tableau de donnée à insérer
    $wpdb->insert('wp_oprofile_user_post', [
        'user_id' => $user_id,
        'post_id' => $post_id
    ]);
}

// hook de création redirection après enregistrement
add_filter('registration_redirect', 'oprofile_redirect');

function oprofile_redirect()
{
    return wp_login_url();
}

// on va utiliser un hook pour désactiver l'envoie du mail de confirmation d'inscription
// '__return_false' est une manière de dire à wp de désactiver le hook
add_filter('wpmu_signup_user_notification', '__return_false');

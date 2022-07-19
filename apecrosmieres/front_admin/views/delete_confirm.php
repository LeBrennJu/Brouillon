<?php
wp_head();
$user = wp_get_current_user();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>O'profile | Add Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

</head>

<body>
    <section class="section">
        <div class="container">

            <h1 class="title" style="font-size:1.5rem;">Suppression du compte <?= $user->user_login ?> </h1>

            <p class="subtitle"> cette action est irreversible, êtes vous sûr ????</p>

            <form action="/user/delete_confirm" method="post">
                <input type="radio" id="confirm" name="confirmation" value="confirm">
                <label class="subtitle" for="confirm">Oui, bien sûr</label><br>
                <input type="radio" id="abort" name="confirmation" value="abort" checked>
                <label class="subtitle" for="abort">Non, c'est une erreur</label><br>
                <button style="color:white;background-color:red;font-size:1.5rem;width:50%;margin-top:1rem;" class="tag is-info is-light" type="submit">Valider</button>
            </form>

        </div>

    </section>

    <?php
    wp_footer();
    ?>
</body>

</html>
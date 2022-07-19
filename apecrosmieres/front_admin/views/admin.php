<?php
wp_head();
global $wpdb;
$user = wp_get_current_user();
$user_id = $user->ID;

$result = $wpdb->get_results("
SELECT * FROM wp_oprofile_user_post
WHERE user_id = $user_id
");

$post_id = $result[0]->post_id;
$post = get_post($post_id);
$content = $post->post_content;
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

            <h1 class="title">welcome user admin home !!!!!</h1>

            <form action="/user/update" method="post">
                <label for="email" class="subtitle">email</label>
                <input class="input is-info" type="email" name="email" value="<?= $user->user_email ?>">
                <label for="url" class="subtitle">url</label>
                <input class="input is-info" type="url" name="url" value="<?= $user->user_url ?>">
                <label for="password" class="subtitle">pwd</label>
                <input class="input is-info" type="password" name="password">
                <?php if ($user->roles[0] === 'developper') : ?>
                    <label for="github_url" class="subtitle">Url github</label>
                    <input class="input is-info" type="github_url" name="github_url" value="<?= $user->github_url ?>">
                <?php endif ?>
                <br>
                <button style="font-size:1.5rem;width:100%;margin-top:1rem;" class="tag is-info is-light" type="submit">Mettre a jour</button>
            </form>

            <br>

            <form action="/user/card/update" method="post">
                <input class="input is-info" type="hidden" name="post_id" value="<?= $post_id ?>">
                <textarea class="textarea is-info" name="post_content"><?= $content ?></textarea>
                <br>
                <button style="font-size:1.5rem;width:100%;margin-top:1rem;" class="tag is-info is-light" type="submit">Update buisness card</button>
            </form>


            <form id="deletUser" action="/user/delete" method="post">
                <button style="color:white;background-color:red;font-size:1.5rem;width:100%;margin-top:1rem;" class="tag is-info is-light" type="submit">Suppression du compte</button>
            </form>
        </div>

    </section>

    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            let form = document.querySelector('#deletUser')
            form.addEventListener('submit', (e) => {
                if (!confirm('t\'es sur de vouloir supprimer ?')) {
                    e.preventDefault();

                }

            })
        });
    </script>

    <?php
    wp_footer();
    ?>
</body>

</html>
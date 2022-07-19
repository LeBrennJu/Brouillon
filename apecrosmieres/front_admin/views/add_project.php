<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>O'profile | Add Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <?php wp_head(); ?>
</head>

<body>
    <section class="section">
        <div class="container">

            <h1 class="title">Add new project </h1>

            <form action="/user/project/new" method="post">

                <label class="subtitle">Titre du projet</label>
                <input class="input is-info" type="text" name="project_title" value="">

                <label class="subtitle">Description du projet</label>
                <textarea class="textarea is-info" name="project_content"></textarea>

                <div class="pure-control-group">
                    <label class="project_content_label" for="post_content">Project content</label>
                    <?php
                    // Permet d'utiliser l'editeur Wysiwyg de Wordpress dans mon template
                    $settings = array('media_buttons' => false, 'quicktags' => false);
                    $content = 'Content of project';
                    $editor_id = 'content';
                    wp_editor($content, $editor_id, $settings);
                    ?>
                </div>

                <button style="font-size:2rem;width:100%;margin-top:1rem;" class="tag is-info is-light" type="submit">Ajouter</button>

            </form>
        </div>

    </section>
    <?php wp_footer(); ?>
</body>

</html>
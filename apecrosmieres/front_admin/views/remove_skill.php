<?php
wp_head();

$listSkills = get_terms([
    'taxonomy' => 'skill',
    'hide_empty' => false,
]);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>O'profile | Remove Skill</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<style>
    fieldset {
        display: block;
        margin-inline-start: 2px;
        margin-inline-end: 2px;
        padding-block-start: 0.35em;
        padding-inline-start: 0.75em;
        padding-inline-end: 0.75em;
        padding-block-end: 0.625em;
        min-inline-size: min-content;
        border-width: 3px;
        border-radius: 5px;
        border-style: groove;
        border-image: initial;
    }
</style>

<body>
    <section class="section">
        <div class="container">

            <h1 class="title">Remove Skills </h1>

            <form action="/user/skill/remove" method="post">

                <fieldset>
                    <legend>Which skills would you remove ? </legend>
                    <div id="skillChoice"></div>


                    <?php foreach ($listSkills as $skill) : ?>
                        <?php //d($skill); 
                        ?>
                        <div>
                            <input type="checkbox" id="<?= $skill->name ?>" name="<?= $skill->name ?>" value="<?= $skill->term_id ?>">
                            <label for="<?= $skill->name ?>"><?= $skill->name ?></label>
                        </div>

                    <?php endforeach ?>

                </fieldset>

                <br>

                <button style="font-size:2rem;width:100%;" class="tag is-info is-light" type="submit">Update</button>

            </form>
        </div>

    </section>
    <?php wp_footer(); ?>
</body>




</html>
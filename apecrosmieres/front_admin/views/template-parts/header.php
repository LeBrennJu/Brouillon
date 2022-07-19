<?php
wp_head();
?>
<link rel="stylesheet" href="https://unpkg.com/purecss@2.1.0/build/pure-min.css" integrity="sha384-yHIFVG6ClnONEA5yB5DJXfW2/KC173DIQrYoZMEtBvGzmf0PKiGyNEqe9N6BNDBH" crossorigin="anonymous">
<style>
<?php require plugin_dir_path( __FILE__ ) . '../../assets/css/style.css'; ?>
</style>
<div class="pure-menu pure-menu-horizontal">
    <ul class="pure-menu-list">
        <li class="pure-menu-item">
            <a href="/user/admin" class="pure-menu-link">Admin</a>
        </li>
        <li class="pure-menu-item">
            <a href="/user/project" class="pure-menu-link">Project</a>
        </li>
        <li class="pure-menu-item">
            <a href="/user/skill" class="pure-menu-link">Skill</a>
        </li>
    </ul>
</div>
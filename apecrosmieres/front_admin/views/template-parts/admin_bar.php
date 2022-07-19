<style>
    #bar {
        background-color: black;
        height: 40px;
        padding: 5px;
        margin: 0px;
        display: flex;
        justify-content: space-between
    }

    #bar a,
    #bar h1 {
        color: white;
        font-weight: bold;
    }
</style>
<section id="bar">
    <div>
        <a href="<?= home_url() ?>" style="display:inline-block;">
            <h1 class="logo top-bar__logo">+ Accueil</h1>
        </a>
        <a href="<?= home_url() ?>/user/admin" style="display:inline-block;">
            <h1 class="logo top-bar__logo">+ Admin</h1>
        </a>
        <a href="<?= home_url() ?>/user/project/new" style="display:inline-block;">
            <h1 class="logo top-bar__logo">+ Add New Project</h1>
        </a>
        <a href="<?= home_url() ?>/user/skill/remove" style="display:inline-block;">
            <h1 class="logo top-bar__logo">+ Remove Skill</h1>
        </a>
    </div>
    <div>
        <h1>Bonjour, <?= wp_get_current_user()->user_nicename ?></h1>
    </div>
</section>
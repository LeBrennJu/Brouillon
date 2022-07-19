<?php
// Custom Role

function oprofile_create_client_role()
{
    // on va mettre la génération du nouveau rôle

    $capabilities = [
        'edit_posts' => true,
        'upload_files' => true,
        'manage_options' => true,
        //capability personnalisé
        'custom_backoffice'=> true
    ];
    //1:slug
    //2:display nalme
    //3: capability
    add_role('client', 'Client', $capabilities);
}


function oprofile_remove_client_role()
{
    // on va supprimer le rôle custom
    remove_role('client');
}


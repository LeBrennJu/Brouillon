<?php 

// Custom Role

function ape_create_apeuser_role()
{
    // on va mettre la génération du nouveau rôle pour les utilisateurs
    $capabilities = [
        'upload_files' => true,
        'read' => true,
    ];

    //1:slug
    //2:display name
    //3: capability
    add_role('apeuser', 'Apeuser', $capabilities);
}


function ape_remove_apeuser_role()
{
    // on va supprimer le rôle custom
    remove_role('apeuser');
}



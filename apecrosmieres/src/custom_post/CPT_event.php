<?php
//CPT Custom Post Type

add_action('init', 'ape_register_event');

function oprofile_register_event()
{

    $labels = [
        'name' => 'Evénements',
        'all_items' => 'Tout les Evénements',
        'singular_name' => 'Evénement',
        'add_new_item' => 'Ajouter un nouvel événement',
        'edit_item' => 'Editer un événement',
        // par convention au pluriel
        'menu_name' => 'Evénements',
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        // accessible via appel API REST ou non
        'show_in_rest' => true,
        // definit 1 page dt le role sera d'afficher tout les clients
        'has_archive' => true,
        'supports' => [
            'title',
            'author',
            'excerpt',
            'editor',
            'thumbnail',
            'revisions',
            'custom-fields'
        ],
        //definir la posiiton du CPT
        'menu_position' => 5,
        // Dashicons
        'menu_icon' => 'dashicons-calendar-alt'
    ];
    // 1er arg le slug et 2eme les propriétées
    register_post_type('event', $args);
}

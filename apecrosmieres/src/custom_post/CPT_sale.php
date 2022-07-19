<?php
//CPT Custom Post Type

add_action('init', 'ape_register_sale');

function oprofile_register_event()
{

    $labels = [
        'name' => 'Ventes',
        'all_items' => 'Toutes les Ventes',
        'singular_name' => 'Vente',
        'add_new_item' => 'Ajouter une nouvelle vente',
        'edit_item' => 'Editer une vente',
        // par convention au pluriel
        'menu_name' => 'Ventes',
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
        'menu_icon' => 'dashicons-tickets-alt'
    ];
    // 1er arg le slug et 2eme les propriétées
    register_post_type('sale', $args);
}

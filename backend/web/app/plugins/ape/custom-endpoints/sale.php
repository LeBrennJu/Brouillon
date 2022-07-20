<?php

add_action('rest_api_init', 'ape_rest_sale_register');
function ape_rest_sale_register()
{
    // custom route when sale added
    register_rest_route('wp/v2', 'sale', array(
        'methods' => 'POST',
        'callback' => 'ape_rest_add_sale_handler',
        'permission_callback' => function () {
            return true;
        }
    ));
}

// add request content to the custom post and add custom post meta
function ape_rest_add_sale_handler($request)
{

    // translate request with JSON
    $parameters = $request->get_json_params();
    $title = sanitize_text_field($parameters['title']);
    $content = sanitize_text_field($parameters['content']);
    $date = sanitize_text_field($parameters['date']);
    $lieu = sanitize_text_field($parameters['lieu']);
    $lien = sanitize_text_field($parameters['lien']);

    // add to the database
    $post_id = wp_insert_post([
        'post_title' => $title,
        'post_content' => $content,
        'post_type' => 'sale'
    ]);
    add_post_meta($post_id, 'lieu', $lieu);
    add_post_meta($post_id, 'lien', $lien);
    add_post_meta($post_id, 'date', $date);

    // return post's id or false
    return $post_id > 0 ? $post_id : false;
};

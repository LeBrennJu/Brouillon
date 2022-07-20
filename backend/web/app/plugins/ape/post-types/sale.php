<?php

/**
 * Registers the `sale` post type.
 */
function sale_init() {
	register_post_type(
		'sale',
		[
			'labels'                => [
				'name'                  => __( 'Ventes', 'ape' ),
				'singular_name'         => __( 'Vente', 'ape' ),
				'all_items'             => __( 'All Ventes', 'ape' ),
				'archives'              => __( 'Vente Archives', 'ape' ),
				'attributes'            => __( 'Vente Attributes', 'ape' ),
				'insert_into_item'      => __( 'Insert into Vente', 'ape' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Vente', 'ape' ),
				'featured_image'        => _x( 'Featured Image', 'sale', 'ape' ),
				'set_featured_image'    => _x( 'Set featured image', 'sale', 'ape' ),
				'remove_featured_image' => _x( 'Remove featured image', 'sale', 'ape' ),
				'use_featured_image'    => _x( 'Use as featured image', 'sale', 'ape' ),
				'filter_items_list'     => __( 'Filter Ventes list', 'ape' ),
				'items_list_navigation' => __( 'Ventes list navigation', 'ape' ),
				'items_list'            => __( 'Ventes list', 'ape' ),
				'new_item'              => __( 'New Vente', 'ape' ),
				'add_new'               => __( 'Add New', 'ape' ),
				'add_new_item'          => __( 'Add New Vente', 'ape' ),
				'edit_item'             => __( 'Edit Vente', 'ape' ),
				'view_item'             => __( 'View Vente', 'ape' ),
				'view_items'            => __( 'View Ventes', 'ape' ),
				'search_items'          => __( 'Search Ventes', 'ape' ),
				'not_found'             => __( 'No Ventes found', 'ape' ),
				'not_found_in_trash'    => __( 'No Ventes found in trash', 'ape' ),
				'parent_item_colon'     => __( 'Parent Vente:', 'ape' ),
				'menu_name'             => __( 'Ventes', 'ape' ),
			],
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => ['title', 'editor', 'thumbnail' , 'author', 'revisions', 'excerpt'],
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-money',
			'show_in_rest'          => true,
			'rest_base'             => 'sale',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		]
	);

}

add_action( 'init', 'sale_init' );

/**
 * Sets the post updated messages for the `sale` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `sale` post type.
 */
function sale_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['sale'] = [
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Vente updated. <a target="_blank" href="%s">View Vente</a>', 'ape' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'ape' ),
		3  => __( 'Custom field deleted.', 'ape' ),
		4  => __( 'Vente updated.', 'ape' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Vente restored to revision from %s', 'ape' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Vente published. <a href="%s">View Vente</a>', 'ape' ), esc_url( $permalink ) ),
		7  => __( 'Vente saved.', 'ape' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Vente submitted. <a target="_blank" href="%s">Preview Vente</a>', 'ape' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Vente scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Vente</a>', 'ape' ), date_i18n( __( 'M j, Y @ G:i', 'ape' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Vente draft updated. <a target="_blank" href="%s">Preview Vente</a>', 'ape' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	];

	return $messages;
}

add_filter( 'post_updated_messages', 'sale_updated_messages' );

/**
 * Sets the bulk post updated messages for the `sale` post type.
 *
 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
 * @return array Bulk messages for the `sale` post type.
 */
function sale_bulk_updated_messages( $bulk_messages, $bulk_counts ) {
	global $post;

	$bulk_messages['sale'] = [
		/* translators: %s: Number of Ventes. */
		'updated'   => _n( '%s Vente updated.', '%s Ventes updated.', $bulk_counts['updated'], 'ape' ),
		'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 Vente not updated, somebody is editing it.', 'ape' ) :
						/* translators: %s: Number of Ventes. */
						_n( '%s Vente not updated, somebody is editing it.', '%s Ventes not updated, somebody is editing them.', $bulk_counts['locked'], 'ape' ),
		/* translators: %s: Number of Ventes. */
		'deleted'   => _n( '%s Vente permanently deleted.', '%s Ventes permanently deleted.', $bulk_counts['deleted'], 'ape' ),
		/* translators: %s: Number of Ventes. */
		'trashed'   => _n( '%s Vente moved to the Trash.', '%s Ventes moved to the Trash.', $bulk_counts['trashed'], 'ape' ),
		/* translators: %s: Number of Ventes. */
		'untrashed' => _n( '%s Vente restored from the Trash.', '%s Ventes restored from the Trash.', $bulk_counts['untrashed'], 'ape' ),
	];

	return $bulk_messages;
}

add_filter( 'bulk_post_updated_messages', 'sale_bulk_updated_messages', 10, 2 );

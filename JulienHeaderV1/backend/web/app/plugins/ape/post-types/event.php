<?php

/**
 * Registers the `event` post type.
 */
function event_init() {
	register_post_type(
		'event',
		[
			'labels'                => [
				'name'                  => __( 'Evenements', 'ape' ),
				'singular_name'         => __( 'Evenement', 'ape' ),
				'all_items'             => __( 'All Evenements', 'ape' ),
				'archives'              => __( 'Evenement Archives', 'ape' ),
				'attributes'            => __( 'Evenement Attributes', 'ape' ),
				'insert_into_item'      => __( 'Insert into Evenement', 'ape' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Evenement', 'ape' ),
				'featured_image'        => _x( 'Featured Image', 'event', 'ape' ),
				'set_featured_image'    => _x( 'Set featured image', 'event', 'ape' ),
				'remove_featured_image' => _x( 'Remove featured image', 'event', 'ape' ),
				'use_featured_image'    => _x( 'Use as featured image', 'event', 'ape' ),
				'filter_items_list'     => __( 'Filter Evenements list', 'ape' ),
				'items_list_navigation' => __( 'Evenements list navigation', 'ape' ),
				'items_list'            => __( 'Evenements list', 'ape' ),
				'new_item'              => __( 'New Evenement', 'ape' ),
				'add_new'               => __( 'Add New', 'ape' ),
				'add_new_item'          => __( 'Add New Evenement', 'ape' ),
				'edit_item'             => __( 'Edit Evenement', 'ape' ),
				'view_item'             => __( 'View Evenement', 'ape' ),
				'view_items'            => __( 'View Evenements', 'ape' ),
				'search_items'          => __( 'Search Evenements', 'ape' ),
				'not_found'             => __( 'No Evenements found', 'ape' ),
				'not_found_in_trash'    => __( 'No Evenements found in trash', 'ape' ),
				'parent_item_colon'     => __( 'Parent Evenement:', 'ape' ),
				'menu_name'             => __( 'Evenements', 'ape' ),
			],
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => [ 'title', 'editor' ],
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-calendar-alt',
			'show_in_rest'          => true,
			'rest_base'             => 'event',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		]
	);

}

add_action( 'init', 'event_init' );

/**
 * Sets the post updated messages for the `event` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `event` post type.
 */
function event_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['event'] = [
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Evenement updated. <a target="_blank" href="%s">View Evenement</a>', 'ape' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'ape' ),
		3  => __( 'Custom field deleted.', 'ape' ),
		4  => __( 'Evenement updated.', 'ape' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Evenement restored to revision from %s', 'ape' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Evenement published. <a href="%s">View Evenement</a>', 'ape' ), esc_url( $permalink ) ),
		7  => __( 'Evenement saved.', 'ape' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Evenement submitted. <a target="_blank" href="%s">Preview Evenement</a>', 'ape' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Evenement scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Evenement</a>', 'ape' ), date_i18n( __( 'M j, Y @ G:i', 'ape' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Evenement draft updated. <a target="_blank" href="%s">Preview Evenement</a>', 'ape' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	];

	return $messages;
}

add_filter( 'post_updated_messages', 'event_updated_messages' );

/**
 * Sets the bulk post updated messages for the `event` post type.
 *
 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
 * @return array Bulk messages for the `event` post type.
 */
function event_bulk_updated_messages( $bulk_messages, $bulk_counts ) {
	global $post;

	$bulk_messages['event'] = [
		/* translators: %s: Number of Evenements. */
		'updated'   => _n( '%s Evenement updated.', '%s Evenements updated.', $bulk_counts['updated'], 'ape' ),
		'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 Evenement not updated, somebody is editing it.', 'ape' ) :
						/* translators: %s: Number of Evenements. */
						_n( '%s Evenement not updated, somebody is editing it.', '%s Evenements not updated, somebody is editing them.', $bulk_counts['locked'], 'ape' ),
		/* translators: %s: Number of Evenements. */
		'deleted'   => _n( '%s Evenement permanently deleted.', '%s Evenements permanently deleted.', $bulk_counts['deleted'], 'ape' ),
		/* translators: %s: Number of Evenements. */
		'trashed'   => _n( '%s Evenement moved to the Trash.', '%s Evenements moved to the Trash.', $bulk_counts['trashed'], 'ape' ),
		/* translators: %s: Number of Evenements. */
		'untrashed' => _n( '%s Evenement restored from the Trash.', '%s Evenements restored from the Trash.', $bulk_counts['untrashed'], 'ape' ),
	];

	return $bulk_messages;
}

add_filter( 'bulk_post_updated_messages', 'event_bulk_updated_messages', 10, 2 );

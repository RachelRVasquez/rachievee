<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package rachievee
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function rachievee_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'rachievee_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function rachievee_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'rachievee_pingback_header' );

function register_portfolio_post_type() {
	$labels = array(
		'name'                  => _x( 'Portfolio', 'Post Type General Name', 'rachievee' ),
		'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'rachievee' ),
		'menu_name'             => __( 'Portfolio', 'rachievee' ),
		'name_admin_bar'        => __( 'Portfolio', 'rachievee' ),
		'archives'              => __( 'Portolio Archives', 'rachievee' ),
		'attributes'            => __( 'Portfolio Attributes', 'rachievee' ),
		'all_items'             => __( 'All Portfolio Features', 'rachievee' ),
		'add_new_item'          => __( 'Add New Portfolio Feature', 'rachievee' ),
		'add_new'               => __( 'Add New Feature', 'rachievee' ),
		'new_item'              => __( 'New Feature', 'rachievee' ),
		'edit_item'             => __( 'Edit Portfolio Feature', 'rachievee' ),
		'update_item'           => __( 'Update Feature', 'rachievee' ),
		'view_item'             => __( 'View Feature', 'rachievee' ),
		'view_items'            => __( 'View Features', 'rachievee' ),
		'search_items'          => __( 'Search Portfolio', 'rachievee' ),
		'featured_image'        => __( 'Portfolio Image', 'rachievee' ),
		'set_featured_image'    => __( 'Set portfolio image', 'rachievee' ),
		'remove_featured_image' => __( 'Remove portfolio image', 'rachievee' ),
		'use_featured_image'    => __( 'Use as portfolio image', 'rachievee' ),
		'filter_items_list'     => __( 'Filter items list', 'rachievee' ),
	);
	$args = array(
		'label'                 => __( 'Portfolio', 'rachievee' ),
		'description'           => __( 'Portfolio Features', 'rachievee' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-businesswoman',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);

	register_post_type( 'portfolio', $args );
}
add_action( 'init', 'register_portfolio_post_type', 0 );

function register_portfolio_categories() {
	$labels = array(
		'name'                       => _x( 'Technologies', 'Taxonomy General Name', 'rachievee' ),
		'singular_name'              => _x( 'Technology', 'Taxonomy Singular Name', 'rachievee' ),
		'menu_name'                  => __( 'Technologies', 'rachievee' ),
		'all_items'                  => __( 'All Items', 'rachievee' ),
		'parent_item'                => __( 'Parent Item', 'rachievee' ),
		'parent_item_colon'          => __( 'Parent Item:', 'rachievee' ),
		'new_item_name'              => __( 'New Item Name', 'rachievee' ),
		'add_new_item'               => __( 'Add New Item', 'rachievee' ),
		'edit_item'                  => __( 'Edit Item', 'rachievee' ),
		'update_item'                => __( 'Update Item', 'rachievee' ),
		'view_item'                  => __( 'View Item', 'rachievee' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'rachievee' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'rachievee' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'rachievee' ),
		'popular_items'              => __( 'Popular Items', 'rachievee' ),
		'search_items'               => __( 'Search Items', 'rachievee' ),
		'not_found'                  => __( 'Not Found', 'rachievee' ),
		'no_terms'                   => __( 'No items', 'rachievee' ),
		'items_list'                 => __( 'Items list', 'rachievee' ),
		'items_list_navigation'      => __( 'Items list navigation', 'rachievee' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	register_taxonomy( 'technologies', array( 'portfolio' ), $args );
}
add_action( 'init', 'register_portfolio_categories', 0 );

function remove_portfolio_page_editor() {
    if ( is_admin() && isset( $_GET['post'] ) ) {
        $post_id = $_GET['post'];
        $template = get_post_meta( $post_id, '_wp_page_template', true );

        if ( $template === 'page-portfolio.php' ){
            remove_post_type_support( 'page', 'editor' );
			remove_post_type_support( 'page', 'thumbnail' );
        }
    }
}
add_action( 'init', 'remove_portfolio_page_editor' );

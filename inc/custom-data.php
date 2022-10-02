<?php
/**
 * Custom Data Functions
 *
 * 
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Register Custom Post Type people
// Post Type Key: project
function create_project_cpt() {
$labels = array(
    'name' => __( 'project', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'project', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Projects', 'textdomain' ),
    'name_admin_bar' => __( 'project', 'textdomain' ),
    'archives' => __( 'project Archives', 'textdomain' ),
    'attributes' => __( 'project Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'project:', 'textdomain' ),
    'all_items' => __( 'All projects', 'textdomain' ),
    'add_new_item' => __( 'Add New project', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New project', 'textdomain' ),
    'edit_item' => __( 'Edit project', 'textdomain' ),
    'update_item' => __( 'Update project', 'textdomain' ),
    'view_item' => __( 'View project', 'textdomain' ),
    'view_items' => __( 'View projects', 'textdomain' ),
    'search_items' => __( 'Search projects', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into project', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this project', 'textdomain' ),
    'items_list' => __( 'People list', 'textdomain' ),
    'items_list_navigation' => __( 'project list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter project list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'Project', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-networking',
  );
  register_post_type( 'project', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_project_cpt', 0 );

// Register Custom Post Type people
// Post Type Key: methods
function create_methods_cpt() {
$labels = array(
    'name' => __( 'Methods', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Methods', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Methods', 'textdomain' ),
    'name_admin_bar' => __( 'methods', 'textdomain' ),
    'archives' => __( 'Methods Archives', 'textdomain' ),
    'attributes' => __( 'Methods Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'methods:', 'textdomain' ),
    'all_items' => __( 'All Methods', 'textdomain' ),
    'add_new_item' => __( 'Add New Method', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Method', 'textdomain' ),
    'edit_item' => __( 'Edit Method', 'textdomain' ),
    'update_item' => __( 'Update Method', 'textdomain' ),
    'view_item' => __( 'View Method', 'textdomain' ),
    'view_items' => __( 'View Methods', 'textdomain' ),
    'search_items' => __( 'Search Methods', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into methods', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this methods', 'textdomain' ),
    'items_list' => __( 'People list', 'textdomain' ),
    'items_list_navigation' => __( 'methods list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter methods list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'Methods', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-admin-tools',
  );
  register_post_type( 'methods', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_methods_cpt', 0 );

// Register Custom Post Type people
// Post Type Key: partner
function create_partner_cpt() {
$labels = array(
    'name' => __( 'Partner', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Partner', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Partner', 'textdomain' ),
    'name_admin_bar' => __( 'Partner', 'textdomain' ),
    'archives' => __( 'Partner Archives', 'textdomain' ),
    'attributes' => __( 'Partner Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Partner:', 'textdomain' ),
    'all_items' => __( 'All Partners', 'textdomain' ),
    'add_new_item' => __( 'Add New partner', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New partner', 'textdomain' ),
    'edit_item' => __( 'Edit partner', 'textdomain' ),
    'update_item' => __( 'Update partner', 'textdomain' ),
    'view_item' => __( 'View partner', 'textdomain' ),
    'view_items' => __( 'View partners', 'textdomain' ),
    'search_items' => __( 'Search partners', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into partner', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this partner', 'textdomain' ),
    'items_list' => __( 'People list', 'textdomain' ),
    'items_list_navigation' => __( 'partner list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter partner list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'partner', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-buddicons-buddypress-logo',
  );
  register_post_type( 'partner', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_partner_cpt', 0 );


//member custom post type

// Register Custom Post Type member
// Post Type Key: member

function create_member_cpt() {

  $labels = array(
    'name' => __( 'Members', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Member', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Member', 'textdomain' ),
    'name_admin_bar' => __( 'Member', 'textdomain' ),
    'archives' => __( 'Member Archives', 'textdomain' ),
    'attributes' => __( 'Member Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Member:', 'textdomain' ),
    'all_items' => __( 'All Members', 'textdomain' ),
    'add_new_item' => __( 'Add New Member', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Member', 'textdomain' ),
    'edit_item' => __( 'Edit Member', 'textdomain' ),
    'update_item' => __( 'Update Member', 'textdomain' ),
    'view_item' => __( 'View Member', 'textdomain' ),
    'view_items' => __( 'View Members', 'textdomain' ),
    'search_items' => __( 'Search Members', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into member', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this member', 'textdomain' ),
    'items_list' => __( 'Member list', 'textdomain' ),
    'items_list_navigation' => __( 'Member list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Member list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'Member', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'member', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_member_cpt', 0 );

add_action( 'init', 'create_status_taxonomies', 0 );
function create_status_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Status', 'taxonomy general name' ),
    'singular_name' => _x( 'status', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Status' ),
    'popular_items' => __( 'Popular Status' ),
    'all_items' => __( 'All Statuss' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Status' ),
    'update_item' => __( 'Update status' ),
    'add_new_item' => __( 'Add New status' ),
    'new_item_name' => __( 'New status' ),
    'add_or_remove_items' => __( 'Add or remove Status' ),
    'choose_from_most_used' => __( 'Choose from the most used Status' ),
    'menu_name' => __( 'Status' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('Status',array('member'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'status' ),
    'show_in_rest'          => true,
    'rest_base'             => 'status',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => true,    
  ));
}


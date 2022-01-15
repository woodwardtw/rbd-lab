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
    'menu_name' => __( 'Project', 'textdomain' ),
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
    'menu_icon' => 'dashicons-admin-users',
  );
  register_post_type( 'project', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_project_cpt', 0 );
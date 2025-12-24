<?php
/**
 * Custom Post Type: Services
 * File: inc/cpt/services.php
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Services Custom Post Type
 */
function register_services_post_type() {
    
    $labels = array(
        'name'                  => _x('Services', 'Post type general name', 'textdomain'),
        'singular_name'         => _x('Service', 'Post type singular name', 'textdomain'),
        'menu_name'             => _x('Services', 'Admin Menu text', 'textdomain'),
        'name_admin_bar'        => _x('Service', 'Add New on Toolbar', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'add_new_item'          => __('Add New Service', 'textdomain'),
        'new_item'              => __('New Service', 'textdomain'),
        'edit_item'             => __('Edit Service', 'textdomain'),
        'view_item'             => __('View Service', 'textdomain'),
        'all_items'             => __('All Services', 'textdomain'),
        'search_items'          => __('Search Services', 'textdomain'),
        'parent_item_colon'     => __('Parent Services:', 'textdomain'),
        'not_found'             => __('No services found.', 'textdomain'),
        'not_found_in_trash'    => __('No services found in Trash.', 'textdomain'),
        'featured_image'        => _x('Service Featured Image', 'Overrides the "Featured Image" phrase', 'textdomain'),
        'set_featured_image'    => _x('Set service featured image', 'Overrides the "Set featured image" phrase', 'textdomain'),
        'remove_featured_image' => _x('Remove service featured image', 'Overrides the "Remove featured image" phrase', 'textdomain'),
        'use_featured_image'    => _x('Use as service featured image', 'Overrides the "Use as featured image" phrase', 'textdomain'),
        'archives'              => _x('Service archives', 'The post type archive label', 'textdomain'),
        'insert_into_item'      => _x('Insert into service', 'Overrides the "Insert into post" phrase', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this service', 'Overrides the "Uploaded to this post" phrase', 'textdomain'),
        'filter_items_list'     => _x('Filter services list', 'Screen reader text for the filter links', 'textdomain'),
        'items_list_navigation' => _x('Services list navigation', 'Screen reader text for the pagination', 'textdomain'),
        'items_list'            => _x('Services list', 'Screen reader text for the items list', 'textdomain'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array(
            'slug'       => 'services',
            'with_front' => false,
        ),
        'capability_type'    => 'post',
        'has_archive'        => 'services',
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-admin-tools', // You can change this icon
        'show_in_rest'       => true, // Enable Gutenberg editor
        'supports'           => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'custom-fields',
            'revisions',
            'page-attributes'
        ),
        'taxonomies'         => array('category', 'post_tag'), // Optional: if you want categories/tags
    );

    register_post_type('services', $args);
}

// Hook into the 'init' action
add_action('init', 'register_services_post_type');
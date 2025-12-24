<?php

/**
 * Custom columns for Services admin list
 */
function services_admin_columns($columns) {
    $columns = array(
        'cb'         => $columns['cb'],
        'title'      => __('Service Name', 'textdomain'),
        'thumbnail'  => __('Featured Image', 'textdomain'),
        'date'       => $columns['date'],
    );
    return $columns;
}
add_filter('manage_services_posts_columns', 'services_admin_columns');

/**
 * Display custom column content
 */
function services_admin_columns_content($column, $post_id) {
    switch ($column) {
        case 'thumbnail':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(50, 50));
            } else {
                echo __('No image', 'textdomain');
            }
            break;
    }
}
add_action('manage_services_posts_custom_column', 'services_admin_columns_content', 10, 2);

/**
 * Make thumbnail column sortable (optional)
 */
function services_sortable_columns($columns) {
    $columns['thumbnail'] = 'thumbnail';
    return $columns;
}
add_filter('manage_edit-services_sortable_columns', 'services_sortable_columns');
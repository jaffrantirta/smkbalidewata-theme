<?php
/**
 * Services Metabox - Details
 * File: inc/cpt/services/metabox/details-new/initialize.php
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add Details Metabox
 */
function add_details_metabox() {
    add_meta_box(
        'details_metabox',
        __('Details', 'textdomain'),
        'details_metabox_callback',
        'services',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_details_metabox');
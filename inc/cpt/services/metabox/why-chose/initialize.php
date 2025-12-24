<?php
/**
 * Services Metabox - Why Choose
 * File: inc/cpt/services/metabox/why-chose/initialize.php
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add Why Choose Metabox
 */
function add_why_chose_metabox() {
    add_meta_box(
        'why_chose_metabox',
        __('Why Choose', 'textdomain'),
        'why_chose_metabox_callback',
        'services',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_why_chose_metabox');
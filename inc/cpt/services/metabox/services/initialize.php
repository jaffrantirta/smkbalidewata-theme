
<?php
/**
 * Services Metabox - Medical Our Service
 * File: inc/cpt/services-metabox.php
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add Medical Our Service Metabox
 */
function add_medical_our_service_metabox() {
    add_meta_box(
        'medical_our_service_metabox',
        __('Medical Our Service', 'textdomain'),
        'medical_our_service_metabox_callback',
        'services',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_medical_our_service_metabox');
<?php
/**
 * Services Metabox - CTA Book New
 * File: inc/cpt/services/metabox/cta-book-new/initialize.php
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add CTA Book New Metabox
 */
function add_cta_book_new_metabox() {
    add_meta_box(
        'cta_book_new_metabox',
        __('CTA Book New', 'textdomain'),
        'cta_book_new_metabox_callback',
        'services',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_cta_book_new_metabox');
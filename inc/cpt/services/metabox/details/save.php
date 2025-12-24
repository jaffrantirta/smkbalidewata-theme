<?php

/**
 * Save Details Metabox Data
 */
function save_details_data($post_id) {
    // Check nonce
    if (!isset($_POST['details_nonce']) || !wp_verify_nonce($_POST['details_nonce'], 'save_details_data')) {
        return;
    }
    
    // Check if user has permission
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Check if this is an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Save the title field
    if (isset($_POST['_details_title'])) {
        $title = sanitize_text_field($_POST['_details_title']);
        update_post_meta($post_id, '_details_title', $title);
    } else {
        delete_post_meta($post_id, '_details_title');
    }
}
add_action('save_post', 'save_details_data');
<?php

/**
 * Save CTA Book New Metabox Data
 */
function save_cta_book_new_data($post_id) {
    // Check nonce
    if (!isset($_POST['cta_book_new_nonce']) || !wp_verify_nonce($_POST['cta_book_new_nonce'], 'save_cta_book_new_data')) {
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
    
    // Save the image field
    if (isset($_POST['_cta_book_new_image'])) {
        $image = sanitize_text_field($_POST['_cta_book_new_image']);
        update_post_meta($post_id, '_cta_book_new_image', $image);
    } else {
        delete_post_meta($post_id, '_cta_book_new_image');
    }
    
    // Save the title field
    if (isset($_POST['_cta_book_new_title'])) {
        $title = sanitize_text_field($_POST['_cta_book_new_title']);
        update_post_meta($post_id, '_cta_book_new_title', $title);
    } else {
        delete_post_meta($post_id, '_cta_book_new_title');
    }
    
    // Save the description field
    if (isset($_POST['_cta_book_new_description'])) {
        $description = sanitize_textarea_field($_POST['_cta_book_new_description']);
        update_post_meta($post_id, '_cta_book_new_description', $description);
    } else {
        delete_post_meta($post_id, '_cta_book_new_description');
    }
    
    // Save the whatsapp link field
    if (isset($_POST['_cta_book_new_whatsapp_link'])) {
        $whatsapp_link = sanitize_text_field($_POST['_cta_book_new_whatsapp_link']);
        update_post_meta($post_id, '_cta_book_new_whatsapp_link', $whatsapp_link);
    } else {
        delete_post_meta($post_id, '_cta_book_new_whatsapp_link');
    }
}
add_action('save_post', 'save_cta_book_new_data');
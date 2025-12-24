<?php

/**
 * Save Why Choose Metabox Data
 */
function save_why_chose_data($post_id) {
    // Check nonce
    if (!isset($_POST['why_chose_nonce']) || !wp_verify_nonce($_POST['why_chose_nonce'], 'save_why_chose_data')) {
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
    
    // Save the title section
    if (isset($_POST['_why_chose_title_section'])) {
        $title_section = sanitize_text_field($_POST['_why_chose_title_section']);
        update_post_meta($post_id, '_why_chose_title_section', $title_section);
    } else {
        delete_post_meta($post_id, '_why_chose_title_section');
    }
    
    // Save the entries data
    if (isset($_POST['_why_chose'])) {
        $why_chose_data = array();
        
        foreach ($_POST['_why_chose'] as $item) {
            $why_chose_data[] = array(
                'icon' => sanitize_text_field($item['icon']),
                'title' => sanitize_text_field($item['title']),
                'description' => sanitize_textarea_field($item['description'])
            );
        }
        
        update_post_meta($post_id, '_why_chose', $why_chose_data);
    } else {
        delete_post_meta($post_id, '_why_chose');
    }
}
add_action('save_post', 'save_why_chose_data');
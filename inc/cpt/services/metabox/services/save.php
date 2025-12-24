<?php

/**
 * Save Metabox Data
 */
function save_medical_our_service_data($post_id) {
    // Check nonce
    if (!isset($_POST['medical_our_service_nonce']) || !wp_verify_nonce($_POST['medical_our_service_nonce'], 'save_medical_our_service_data')) {
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
    if (isset($_POST['_medical_title_section'])) {
        $title_section = sanitize_text_field($_POST['_medical_title_section']);
        update_post_meta($post_id, '_medical_title_section', $title_section);
    } else {
        delete_post_meta($post_id, '_medical_title_section');
    }
    
    // Save the description section
    if (isset($_POST['_medical_description_section'])) {
        $description_section = wp_kses_post($_POST['_medical_description_section']);
        update_post_meta($post_id, '_medical_description_section', $description_section);
    } else {
        delete_post_meta($post_id, '_medical_description_section');
    }
    
    // Save the service entries data
    if (isset($_POST['_medical_our_service'])) {
        $medical_services = array();
        
        foreach ($_POST['_medical_our_service'] as $service) {
            $medical_services[] = array(
                'image' => sanitize_text_field($service['image']),
                'title' => sanitize_text_field($service['title']),
                'description' => wp_kses_post($service['description']),
                'description_list' => wp_kses_post($service['description_list'])
            );
        }
        
        update_post_meta($post_id, '_medical_our_service', $medical_services);
    } else {
        delete_post_meta($post_id, '_medical_our_service');
    }
}
add_action('save_post', 'save_medical_our_service_data');
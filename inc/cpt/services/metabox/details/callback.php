<?php

/**
 * Details Metabox Callback Function
 */
function details_metabox_callback($post) {
    // Add nonce field for security
    wp_nonce_field('save_details_data', 'details_nonce');
    
    // Get existing values
    $title = get_post_meta($post->ID, '_details_title', true);
    ?>
    
    <div id="details-container">
        
        <!-- Title Field -->
        <div class="field-group">
            <label><strong><?php _e('Title:', 'textdomain'); ?></strong></label>
            <input type="text" 
                   name="_details_title" 
                   value="<?php echo esc_attr($title); ?>" 
                   style="width: 100%;" 
                   placeholder="<?php _e('Enter title', 'textdomain'); ?>">
        </div>

    </div>

    <style>
        .field-group {
            margin-bottom: 15px;
        }
        
        .field-group label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
    <?php
}
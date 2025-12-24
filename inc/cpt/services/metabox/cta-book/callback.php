<?php

/**
 * CTA Book New Metabox Callback Function
 */
function cta_book_new_metabox_callback($post) {
    // Add nonce field for security
    wp_nonce_field('save_cta_book_new_data', 'cta_book_new_nonce');
    
    // Get existing values
    $image = get_post_meta($post->ID, '_cta_book_new_image', true);
    $title = get_post_meta($post->ID, '_cta_book_new_title', true);
    $description = get_post_meta($post->ID, '_cta_book_new_description', true);
    $whatsapp_link = get_post_meta($post->ID, '_cta_book_new_whatsapp_link', true);
    ?>
    
    <div id="cta-book-new-container">
        
        <!-- Image Field -->
        <div class="field-group">
            <label><strong><?php _e('Image:', 'textdomain'); ?></strong></label>
            <div class="cta-book-new-image-wrapper">
                <input type="hidden" 
                       name="_cta_book_new_image" 
                       value="<?php echo esc_attr($image); ?>" 
                       class="cta-book-new-image-input">
                
                <div class="cta-book-new-image-preview">
                    <?php if (!empty($image)) : ?>
                        <?php echo wp_get_attachment_image($image, 'medium', false, array('style' => 'max-width: 200px; height: auto;')); ?>
                    <?php endif; ?>
                </div>
                
                <div class="cta-book-new-image-buttons">
                    <button type="button" class="button cta-book-new-upload-button">
                        <?php _e('Upload Image', 'textdomain'); ?>
                    </button>
                    <button type="button" class="button cta-book-new-remove-button" <?php echo empty($image) ? 'style="display:none;"' : ''; ?>>
                        <?php _e('Remove Image', 'textdomain'); ?>
                    </button>
                </div>
            </div>
        </div>

        <!-- Title Field -->
        <div class="field-group">
            <label><strong><?php _e('Title:', 'textdomain'); ?></strong></label>
            <input type="text" 
                   name="_cta_book_new_title" 
                   value="<?php echo esc_attr($title); ?>" 
                   style="width: 100%;" 
                   placeholder="<?php _e('Enter title', 'textdomain'); ?>">
        </div>

        <!-- Description Field -->
        <div class="field-group">
            <label><strong><?php _e('Description:', 'textdomain'); ?></strong></label>
            <textarea name="_cta_book_new_description" 
                      rows="4" 
                      style="width: 100%;" 
                      placeholder="<?php _e('Enter description', 'textdomain'); ?>"><?php echo esc_textarea($description); ?></textarea>
        </div>

        <!-- WhatsApp Link Field -->
        <div class="field-group">
            <label><strong><?php _e('WhatsApp Link:', 'textdomain'); ?></strong></label>
            <input type="text" 
                   name="_cta_book_new_whatsapp_link" 
                   value="<?php echo esc_attr($whatsapp_link); ?>" 
                   style="width: 100%;" 
                   placeholder="<?php _e('Enter WhatsApp link text', 'textdomain'); ?>">
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
        
        .cta-book-new-image-wrapper {
            border: 1px dashed #ccc;
            padding: 15px;
            text-align: center;
            background: #fff;
        }
        
        .cta-book-new-image-preview {
            margin-bottom: 10px;
            min-height: 50px;
        }
        
        .cta-book-new-image-preview img {
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        
        .cta-book-new-image-buttons button {
            margin: 0 5px;
        }
    </style>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // Simple Media uploader for CTA Book New
            $(document).on('click', '.cta-book-new-upload-button', function(e) {
                e.preventDefault();
                
                var button = $(this);
                var wrapper = button.closest('.cta-book-new-image-wrapper');
                var currentWrapper = wrapper;
                
                var mediaUploader = wp.media({
                    title: 'Select Image',
                    button: {
                        text: 'Use Image'
                    },
                    multiple: false
                });
                
                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    var imageUrl = attachment.url;
                    if (attachment.sizes && attachment.sizes.medium) {
                        imageUrl = attachment.sizes.medium.url;
                    }
                    
                    currentWrapper.find('.cta-book-new-image-input').val(attachment.id);
                    currentWrapper.find('.cta-book-new-image-preview').html('<img src="' + imageUrl + '" style="max-width: 200px; height: auto; border: 1px solid #ddd; border-radius: 3px;">');
                    currentWrapper.find('.cta-book-new-remove-button').show();
                });
                
                mediaUploader.open();
            });
            
            // Remove image
            $(document).on('click', '.cta-book-new-remove-button', function(e) {
                e.preventDefault();
                var wrapper = $(this).closest('.cta-book-new-image-wrapper');
                wrapper.find('.cta-book-new-image-input').val('');
                wrapper.find('.cta-book-new-image-preview').html('');
                $(this).hide();
            });
        });
    </script>
    <?php
}
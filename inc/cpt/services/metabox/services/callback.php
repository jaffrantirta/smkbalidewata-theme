<?php

/**
 * Metabox Callback Function
 */
function medical_our_service_metabox_callback($post) {
    // Add nonce field for security
    wp_nonce_field('save_medical_our_service_data', 'medical_our_service_nonce');
    
    // Get existing values
    $medical_services = get_post_meta($post->ID, '_medical_our_service', true);
    $medical_title_section = get_post_meta($post->ID, '_medical_title_section', true);
    $medical_description_section = get_post_meta($post->ID, '_medical_description_section', true);
    
    // If no data exists, create empty array with one entry
    if (empty($medical_services)) {
        $medical_services = array(
            array(
                'image' => '',
                'title' => '',
                'description' => '',
                'description_list' => ''
            )
        );
    }
    ?>
    
    <div id="medical-our-service-container">
        <!-- Title Section Field -->
        <div class="title-section-field">
            <h3><?php _e('Section Title', 'textdomain'); ?></h3>
            <div class="field-group">
                <label><strong><?php _e('Title Section:', 'textdomain'); ?></strong></label>
                <input type="text" 
                       name="_medical_title_section" 
                       value="<?php echo esc_attr($medical_title_section); ?>" 
                       style="width: 100%;" 
                       placeholder="<?php _e('Enter section title', 'textdomain'); ?>">
            </div>
        </div>
        
        <!-- Description Section Field -->
        <div class="description-section-field">
            <div class="field-group">
                <label><strong><?php _e('Section Description:', 'textdomain'); ?></strong></label>
                <?php 
                wp_editor(
                    $medical_description_section,
                    'medical_description_section',
                    array(
                        'textarea_name' => '_medical_description_section',
                        'media_buttons' => true,
                        'textarea_rows' => 5,
                        'editor_height' => 200
                    )
                );
                ?>
            </div>
        </div>
        
        <hr style="margin: 20px 0;">
        
        <h3><?php _e('Service Entries', 'textdomain'); ?></h3>
        <div id="medical-service-entries">
            <?php foreach ($medical_services as $index => $service) : ?>
                <div class="medical-service-entry" data-index="<?php echo $index; ?>">
                    <h4>Entry #<?php echo ($index + 1); ?></h4>
                    <div class="service-entry-content">
                        
                        <!-- Image Field -->
                        <div class="field-group">
                            <label><strong><?php _e('Image:', 'textdomain'); ?></strong></label>
                            <div class="image-upload-wrapper">
                                <input type="hidden" 
                                       name="_medical_our_service[<?php echo $index; ?>][image]" 
                                       value="<?php echo esc_attr($service['image']); ?>" 
                                       class="image-id-input">
                                
                                <div class="image-preview">
                                    <?php if (!empty($service['image'])) : ?>
                                        <?php echo wp_get_attachment_image($service['image'], 'medium', false, array('style' => 'max-width: 200px; height: auto;')); ?>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="image-buttons">
                                    <button type="button" class="button upload-image-button">
                                        <?php _e('Upload Image', 'textdomain'); ?>
                                    </button>
                                    <button type="button" class="button remove-image-button" <?php echo empty($service['image']) ? 'style="display:none;"' : ''; ?>>
                                        <?php _e('Remove Image', 'textdomain'); ?>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Title Field -->
                        <div class="field-group">
                            <label><strong><?php _e('Title:', 'textdomain'); ?></strong></label>
                            <input type="text" 
                                   name="_medical_our_service[<?php echo $index; ?>][title]" 
                                   value="<?php echo esc_attr($service['title']); ?>" 
                                   style="width: 100%;" 
                                   placeholder="<?php _e('Enter service title', 'textdomain'); ?>">
                        </div>

                        <!-- Description Field -->
                        <div class="field-group">
                            <label><strong><?php _e('Description:', 'textdomain'); ?></strong></label>
                            <?php 
                            wp_editor(
                                $service['description'],
                                'medical_service_description_' . $index,
                                array(
                                    'textarea_name' => '_medical_our_service[' . $index . '][description]',
                                    'media_buttons' => true,
                                    'textarea_rows' => 8,
                                )
                            );
                            ?>
                        </div>

                        <!-- Description List Field -->
                        <div class="field-group">
                            <label><strong><?php _e('Description List:', 'textdomain'); ?></strong></label>
                            <?php 
                            wp_editor(
                                $service['description_list'],
                                'medical_service_description_list_' . $index,
                                array(
                                    'textarea_name' => '_medical_our_service[' . $index . '][description_list]',
                                    'media_buttons' => true,
                                    'textarea_rows' => 6,
                                )
                            );
                            ?>
                        </div>

                        <!-- Remove Entry Button -->
                        <div class="field-group">
                            <button type="button" class="button button-secondary remove-entry-button">
                                <?php _e('Remove Entry', 'textdomain'); ?>
                            </button>
                        </div>
                    </div>
                    <hr>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="add-entry-section">
            <button type="button" id="add-medical-service-entry" class="button button-primary">
                <?php _e('Add New Entry', 'textdomain'); ?>
            </button>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var entryCount = <?php echo count($medical_services); ?>;
            
            // Add new entry
            $('#add-medical-service-entry').on('click', function() {
                var editorId = 'medical_service_description_' + entryCount;
                var newEntry = `
                    <div class="medical-service-entry" data-index="${entryCount}">
                        <h4>Entry #${entryCount + 1}</h4>
                        <div class="service-entry-content">
                            <div class="field-group">
                                <label><strong><?php _e('Image:', 'textdomain'); ?></strong></label>
                                <div class="image-upload-wrapper">
                                    <input type="hidden" name="_medical_our_service[${entryCount}][image]" value="" class="image-id-input">
                                    <div class="image-preview"></div>
                                    <div class="image-buttons">
                                        <button type="button" class="button upload-image-button"><?php _e('Upload Image', 'textdomain'); ?></button>
                                        <button type="button" class="button remove-image-button" style="display:none;"><?php _e('Remove Image', 'textdomain'); ?></button>
                                    </div>
                                </div>
                            </div>
                            <div class="field-group">
                                <label><strong><?php _e('Title:', 'textdomain'); ?></strong></label>
                                <input type="text" name="_medical_our_service[${entryCount}][title]" value="" style="width: 100%;" placeholder="<?php _e('Enter service title', 'textdomain'); ?>">
                            </div>
                            <div class="field-group">
                                <label><strong><?php _e('Description:', 'textdomain'); ?></strong></label>
                                <div id="${editorId}_container">
                                    <textarea id="${editorId}" name="_medical_our_service[${entryCount}][description]" rows="6" style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="field-group">
                                <label><strong><?php _e('Description List:', 'textdomain'); ?></strong></label>
                                <div id="${editorId}_list_container">
                                    <textarea id="${editorId}_list" name="_medical_our_service[${entryCount}][description_list]" rows="6" style="width: 100%;"></textarea>
                                </div>
                            </div>
                            <div class="field-group">
                                <button type="button" class="button button-secondary remove-entry-button"><?php _e('Remove Entry', 'textdomain'); ?></button>
                            </div>
                        </div>
                        <hr>
                    </div>
                `;
                
                $('#medical-service-entries').append(newEntry);
                entryCount++;
                updateEntryNumbers();
            });
            
            // Remove entry
            $(document).on('click', '.remove-entry-button', function() {
                if ($('.medical-service-entry').length > 1) {
                    $(this).closest('.medical-service-entry').remove();
                    updateEntryNumbers();
                } else {
                    alert('<?php _e('You must have at least one entry.', 'textdomain'); ?>');
                }
            });
            
            // Update entry numbers
            function updateEntryNumbers() {
                $('.medical-service-entry').each(function(index) {
                    $(this).find('h4').text('Entry #' + (index + 1));
                    $(this).attr('data-index', index);
                    
                    // Update field names
                    $(this).find('input, textarea').each(function() {
                        var name = $(this).attr('name');
                        if (name) {
                            name = name.replace(/\[\d+\]/, '[' + index + ']');
                            $(this).attr('name', name);
                        }
                    });
                });
            }
            
            // Simple Media uploader
            $(document).on('click', '.upload-image-button', function(e) {
                e.preventDefault();
                
                var button = $(this);
                var wrapper = button.closest('.image-upload-wrapper');
                var currentWrapper = wrapper; // Store reference
                
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
                    
                    currentWrapper.find('.image-id-input').val(attachment.id);
                    currentWrapper.find('.image-preview').html('<img src="' + imageUrl + '" style="max-width: 200px; height: auto; border: 1px solid #ddd; border-radius: 3px;">');
                    currentWrapper.find('.remove-image-button').show();
                });
                
                mediaUploader.open();
            });
            
            // Remove image
            $(document).on('click', '.remove-image-button', function(e) {
                e.preventDefault();
                var wrapper = $(this).closest('.image-upload-wrapper');
                wrapper.find('.image-id-input').val('');
                wrapper.find('.image-preview').html('');
                $(this).hide();
            });
        });
    </script>
    <?php
}

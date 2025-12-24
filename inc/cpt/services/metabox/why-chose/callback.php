<?php

/**
 * Why Choose Metabox Callback Function
 */
function why_chose_metabox_callback($post) {
    // Add nonce field for security
    wp_nonce_field('save_why_chose_data', 'why_chose_nonce');
    
    // Get existing values
    $why_chose_data = get_post_meta($post->ID, '_why_chose', true);
    $why_chose_title_section = get_post_meta($post->ID, '_why_chose_title_section', true);
    
    // If no data exists, create empty array with one entry
    if (empty($why_chose_data)) {
        $why_chose_data = array(
            array(
                'icon' => '',
                'title' => '',
                'description' => ''
            )
        );
    }
    ?>
    
    <div id="why-chose-container">
        <!-- Title Section Field -->
        <div class="title-section-field">
            <h3><?php _e('Section Title', 'textdomain'); ?></h3>
            <div class="field-group">
                <label><strong><?php _e('Title Section:', 'textdomain'); ?></strong></label>
                <input type="text" 
                       name="_why_chose_title_section" 
                       value="<?php echo esc_attr($why_chose_title_section); ?>" 
                       style="width: 100%;" 
                       placeholder="<?php _e('Enter section title', 'textdomain'); ?>">
            </div>
        </div>
        
        <hr style="margin: 20px 0;">
        
        <h3><?php _e('Why Choose Entries', 'textdomain'); ?></h3>
        <div id="why-chose-entries">
            <?php foreach ($why_chose_data as $index => $item) : ?>
                <div class="why-chose-entry" data-index="<?php echo $index; ?>">
                    <h4>Entry #<?php echo ($index + 1); ?></h4>
                    <div class="why-chose-content">
                        
                        <!-- Icon Field -->
                        <div class="field-group">
                            <label><strong><?php _e('Icon:', 'textdomain'); ?></strong></label>
                            <input type="text" 
                                   name="_why_chose[<?php echo $index; ?>][icon]" 
                                   value="<?php echo esc_attr($item['icon']); ?>" 
                                   style="width: 100%;" 
                                   placeholder="<?php _e('Enter icon text', 'textdomain'); ?>">
                        </div>

                        <!-- Title Field -->
                        <div class="field-group">
                            <label><strong><?php _e('Title:', 'textdomain'); ?></strong></label>
                            <input type="text" 
                                   name="_why_chose[<?php echo $index; ?>][title]" 
                                   value="<?php echo esc_attr($item['title']); ?>" 
                                   style="width: 100%;" 
                                   placeholder="<?php _e('Enter title', 'textdomain'); ?>">
                        </div>

                        <!-- Description Field -->
                        <div class="field-group">
                            <label><strong><?php _e('Description:', 'textdomain'); ?></strong></label>
                            <textarea name="_why_chose[<?php echo $index; ?>][description]" 
                                      rows="4" 
                                      style="width: 100%;" 
                                      placeholder="<?php _e('Enter description', 'textdomain'); ?>"><?php echo esc_textarea($item['description']); ?></textarea>
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
            <button type="button" id="add-why-chose-entry" class="button button-primary">
                <?php _e('Add New Entry', 'textdomain'); ?>
            </button>
        </div>
    </div>

    <style>
        .title-section-field {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #0073aa;
            border-radius: 5px;
            background: #f0f8ff;
        }
        
        .why-chose-entry {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f9f9f9;
        }
        
        .why-chose-content {
            margin-top: 10px;
        }
        
        .field-group {
            margin-bottom: 15px;
        }
        
        .field-group label {
            display: block;
            margin-bottom: 5px;
        }
        
        .add-entry-section {
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            border: 2px dashed #0073aa;
            border-radius: 5px;
            background: #f0f8ff;
        }
        
        .remove-entry-button {
            color: #a00;
            border-color: #a00;
        }
        
        .remove-entry-button:hover {
            background: #a00;
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var entryCount = <?php echo is_array($why_chose_data) ? count($why_chose_data) : 1; ?>;
            
            // Add new entry
            $('#add-why-chose-entry').on('click', function() {
                var newEntry = `
                    <div class="why-chose-entry" data-index="${entryCount}">
                        <h4>Entry #${entryCount + 1}</h4>
                        <div class="why-chose-content">
                            <div class="field-group">
                                <label><strong><?php _e('Icon:', 'textdomain'); ?></strong></label>
                                <input type="text" name="_why_chose[${entryCount}][icon]" value="" style="width: 100%;" placeholder="<?php _e('Enter icon text', 'textdomain'); ?>">
                            </div>
                            <div class="field-group">
                                <label><strong><?php _e('Title:', 'textdomain'); ?></strong></label>
                                <input type="text" name="_why_chose[${entryCount}][title]" value="" style="width: 100%;" placeholder="<?php _e('Enter title', 'textdomain'); ?>">
                            </div>
                            <div class="field-group">
                                <label><strong><?php _e('Description:', 'textdomain'); ?></strong></label>
                                <textarea name="_why_chose[${entryCount}][description]" rows="4" style="width: 100%;" placeholder="<?php _e('Enter description', 'textdomain'); ?>"></textarea>
                            </div>
                            <div class="field-group">
                                <button type="button" class="button button-secondary remove-entry-button"><?php _e('Remove Entry', 'textdomain'); ?></button>
                            </div>
                        </div>
                        <hr>
                    </div>
                `;
                
                $('#why-chose-entries').append(newEntry);
                entryCount++;
                updateEntryNumbers();
            });
            
            // Remove entry
            $(document).on('click', '.remove-entry-button', function() {
                if ($('.why-chose-entry').length > 1) {
                    $(this).closest('.why-chose-entry').remove();
                    updateEntryNumbers();
                } else {
                    alert('<?php _e('You must have at least one entry.', 'textdomain'); ?>');
                }
            });
            
            // Update entry numbers
            function updateEntryNumbers() {
                $('.why-chose-entry').each(function(index) {
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
        });
    </script>
    <?php
}
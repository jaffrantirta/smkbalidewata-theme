<?php
/**
 * Multiple Images Control for WordPress Customizer
 *
 * Allows uploading multiple images in WordPress Customizer
 * Used for: Gallery sections, image sliders, etc.
 *
 * @package Visit_Padar_Island
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Custom Control for Multiple Images
 * Only loaded when in Customizer context
 */
if (class_exists('WP_Customize_Control')) {
    class WP_Customize_Multiple_Images_Control extends WP_Customize_Control {
        /**
         * Control type
         * @var string
         */
        public $type = 'multiple-images';

        /**
         * Enqueue scripts and styles
         */
        public function enqueue() {
            wp_enqueue_media();
            wp_enqueue_script(
                'multiple-images-control',
                get_template_directory_uri() . '/assets/js/customizer-multiple-images.js',
                array('jquery', 'customize-controls'),
                '1.0',
                true
            );
            wp_enqueue_style(
                'multiple-images-control',
                get_template_directory_uri() . '/assets/css/customizer-multiple-images.css',
                array(),
                '1.0'
            );
        }

        /**
         * Render control content
         */
        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php if (!empty($this->description)) : ?>
                    <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
                <?php endif; ?>
            </label>
            <div class="multiple-images-container">
                <div class="images-preview" data-images="<?php echo esc_attr($this->value()); ?>">
                    <?php
                    $images = $this->value() ? explode(',', $this->value()) : array();
                    foreach ($images as $image_id) {
                        if ($image_id) {
                            $image_url = wp_get_attachment_url($image_id);
                            ?>
                            <div class="image-preview-wrapper" data-image-id="<?php echo esc_attr($image_id); ?>">
                                <img src="<?php echo esc_url($image_url); ?>" alt="" />
                                <button type="button" class="remove-image" data-image-id="<?php echo esc_attr($image_id); ?>">×</button>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <button type="button" class="button add-images"><?php _e('Add Images', 'visit-padar-island'); ?></button>
                <input type="hidden" class="multiple-images-input" <?php $this->link(); ?> value="<?php echo esc_attr($this->value()); ?>" />
            </div>
            <?php
        }
    }
}

<?php
/**
 * Footer Partners Control for WordPress Customizer
 *
 * Repeater control for managing footer partner logos with URLs
 * Allows: Add/Edit/Remove partners dynamically
 *
 * @package Visit_Padar_Island
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Custom Control for Footer Partners (Repeater)
 * Only loaded when in Customizer context
 */
if (class_exists('WP_Customize_Control')) {
    class WP_Customize_Footer_Partners_Control extends WP_Customize_Control {
        /**
         * Control type
         * @var string
         */
        public $type = 'footer-partners';

        /**
         * Enqueue scripts and styles
         */
        public function enqueue() {
            wp_enqueue_media();
            wp_enqueue_script(
                'footer-partners-control',
                get_template_directory_uri() . '/assets/js/customizer-footer-partners.js',
                array('jquery', 'customize-controls'),
                '1.0',
                true
            );
            wp_enqueue_style(
                'footer-partners-control',
                get_template_directory_uri() . '/assets/css/customizer-footer-partners.css',
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
            <div class="footer-partners-container">
                <div class="partners-list">
                    <?php
                    $partners_json = $this->value();
                    $partners = !empty($partners_json) ? json_decode($partners_json, true) : array();

                    if (!empty($partners)) {
                        foreach ($partners as $index => $partner) {
                            $this->render_partner_item($index, $partner);
                        }
                    }
                    ?>
                </div>
                <button type="button" class="button add-partner"><?php _e('Add Partner', 'visit-padar-island'); ?></button>
                <input type="hidden" class="footer-partners-input" <?php $this->link(); ?> value="<?php echo esc_attr($this->value()); ?>" />
            </div>

            <!-- Template for new partner -->
            <script type="text/template" id="partner-item-template">
                <?php $this->render_partner_item('{{INDEX}}', array('image' => '', 'url' => '', 'title' => '')); ?>
            </script>
            <?php
        }

        /**
         * Render individual partner item
         *
         * @param int|string $index Partner index
         * @param array $partner Partner data (image, url, title)
         */
        private function render_partner_item($index, $partner) {
            $image_url = !empty($partner['image']) ? wp_get_attachment_url($partner['image']) : '';
            ?>
            <div class="partner-item" data-index="<?php echo esc_attr($index); ?>">
                <div class="partner-image-preview">
                    <?php if ($image_url) : ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="">
                    <?php else : ?>
                        <span class="placeholder">No Image</span>
                    <?php endif; ?>
                </div>
                <div class="partner-fields">
                    <input type="text"
                           class="partner-title"
                           placeholder="Partner Title"
                           value="<?php echo esc_attr($partner['title'] ?? ''); ?>">
                    <input type="url"
                           class="partner-url"
                           placeholder="https://partner-website.com"
                           value="<?php echo esc_url($partner['url'] ?? ''); ?>">
                    <input type="hidden"
                           class="partner-image-id"
                           value="<?php echo esc_attr($partner['image'] ?? ''); ?>">
                    <button type="button" class="button select-partner-image">
                        <?php echo !empty($partner['image']) ? __('Change Image', 'visit-padar-island') : __('Select Image', 'visit-padar-island'); ?>
                    </button>
                    <button type="button" class="button-link button-link-delete remove-partner"><?php _e('Remove', 'visit-padar-island'); ?></button>
                </div>
            </div>
            <?php
        }
    }
}

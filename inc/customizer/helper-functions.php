<?php
/**
 * Customizer Helper Functions
 *
 * Helper functions to retrieve customizer data for use in templates
 *
 * @package Visit_Padar_Island
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get Gallery Images from Customizer
 *
 * Retrieves multiple images uploaded via customizer gallery control
 * Returns array of image data (id, url, alt, title)
 *
 * @return array Array of image data or empty array
 */
function vpi_get_gallery_images() {
    $gallery_ids = get_theme_mod('gallery_images', '');

    if (empty($gallery_ids)) {
        return array();
    }

    $image_ids = explode(',', $gallery_ids);
    $images = array();

    foreach ($image_ids as $image_id) {
        if ($image_id) {
            $images[] = array(
                'id' => $image_id,
                'url' => wp_get_attachment_url($image_id),
                'alt' => get_post_meta($image_id, '_wp_attachment_image_alt', true),
                'title' => get_the_title($image_id)
            );
        }
    }

    return $images;
}

/**
 * Get Footer Partners from Customizer
 *
 * Retrieves partner logos with URLs from customizer repeater control
 * Returns array of partner data (image, url, title)
 *
 * @return array Array of partner data or empty array
 */
function vpi_get_footer_partners() {
    $partners_json = get_theme_mod('footer_partners', '');

    if (empty($partners_json)) {
        return array();
    }

    $partners = json_decode($partners_json, true);
    $result = array();

    if (!empty($partners) && is_array($partners)) {
        foreach ($partners as $partner) {
            if (!empty($partner['image'])) {
                $result[] = array(
                    'image' => wp_get_attachment_url($partner['image']),
                    'url' => $partner['url'] ?? '',
                    'title' => $partner['title'] ?? ''
                );
            }
        }
    }

    return $result;
}

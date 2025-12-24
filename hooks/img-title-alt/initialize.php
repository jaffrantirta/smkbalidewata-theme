<?php
function get_title($image_path, $fallback = '') {
    $attachment_id = attachment_url_to_postid(home_url() . $image_path);
    return $attachment_id ? get_the_title($attachment_id) : $fallback;
}

function get_alt_v1($image_path, $fallback = '') {
    $attachment_id = attachment_url_to_postid(home_url() . $image_path);
    $alt = $attachment_id ? get_post_meta($attachment_id, '_wp_attachment_image_alt', true) : '';
    return $alt ?: $fallback;
}
<?php

/**
 * Calculate the estimated reading time for a post.
 *
 * @param int $post_id The ID of the post.
 * @return int The estimated reading time in minutes.
 */
function calculate_reading_time($post_id)
{
    // Get the post content
    $content = get_post_field('post_content', $post_id);

    // Remove shortcodes and HTML tags
    $clean_content = strip_shortcodes(strip_tags($content));

    // Count the words
    $word_count = str_word_count($clean_content);

    // Average reading speed (words per minute)
    $reading_speed = 200;

    // Calculate reading time in minutes
    $reading_time = ceil($word_count / $reading_speed);

    return $reading_time;
}

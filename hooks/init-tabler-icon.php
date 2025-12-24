<?php
function enqueue_tabler_icons()
{
    // Enqueue Tabler Icons JavaScript
    wp_enqueue_style('tabler-icons', 'https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css', array(), null);
}
add_action('wp_enqueue_scripts', 'enqueue_tabler_icons');

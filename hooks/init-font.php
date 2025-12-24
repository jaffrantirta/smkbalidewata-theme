<?php
function enqueue_google_fonts()
{
    wp_enqueue_style(
        'Playfair-Display',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap',
        array(), // no dependencies
        null     // load latest version
    );
    wp_enqueue_style(
        'Inter',
        'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap',
        array(), // no dependencies
        null     // load latest version
    );
}
add_action('wp_enqueue_scripts', 'enqueue_google_fonts');

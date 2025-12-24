<?php
// Register navigation menu
function jhg_register_menus()
{
    register_nav_menus(array(
        'header_menu' => __('Header Menu', 'jhg'),
    ));
}
add_action('init', 'jhg_register_menus');

function custom_nav_menu()
{
    wp_nav_menu(array(
        'theme_location' => 'header_menu',
        'walker'           => new Custom_Walker_Nav_Menu(),
        'container'        => 'nav',
        'container_class'  => 'custom-nav-container',
        'menu_class'       => 'nav-menu',
        'depth'             => 5, // Allow submenus
    ));
}

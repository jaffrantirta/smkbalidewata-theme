<?php
// Custom Walker for Mega Menu
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{
    // Start Level to add custom classes for each level
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        // Add custom class based on the depth of the submenu
        $classes = 'submenu depth-' . $depth;
        $output .= "\n<ul class=\"$classes\">\n";
    }

    // Start Element for each menu item
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Check if this item has children and add a class
        $has_children = !empty($item->classes) && in_array('menu-item-has-children', $item->classes) ? true : false;

        // Add "dropdown" or "has-children" class for items with children
        if ($has_children) {
            $classes[] = 'has-children';
        }

        // Join classes and apply filters
        $classes = join(' ', apply_filters(
            'nav_menu_css_class',
            array_filter($classes),
            $item,
            $args
        ));
        $classes = $classes ? ' class="' . esc_attr($classes) . '"' : '';

        $id = $id ? ' id="menu-item-' . $item->ID . '"' : '';
        $output .= '<li' . $id . $classes . '>';

        $attributes  = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target)     ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn)        ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url)        ? ' href="' . esc_attr($item->url) . '"' : '';

        // Add custom class for anchor
        $class = "menu-link";
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . ' class="' . $class . '">';

        // Title
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;

        // **Add icon if the item has children**
        if ($has_children) {
            $item_output .= ' <i class="ti ti-chevron-down"></i>';
        }

        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= $item_output;
    }

    // Display the children of each item
    function display_children(&$output, $item, $depth, $args)
    {
        // We check the children count and ensure it's non-empty
        if ($item->has_children) {
            $output .= "<ul class='submenu'>";
            foreach ($item->children as $child) {
                $this->start_el($output, $child, $depth + 1, $args);
            }
            $output .= "</ul>";
        }
    }
}

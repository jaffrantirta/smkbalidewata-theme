<?php

/**
 * Generate a breadcrumb trail with Tailwind CSS classes.
 */
function jhg_breadcrumb()
{

    // Do nothing if we’re on the home page.
    if (is_front_page()) {
        return;
    }

    // Start the breadcrumb markup
    echo '<nav class="bg-transparent rounded" aria-label="Breadcrumb">';
    echo '<ol class="flex items-center justify-center space-x-2 list-reset">';

    // HOME LINK
    echo '<li class="text-xs md:text-base">';
    echo '<a href="' . home_url() . '" class="text-white transition-colors hover:text-bptlightblue">Home</a>';
    echo '</li>';

    // SEPARATOR
    echo '<li class="text-white">/</li>';

    // If this is a category archive
    if (is_category()) {
        // Get the current category
        $current_category = get_queried_object();

        // If it has a parent, display the hierarchy
        if ($current_category->parent != 0) {
            $parent_categories = get_category_parents($current_category->parent, false, '###', true);
            $parent_categories = explode('###', trim($parent_categories, '###'));
            foreach ($parent_categories as $parent) {
                if (! empty($parent)) {
                    echo '<li class="text-white">' . $parent . '</li>';
                    echo '<li class="text-white">/</li>';
                }
            }
        }

        // Current category name
        echo '<li class="text-xs text-white md:text-base">';
        single_cat_title();
        echo '</li>';
    }

    // If this is a single post
    elseif (is_single()) {
        // Get post type
        $post_type = get_post_type();

        // If it’s a regular post, show category. If custom post type, you may want to link to archive
        if ($post_type === 'post') {
            // Get categories
            $categories = get_the_category();
            if ($categories) {
                $category  = $categories[0];
                // Display parent categories if exist
                $parent_categories = get_category_parents($category->term_id, false, '###', true);
                $parent_categories = explode('###', trim($parent_categories, '###'));
                foreach ($parent_categories as $parent) {
                    if (! empty($parent)) {
                        echo '<li class="text-white">' . $parent . '</li>';
                        echo '<li class="text-white">/</li>';
                    }
                }
            }
        } else {
            // If custom post type, link to its archive if it exists
            $post_type_object = get_post_type_object($post_type);
            if (! empty($post_type_object->has_archive)) {
                $archive_link = get_post_type_archive_link($post_type);
                if ($archive_link) {
                    echo '<li class="text-xs md:text-base">';
                    echo '<a href="' . esc_url($archive_link) . '" class="text-white transition-colors hover:text-bptlightblue">';
                    echo esc_html($post_type_object->labels->singular_name);
                    echo '</a>';
                    echo '</li>';
                    echo '<li class="text-white">/</li>';
                }
            }
        }

        // Current post title
        echo '<li class="text-xs text-white md:text-base">' . get_the_title() . '</li>';
    }

    // If this is a page
    elseif (is_page()) {
        global $post;
        if ($post->post_parent) {
            // Get all ancestors
            $ancestors = array_reverse(get_post_ancestors($post->ID));
            foreach ($ancestors as $ancestor) {
                echo '<li class="text-xs md:text-base">';
                echo '<a href="' . get_permalink($ancestor) . '" class="text-white transition-colors hover:text-bptlightblue">' . get_the_title($ancestor) . '</a>';
                echo '</li>';
                echo '<li class="text-white">/</li>';
            }
        }
        // Current page title
        echo '<li class="text-xs text-white md:text-base">' . get_the_title() . '</li>';
    }

    // If this is a tag archive
    elseif (is_tag()) {
        echo '<li class="text-xs text-white md:text-base">Tag: ' . single_tag_title('', false) . '</li>';
    }

    // If this is a day archive
    elseif (is_day()) {
        echo '<li class="text-xs text-white md:text-base">' . get_the_date() . '</li>';
    }

    // If this is a month archive
    elseif (is_month()) {
        echo '<li class="text-xs text-white md:text-base">' . get_the_date('F Y') . '</li>';
    }

    // If this is a year archive
    elseif (is_year()) {
        echo '<li class="text-xs text-white md:text-base">' . get_the_date('Y') . '</li>';
    }

    // If this is an author archive
    elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo '<li class="text-xs text-white md:text-base">Author: ' . esc_html($userdata->display_name) . '</li>';
    }

    // If this is a search results page
    elseif (is_search()) {
        echo '<li class="text-xs text-white md:text-base">Search results for: ' . get_search_query() . '</li>';
    }

    // If this is any other type of archive
    elseif (is_archive()) {
        echo '<li class="text-xs text-white md:text-base">' . post_type_archive_title('', false) . '</li>';
    }

    echo '</ol>';
    echo '</nav>';
}

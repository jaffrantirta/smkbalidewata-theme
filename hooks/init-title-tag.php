<?php
function title_tag_jhg()
{
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'title_tag_jhg');

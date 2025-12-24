<?php
foreach (glob(get_template_directory() . '/inc/*.php') as $file) {
    require_once $file;
}
foreach (glob(get_template_directory() . '/hooks/*.php') as $file) {
    require_once $file;
}

foreach (glob(get_template_directory() . '/hooks/**/*.php') as $file) {
    require_once $file;
}
foreach (glob(get_template_directory() . '/inc/cpt/**/*.php') as $file) {
    require_once $file;
}

foreach (glob(get_template_directory() . '/inc/cpt/***/**/*.php') as $file) {
    require_once $file;
}

foreach (glob(get_template_directory() . '/inc/cpt/****/***/**/*.php') as $file) {
    require_once $file;
}
foreach (glob(get_template_directory() . '/inc/customizer/*.php') as $file) {
    require_once $file;
}
foreach (glob(get_template_directory() . '/inc/metabox/*.php') as $file) {
    require_once $file;
}

foreach (glob(get_template_directory() . '/inc/shortcodes/*.php') as $file) {
    require_once $file;
}

foreach (glob(get_template_directory() . '/handler/***/**/*.php') as $file) {
    require_once $file;
}

foreach (glob(get_template_directory() . '/handler/****/***/**/*.php') as $file) {
    require_once $file;
}

foreach (glob(get_template_directory() . '/api/get/*.php') as $file) {
    require_once $file;
}
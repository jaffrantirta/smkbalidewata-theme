<?php

/**
 * Flush rewrite rules on theme activation (optional)
 */
function services_rewrite_flush() {
    register_services_post_type();
    flush_rewrite_rules();
}
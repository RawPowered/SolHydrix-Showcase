<?php
// Shortened from the theme's WordPress robots filter.
add_filter('wp_robots', function ($robots) {
    if (wp_get_environment_type() !== 'production'
        || !get_option('blog_public')
        || is_page('thank-you')
        || is_search()
        || is_archive()
        || is_404()
        || is_attachment()) {
        $robots['noindex'] = true;
        unset($robots['index']);
    }
    return $robots;
});

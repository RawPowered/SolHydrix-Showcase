<?php
// Shortened from the theme's bundle selection. The source styles remain editable.
add_action('wp_enqueue_scripts', function () {
    $bundle = get_template_directory() . '/performance.bundle.css';
    $sources = ['style.css', 'premium.css', 'content.css', 'brand.css',
        'official.css', 'header.css', 'footer.css', 'polish.css', 'performance.css'];
    $fresh = is_file($bundle);
    foreach ($sources as $source) {
        if (!$fresh || filemtime(get_template_directory() . '/' . $source) > filemtime($bundle)) {
            $fresh = false;
            break;
        }
    }
    if ($fresh && solhydrix_brand_family() === 'official') {
        foreach (['solhydrix', 'solhydrix-premium', 'solhydrix-content',
            'solhydrix-brand', 'solhydrix-official', 'solhydrix-header',
            'solhydrix-footer', 'solhydrix-polish'] as $handle) {
            wp_dequeue_style($handle);
        }
        wp_enqueue_style('solhydrix-performance', get_template_directory_uri() . '/performance.bundle.css', [], filemtime($bundle));
    }
}, 100);

// In the theme's main enqueue call, the site script uses WordPress's defer strategy.
wp_enqueue_script('solhydrix', get_template_directory_uri() . '/site.js', [],
    filemtime(get_template_directory() . '/site.js'), ['strategy' => 'defer', 'in_footer' => true]);

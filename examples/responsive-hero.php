<?php
// Shortened from the SolHydrix theme's server-rendered hero shortcode.
add_shortcode('solhydrix_application_hero', function () {
    $base = get_template_directory_uri() . '/assets/optimized/roof-application-';
    $sets = [];
    foreach (['avif', 'webp'] as $format) {
        $parts = [];
        foreach ([480, 768, 1280, 1600] as $width) {
            $file = get_template_directory() . '/assets/optimized/roof-application-' . $width . '.' . $format;
            $parts[] = esc_url($base . $width . '.' . $format . '?v=' . filemtime($file)) . ' ' . $width . 'w';
        }
        $sets[$format] = implode(', ', $parts);
    }
    $sizes = '(max-width: 540px) 100vw, (max-width: 800px) 80vw, 70vw';
    return '<picture><source type="image/avif" srcset="' . esc_attr($sets['avif']) . '" sizes="' . esc_attr($sizes) . '"><img src="' . esc_url($base . '1280.webp') . '" srcset="' . esc_attr($sets['webp']) . '" sizes="' . esc_attr($sizes) . '" alt="Illustrative roof coating application on asphalt shingles" width="1600" height="900" loading="eager" fetchpriority="high" decoding="async"></picture>';
});

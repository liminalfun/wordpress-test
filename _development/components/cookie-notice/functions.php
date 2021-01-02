<?php

add_filter('granola/render/assets/components/cookie-notice', function ($args): array {

    // Set up defaults
    $args = wp_parse_args($args, [
        'classes' => [],
        'content' => '',
    ]);

    // Add our block classes here
    $args['classes'] = array_merge($args['classes'], [
        'cookie-notice'
    ]);

    $content = get_field('cookie_notice_text', 'option');
    if (!empty($content)) {
        $args['content'] = $content;
    } elseif (!empty(get_privacy_policy_url())) {
        $args['content'] = sprintf(
            __('We use cookies. Read more about them in our %s', 'granola'),
            \Granola\render('assets/components/link', [
                'content' => _x('Privacy Policy', 'Cookie notice link text', 'granola'),
                'url'     => get_privacy_policy_url(),
            ])
        );
    }

    // -------------------------------------------------------------------------
    // Return the content to the render functions
    // -------------------------------------------------------------------------
    return $args;
});

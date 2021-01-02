<?php

add_filter('granola/render/assets/components/pageheader', function ($args): array {

    $args = wp_parse_args($args, [
        'classes' => [],
        'show' => true,
    ]);

    $args['classes'] = array_merge($args['classes'], [
        'wp-block-page-header',
        'alignfull',
    ]);

    if ($args['content'] instanceof WP_Post) {
        // -----------------------------------------------------------------
        // Handle filtering content from WordPress posts
        // -----------------------------------------------------------------

        $wp_post = $args['content'];

        $meta = '';
        $heading = $wp_post->post_title;

        if ($wp_post->post_type === 'post') {
            $meta .= 'on ' . get_the_date(get_option('date_format'), $wp_post->ID);
        }

        $args['content'] = [
            'heading' => $heading,
            'meta' => $meta,
        ];
    } elseif ($args['content'] instanceof WP_Term) {
        $wp_term = $args['content'];

        $heading = $wp_term->name;

        $args['content'] = [
            'heading' => $heading,
        ];
    } elseif ($args['content'] instanceof WP_Post_Type) {
        $wp_post_type = $args['content'];

        $heading = $wp_post_type->label;

        $args['content'] = [
            'heading' => $heading,
        ];
    } elseif (is_string($args['content'])) {
        $args['content'] = [
            'heading' => $args['content'],
        ];
    }

    return $args;
});

<?php

add_filter('granola/render/assets/components/card', function ($args): array {
    $imageSize = 'medium_large';

    if (is_array($args)) {
        // -----------------------------------------------------------------
        // Set up args from custom cards
        // -----------------------------------------------------------------
        if (!empty($args['image']['id'])) {
            $args['media'] = wp_get_attachment_image($args['image']['id'], $imageSize, false, [
                'aria-hidden' => 'true'
            ]);
            unset($args['image']);
        }

        if (!empty($args['link']['url'])) {
            $args['link']['content'] = $args['heading'];
            $args['heading'] = \Granola\render('assets/components/link', $args['link']);
        }
    } elseif ($args instanceof WP_Post) {
        // -----------------------------------------------------------------
        // Set up args from WordPress posts
        // -----------------------------------------------------------------/
        $args = [
            'heading' => \Granola\render('assets/components/link', [
                'content' => get_the_title($args->ID),
                'url'     => get_the_permalink($args->ID),
            ]),
            'media' => get_the_post_thumbnail($args->ID, $imageSize, [
                'aria-hidden' => 'true'
            ]),
            // 'meta' => \Granola\render('assets/components/post-meta', $args),
            // 'label' => \Granola\get_post_label($args),
        ];
    } elseif ($args instanceof WP_Term) {
        // ------------------------------------------
        // Set up args for Terms
        // ------------------------------------------
        $args = [
            'heading' => \Granola\render('assets/components/link', [
                'content' => $args->name,
                'url'     => get_term_link($args),
            ]),
            'text' => $args->description,
        ];

        // Set up media if there is an image field for terms
        // if ($image = get_field('term_image', $args)) {
        //     $args['media'] = wp_get_attachment_image($image['ID'], $imageSize);
        // }
    }

    $args = wp_parse_args($args, [
        'heading' => '',
        'meta' => '',
        'content' => '',
        'link' => '',
        'classes' => [],
    ]);

    $args['classes'] = array_merge($args['classes'], [
        'g-card',
    ]);

    return $args;
});

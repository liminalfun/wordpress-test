<?php

add_filter('granola/render/assets/components/cards', function (array $args): array {

    $args = wp_parse_args($args, [
        'classes' => [],
        'heading' => '',
        'content' => '',
        'type' => '',
        'cards' => [],
    ]);

    $args['classes'] = array_merge($args['classes'], [
        'cards',
    ]);

    if (!empty($args['type'])) {
        if ($args['type'] === 'custom') {
            $args['cards'] = $args['custom_cards'];
        } elseif ($args['type'] === 'recent') {
            $args['cards'] = get_posts([
                'post_type' => $args['post_type'],
                'posts_per_page' => $args['limit'],
            ]);
        } elseif ($args['type'] === 'selected') {
            $args['cards'] = get_field('selected');
        }
    }

    // -------------------------------------------------------------------------
    // Return the content to the render functions
    // -------------------------------------------------------------------------
    return $args;
});

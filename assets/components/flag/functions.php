<?php

add_filter('granola/render/assets/components/flag', function (array $args): array {

    $args = wp_parse_args($args, [
        'classes' => [],
        'heading' => '',
        'content' => '',
        'media' => '',
        'image' => '',
        'reverse' => false,
    ]);

    $args['classes'] = array_merge($args['classes'], [
        'flag',
    ]);

    if ($args['reverse'] === true) {
        $args['classes'][] = 'flag--reverse';
    }

    // -------------------------------------------------------------------------
    // Pull the image if one exists
    // -------------------------------------------------------------------------
    if (!empty($args['image'])) {
        if (!empty($args['image']['id'])) {
            $args['media'] = wp_get_attachment_image($args['image']['id'], 'super');
        } else {
            // In theory its a string
            $args['media'] = $args['image'];
        }

        // Remove the image from the args
        unset($args['image']);
    }

    return $args;
});

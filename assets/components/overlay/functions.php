<?php

add_filter('granola/render/assets/components/overlay', function (array $args): array {

    $args = wp_parse_args($args, [
        'classes' => [],
        'heading' => '',
        'content' => '',
        'media' => '',
    ]);

    $args['classes'] = array_merge($args['classes'], [
        'overlay',
    ]);

    // -------------------------------------------------------------------------
    // Pull the image if one exists
    // -------------------------------------------------------------------------
    if (!empty($args['image']['id'])) {
        // Drop the image in
        $args['media'] = wp_get_attachment_image($args['image']['id'], 'super');

        // Remove the image from the args
        unset($args['image']);
    }

    // -------------------------------------------------------------------------
    // Return the content to the render functions
    // -------------------------------------------------------------------------
    return $args;
});

<?php

add_filter('granola/render/assets/components/blockname', function (array $args): array {

    // Set up defaults
    $args = wp_parse_args($args, [
        'classes' => [],
        'content' => 'Hello World',
    ]);

    // Add our block classes here
    $args['classes'] = array_merge($args['classes'], [
        'wp-block-blockname',
    ]);

    // -------------------------------------------------------------------------
    // Return the content to the render functions
    // -------------------------------------------------------------------------
    return $args;
});

<?php

add_filter('granola/render/assets/components/link', function (array $args): array {
    $args = wp_parse_args($args, [
        'title'         => '',
        'url'           => '',
        'target'        => '',
        'attributes'    => [
            'rel'       => [],
        ],
        'classes'       => [],
    ]);

    $args['content'] = $args['content'] ?? $args['title'];

    // Convert classes array into class attribute string.
    $args['attributes']['class'] = implode(' ', $args['classes']);

    // Add target attribute...
    $args['attributes']['target'] = $args['target'];

    // ...and conditionally add appropriate rel attribute.
    if ($args['target'] === '_blank') {
        $args['attributes']['rel'][] = 'noopener';
    }

    // Convert rel array into rel attribute string.
    $args['attributes']['rel'] = implode(' ', $args['attributes']['rel']);

    // Finally, convert attributes array into attributes string.
    $args['attributes'] = \Granola\buildAttributes($args['attributes']);

    return $args;
});

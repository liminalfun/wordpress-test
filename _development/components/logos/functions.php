<?php
add_filter('granola/render/assets/components/logos', function ($args): array {

    $args = wp_parse_args($args, [
        'classes' => [],
        'heading' => '',
        'content' => '',
        'logos' => [],
        'reverse' => false,
    ]);

    // Add the default required classes
    $args['classes'] = array_merge($args['classes'], [
        'logos',
    ]);

    if ($args['reverse'] === true) {
        $args['classes'][] = 'logos--reverse';
    }

    if (!empty($args['logos'])) {
        $args['logos'] = array_map(function ($item) {

            // If this is an array
            if (is_array($item)) {
                // If this is a wordpress image array
                if (array_key_exists('ID', $item)) {
                    return wp_get_attachment_image($item['ID'], 'medium-large');
                }
            }

            return $item;
        }, $args['logos']);
    }

    return $args;
});

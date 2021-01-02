<?php

add_filter('granola/render/assets/components/burger', function (array $args): array {

    // ---------------------------------------
    // Defaults.
    // ---------------------------------------
    $args = wp_parse_args($args, [
        'classes' => [],
        'aria-label' => '',
        'aria-controls' => '',
        'aria-expanded' => ''
    ]);

    // ---------------------------------------
    // Add required classes.
    // ---------------------------------------
    $args['classes'] = array_merge($args['classes'], [
        'burger',
    ]);

    // ---------------------------------------
    // Generate attributes for the button tag.
    // ---------------------------------------
    $button_attrs = [
        'class' => implode(' ', $args['classes']),
        'type' => 'button'
    ];

    if ($args['aria-controls'] !== '') {
        $button_attrs['aria-controls'] = $args['aria-controls'];
    }

    if ($args['aria-expanded'] !== '') {
        $button_attrs['aria-expanded'] = $args['aria-expanded'];
    }

    $args['attributes'] = [];
    foreach ($button_attrs as $key => $value) {
        $args['attributes'][] = $key . '="' . esc_attr($value) . '"';
    }

    // -------------------------------------------------------------------------
    // Return the content to the render function.
    // -------------------------------------------------------------------------
    return $args;
});

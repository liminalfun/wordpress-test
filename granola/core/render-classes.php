<?php

add_filter('granola/render', function ($args) {
    if(is_array($args)){
        if (!empty($args['media'])) {
            $args['classes'][] = 'has-media';

            if (\Granola\startsWith($args['media'], '<iframe')) {
                $args['classes'][] = 'has-embed';
            }
        }

        if (!empty($args['link'])) {
            $args['classes'][] = 'has-link';
        }
    }

    return $args;
});

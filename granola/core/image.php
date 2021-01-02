<?php

namespace Granola;

/**
 * Return and possibly output an image from the assets directory
 * @param string $name
 * @param array $args
 * @return string
 */
function image(string $name, array $args = []): string
{
    $image = '';

    $args = wp_parse_args($args, [
        'name'   => $name,
        'alt'    => '',
        'classes'  => [],
        'loading' => 'lazy',
        'width' => 0,
        'height'    => 0,
    ]);

    if ($image_url = \Granola\imageURL($args['name'])) {
        $attributes = [
            'src' => $image_url,
            'alt' => $args['alt'],
            'loading' => $args['loading'],
        ];

        if ($attributes['alt'] === "") {
            $attributes['role'] = 'presentation';
        }

        if (!empty($args['classes'])) {
            $attributes['class'] = implode(' ', $args['classes']);
        }

        // If width and height attributes have been defined, set them
        if (!empty($args['width'])) {
            $attributes['width'] = $args['width'];
        }

        if (!empty($args['height'])) {
            $attributes['height'] = $args['height'];
        }

        // If width or height attributes have not been set, attempt to get them automatically
        if (!isset($attributes['width']) || !isset($attributes['height'])) {
            $generatedWidth = 0;
            $generatedHeight = 0;

            // Get the width and height (getimagesize doesn't cut it for SVG files)
            if (pathinfo($name, PATHINFO_EXTENSION) === 'svg') {
                $svgInfo = \Granola\svgInfo(\Granola\svgPath($args['name']));

                if (!empty($svgInfo['w'])) {
                    $generatedWidth = $svgInfo['w'];              
                }

                if (!empty($svgInfo['h'])) {
                    $generatedHeight = $svgInfo['h'];                
                } 
            } else {
                $imageInfo = getimagesize(\Granola\imagePath($args['name']));

                if (!empty($imageInfo[0])) {
                    $generatedWidth = $imageInfo[0];                
                }

                if (!empty($imageInfo[1])) {
                    $generatedHeight = $imageInfo[1];                
                }         
            }

            // Set the width and height if values have been generated
            if (!empty($generatedWidth)) {
                $attributes['width'] = $generatedWidth;
            }

            if (!empty($generatedHeight)) {
                $attributes['height'] = $generatedHeight;
            }
        }

        $image = '<img ' . \Granola\buildAttributes($attributes) . '>';
    }

    return $image;
}


/**
 * Build the URL for the image
 * @param string $name
 * @return string
 */
function imageURL(string $name): string
{
    return \Granola\assetURL('images/' . $name);
}


/**
 * Build the path to the the image
 * @param string $name
 * @return string
 */
function imagePath(string $name): string
{
    return \Granola\assetPath('images/' . $name);
}

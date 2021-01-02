<?php

namespace Granola\WordPress;

class Images
{
    public static function init(): void
    {
        add_action('after_setup_theme', [__CLASS__, 'registerPostThumbnails']);
        add_filter('image_size_names_choose', [__CLASS__,'customImageSizes']);
    }

    public static function registerPostThumbnails(): void
    {
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(150, 150, true);

        if (defined('GRANOLA_IMAGES')) {
            foreach (GRANOLA_IMAGES as $key => $size) {
                if (empty($size[3])) {
                    $size[3] = false;
                }

                add_image_size(
                    $size[0],
                    $size[1],
                    $size[2],
                    $size[3]
                );
            }
        }
    }

    public static function customImageSizes(array $sizes): array
    {
        // https://codex.wordpress.org/Plugin_API/Filter_Reference/image_size_names_choose

        if (defined('GRANOLA_IMAGES')) {
            foreach (GRANOLA_IMAGES as $key => $size) {
                $sizes[$size[0]] = ucfirst(str_replace('_', ' ', $size[0]));
            }
        }

        return $sizes;
    }
}

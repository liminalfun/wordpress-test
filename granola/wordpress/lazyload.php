<?php

namespace Granola\WordPress;

class LazyLoad
{
    public static function init(): void
    {
        add_filter('wp_get_attachment_image_attributes', [__CLASS__, 'changeAttachmentImageMarkup'], 10);
        add_filter('the_content', [__CLASS__, 'addImgLazyMarkup'], 15);
    }

    public static function changeAttachmentImageMarkup(array $attributes): array
    {
        $attributes['loading'] = 'lazy';

        return $attributes;
    }

    public static function addImgLazyMarkup(string $content): string
    {
        if (is_admin() || $content == "") {
            return $content;
        }

        $content = str_replace('<img', '<img loading="lazy"', $content);
        $content = str_replace('<iframe', '<iframe loading="lazy"', $content);

        return $content;
    }
}

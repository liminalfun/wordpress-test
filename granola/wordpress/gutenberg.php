<?php

namespace Granola\WordPress;

class Gutenberg
{
    public static function init(): void
    {
        add_action('after_setup_theme', [__CLASS__, 'gutenbergSupport']);
        add_filter('block_categories', [__CLASS__, 'gutenbergBlockCategory']);
    }

    public static function classes($args, array $block): array
    {
        if (!is_array($args)) {
            return [];
        }

        if (!empty($block['align'])) {
            $args['classes'][] = 'align' . $block['align'];
        }

        if (!empty($args['background_color'])) {
            $args['classes'][] = 'has-' . $args['background_color'] . '-background-color';
        }

        return $args;
    }

    public static function gutenbergSupport(): void
    {

        // Add editor styles. The path to the asset must be relative to the theme.
        add_theme_support('editor-styles');
        add_editor_style(\Granola\assetDir() . \Granola\extractAsset('styles/editor-styles.css', true));

        // 'align-wide' support adds the corresponding classname to the block’s wrapper ( .alignwide or .alignfull )
        add_theme_support('align-wide');

        // Add support for embeds to responsively keep their aspect ratio.
        add_theme_support('responsive-embeds');

        // Deactivate the option to set a custom color in the block color palette.
        add_theme_support('disable-custom-colors');

        // Set our own custom editor colors (if any).
        if (defined('GRANOLA_EDITOR_COLORS')) {
            add_theme_support('editor-color-palette', GRANOLA_EDITOR_COLORS);
        }

        // Deactivate the block gradient palette defaults.
        add_theme_support('editor-gradient-presets', []);

        // Deactivate the option to set a custom block gradient.
        add_theme_support('disable-custom-gradients');

        // Deactivate custom font sizes.
        add_theme_support('disable-custom-font-sizes');

        // Set our own custom font sizes (if any).
        if (defined('GRANOLA_EDITOR_FONT_SIZES')) {
            add_theme_support('editor-font-sizes', GRANOLA_EDITOR_FONT_SIZES);
        }

        // Deactivate the block directory.
        remove_action('enqueue_block_editor_assets', 'wp_enqueue_editor_block_directory_assets');
        remove_action('enqueue_block_editor_assets', 'gutenberg_enqueue_block_editor_assets_block_directory');

        // Deactivate block patterns.
        remove_theme_support('core-block-patterns');
    }

    /**
     * Filters the Gutenberg block categories array to add a custom category.
     *
     * @link: https://developer.wordpress.org/reference/hooks/block_categories/
     *
     * @param array[] $categories A list of registered block categories.
     * @return array[] The filtered list of registered block categories.
     */
    public static function gutenbergBlockCategory($categories): array
    {
        // Plugin’s block category title and slug.
        $blockCategory = [
            'title' => esc_html__('Granola Blocks', 'granola'),
            'slug' => 'granola-blocks'
        ];

        $categorySlugs = wp_list_pluck($categories, 'slug');

        // Bail early - this category slug is already registered.
        if (in_array($blockCategory['slug'], $categorySlugs, true)) {
            return $categories;
        }

        $categories[] = $blockCategory;

        return $categories;
    }
}

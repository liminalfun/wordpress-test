<?php

namespace Granola\Plugin;

class ACF
{
    public static function init(): void
    {
        add_action('acf/init', [__CLASS__, 'optionPages']);
        add_action('acf/init', [__CLASS__, 'googleAPIKey']);
        add_filter('acf/load_field/name=background_color', [__CLASS__, 'loadColorFieldChoices']);

        // Handles disabling Gutenberg on flexible content template
        add_filter('gutenberg_can_edit_post_type', [__CLASS__, 'disable_gutenberg'], 10, 2);
        add_filter('use_block_editor_for_post_type', [__CLASS__, 'disable_gutenberg'], 10, 2);

        // Define custom wysiwyg toolbar.
        add_filter('acf/fields/wysiwyg/toolbars', [__CLASS__, 'filterEditorToolbarTypes']);
    }

    public static function optionPages(): void
    {
        // ----------------------------------------------------
        // If ACF Exists, lets create all the options pages
        // that have been configured
        // ----------------------------------------------------
        if (function_exists('acf_add_options_page') && defined('GRANOLA_ACF_OPTIONS_PAGES')) {
            // ----------------------------------------------------
            // Add a default options page to nest everything under
            // ----------------------------------------------------
            acf_add_options_page();

            // ----------------------------------------------------
            // Loop through the pages configured and create them
            // ----------------------------------------------------
            foreach (GRANOLA_ACF_OPTIONS_PAGES as $key => $page) {
                acf_add_options_sub_page($page);
            }
        }
    }

    // ----------------------------------------------------
    // Configure ACF with our Google API key
    // ----------------------------------------------------
    public static function googleAPIKey(): void
    {
        if (defined('GRANOLA_GOOGLE_API_KEY') && GRANOLA_GOOGLE_API_KEY != '') {
            acf_update_setting('google_api_key', GRANOLA_GOOGLE_API_KEY);
        }
    }

    public static function loadColorFieldChoices(array $field): array
    {
        global $GRANOLA_COLORS;

        $field['choices'] = $GRANOLA_COLORS;

        return $field;
    }

    public static function disable_gutenberg(bool $can_edit, string $post_type): bool
    {
        if (!(is_admin() && !empty($_GET['post']))) {
            return $can_edit;
        }

        if (self::disable_editor($_GET['post'])) {
            $can_edit = false;
        }

        return $can_edit;
    }

    public static function disable_editor($id = false): bool
    {
        $excluded_templates = [
            // 'page-templates/example-template.php',
        ];

        if (empty($id)) {
            return false;
        }

        $id = intval($id);
        $template = get_page_template_slug($id);

        return in_array($template, $excluded_templates);
    }

    /**
     * Filters ACF wysiwyg toolbar types array.
     *
     * @see: /advanced-custom-fields-pro/includes/fields/class-acf-field-wysiwyg.php
     * @link: https://www.advancedcustomfields.com/resources/customize-the-wysiwyg-toolbars/
     *
     * @param array[] $toolbars An array of ACF TinyMCE wysiwyg toolbar types.
     * @param array[] $toolbars The filtered array of ACF TinyMCE wysiwyg toolbar types.
     */
    public static function filterEditorToolbarTypes($toolbars): array
    {
        // TinyMCE buttons.
        $minimalButtons = ['bold', 'italic', 'link', 'undo', 'redo', 'fullscreen'];

        // Define Minimal toolbar type with custom selection of TinyMCE buttons.
        $toolbars['Minimal'] = [
            1 => apply_filters('granola/acf/fields/wysiwyg/toolbars/minimal', $minimalButtons),
        ];

        return $toolbars;
    }
}

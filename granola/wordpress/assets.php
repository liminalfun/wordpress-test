<?php

namespace Granola\WordPress;

class Assets
{
    public static function init(): void
    {
        add_action('wp_enqueue_scripts', [__CLASS__, 'assetsLoad']);
        add_filter('wp_default_scripts', [__CLASS__, 'removejQueryMigrate']);
        add_action('wp_default_scripts', [__CLASS__, 'movejQueryToFooter']);
        add_action('wp_head', [__CLASS__, 'javascriptDetection'], 0);
        add_filter('style_loader_src', [__CLASS__, 'removeVer'], 10, 2);
        add_filter('script_loader_src', [__CLASS__, 'removeVer'], 10, 2);
        add_action('enqueue_block_editor_assets', [__CLASS__, 'editorAssets']);
        add_action('wp_head', [__CLASS__, 'preloadThemeAssets'], 10);
        add_action('admin_enqueue_scripts', [__CLASS__, 'adminAssets']);
    }

    public static function editorAssets(): void
    {
        // ------------------------------------------
        // Editor Scripts
        // ------------------------------------------
        wp_enqueue_script(
            'granola-editor',
            \Granola\assetURL('scripts/editor-scripts.js', true),
            ['wp-blocks', 'wp-dom'],
            '',
            true
        );
    }

    public static function adminAssets(): void
    {
        // ------------------------------------------
        // Editor Scripts
        // ------------------------------------------
        wp_enqueue_script(
            'granola-admin',
            \Granola\assetURL('scripts/admin-scripts.js', true),
            [],
            '',
            true
        );
    }

    public static function removeVer(string $src): string
    {
        if (strpos($src, '?ver=')) {
            $src = remove_query_arg('ver', $src);
        }

        return $src;
    }

    public static function assetsLoad(): void
    {
        // ------------------------------------------
        // If we are on the admin screen we dont need
        // to load the custom scripts and styles
        // ------------------------------------------
        if (is_admin()) {
            wp_enqueue_style('granola-stylesheet', get_stylesheet_uri());
            return;
        }

        // ------------------------------------------
        // Enqueue Granola CSS
        // ------------------------------------------
        wp_enqueue_style('granola-styles', \Granola\assetURL('styles/main.css', true), [], false, 'screen');

        // ------------------------------------------
        // Enqueue Granola Print CSS
        // ------------------------------------------
        wp_enqueue_style('granola-print', \Granola\assetURL('styles/print.css', true), [], false, 'print');

        // ------------------------------------------
        // Build our script dependencies
        // ------------------------------------------
        $script_dependencies = [];

        if (defined('GRANOLA_JQUERY_REQUIRED') && GRANOLA_JQUERY_REQUIRED === true) {
            $script_dependencies[] = 'jquery';
        }

        // ------------------------------------------
        // Load our javascript files and their dependencies
        // ------------------------------------------
        wp_register_script('granola-scripts', \Granola\assetURL('scripts/main.js', true), $script_dependencies, '', true);

        // ------------------------------------------
        // Just in case we need pass PHP variables to JS
        // We should wrap this in a constant so we can
        // turn this on and off
        // ------------------------------------------
        if (defined('GRANOLA_AJAX_REQUIRED') && GRANOLA_AJAX_REQUIRED === true) {
            wp_localize_script('granola-scripts', 'params', array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'home_url' => home_url(),
            ));
        }

        /* Enqueue comment-reply script if needed */
        if (defined('GRANOLA_COMMENTS') && GRANOLA_COMMENTS === true && is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        wp_enqueue_script('granola-scripts');
    }

    public static function removejQueryMigrate(&$scripts): void
    {
        if (is_admin()===false && GRANOLA_REMOVE_JQUERY_MIGRATE === true) {
            $scripts->remove('jquery');
            $scripts->add('jquery', false, array('jquery-core'), '1.12.4');
        }
    }

    // ------------------------------------------
    // Move jQuery to footer but put it in the
    // the header if needed
    // https://wordpress.stackexchange.com/questions/173601/enqueue-core-jquery-in-the-footer/240612#240612
    // ------------------------------------------
    // So this is pretty clever. We move jQuery to
    // the footer by default. If nothing requires
    // it be loaded in the header, it will stay in
    // the footer. But if a plugin requires it in
    // the header, it will be magically moved :)
    // ------------------------------------------
    public static function movejQueryToFooter($wp_scripts): void
    {
        if (is_admin()===false && GRANOLA_JQUERY_IN_FOOTER === true) {
            $wp_scripts->add_data('jquery', 'group', 1);
            $wp_scripts->add_data('jquery-core', 'group', 1);
        }
    }

    // ------------------------------------------
    // Handles JavaScript detection.
    // Adds a `js` class to the root `<html>` element when JavaScript is detected.
    // Needs to be added in the header to avoid FOUC.
    // ------------------------------------------
    public static function javascriptDetection(): void
    {
        echo "<script>(function(html){html.className = ".
        "html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
    }

    // ------------------------------------------
    // Output <link rel="preload"> tags in the head
    // for assets specified in granola/config.php
    // ------------------------------------------
    public static function preloadThemeAssets(): void
    {
        if (defined('GRANOLA_PRELOAD_ASSETS')) {
            $defaults = [
                'rel'        => 'preload',
                'href'        => '',
                'importance'  => 'low',
                'type'        => 'font/woff2',
                'as'          => 'font',
                'crossorigin' => 'anonymous',
            ];

            foreach (GRANOLA_PRELOAD_ASSETS as $key => $value) {
                $atts = wp_parse_args($value, $defaults);

                if (!empty($atts['href'])) {
                    echo "<link " . \Granola\buildAttributes($atts) . ">\n";
                }
            }
        }
    }
}

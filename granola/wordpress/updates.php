<?php

namespace Granola\WordPress;

class Updates
{
    public static function init(): void
    {
        // Disable auto updates for themes and plugins to avoid unexpected changes
        // @link https://wordpress.org/support/article/configuring-automatic-background-updates/#plugin-theme-updates-via-filter
        add_filter('auto_update_theme', '__return_false');
        add_filter('auto_update_plugin', '__return_false');
    }
}

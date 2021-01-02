<?php

namespace Granola\WordPress;

class EditHomepage
{

    /**
     * Adds an edit homepage link to the WP admin menu.
     *
     * @return void
     */
    public static function init(): void
    {
        if (!is_admin()) {
            return;
        }

        // Add custom filter to global WP admin submenu.
        add_action('admin_head', [__CLASS__, 'addGlobalWPAdminSubmenuFilter'], 15);

        // Add the homepage edit link.
        add_filter('granola/wordpress/edithomepage/submenu', [__CLASS__, 'addHomepageEditLink']);
    }

    /**
     * Filters the global $submenu to add a homepage edit link to the WP admin bar.
     *
     * NOTE: Adding a filter to a WP global isn't ideal. However, as there's
     * no easy way to add custom links to the (sub)menu then this approach
     * will do for now. Some enhancements to the menu API have been suggested
     * on trac (see links below), so could be good options in the future.
     *
     * @link: https://core.trac.wordpress.org/ticket/12718
     * @link: https://core.trac.wordpress.org/ticket/39050
     *
     * @return void
     */
    public static function addGlobalWPAdminSubmenuFilter(): void
    {
        global $submenu;

        $submenu = apply_filters('granola/wordpress/edithomepage/submenu', $submenu);
    }

    /**
     * Filters the global $submenu to add a homepage edit link to the WP admin bar.
     *
     * @param array $submenu An array of WP admin menu items.
     */
    public static function addHomepageEditLink($submenu): array
    {
        // Bail early - no 'static' homepage.
        if (get_option('show_on_front') !== 'page') {
            return $submenu;
        }

        $homepageID = get_option('page_on_front', 0);

        // Bail early - homepage not set.
        if (empty($homepageID)) {
            return $submenu;
        }

        // Get page edit URL.
        $homepageEditLink = \get_edit_post_link($homepageID);

        // Bail early - no edit link found.
        if (empty($homepageEditLink)) {
            return $submenu;
        }

        // Create edit link array.
        $editHomepageMenuArray = [
            __('Edit Homepage', 'granola'),
            'edit_pages',
            $homepageEditLink,
        ];

        // Add edit link.
        $submenu['edit.php?post_type=page'][] = $editHomepageMenuArray;

        return $submenu;
    }
}

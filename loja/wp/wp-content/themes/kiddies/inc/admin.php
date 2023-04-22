<?php
/**
 * Kiddies admin logic.
 *
 * @package Kiddies
 */

/**
 * Load Recommended plugins notification logic.
 */
require_once trailingslashit(get_template_directory()) . 'inc/admin/recommended-plugins.php';


function kiddies_admin_setup()
{

    /**
     * Load and initialize Kiddies Dashboard Notices
     *
     */

    // Theme options page.
    require_once trailingslashit(get_template_directory()) . 'inc/admin/dashboard/class-theme-notice.php';
    require_once trailingslashit(get_template_directory()) . 'inc/admin/dashboard/class-notice.php';
    require_once trailingslashit(get_template_directory()) . 'inc/admin/dashboard/class-upgrade-notice.php';
    require_once trailingslashit(get_template_directory()) . 'inc/admin/dashboard/class-theme-review-notice.php';
    
    require trailingslashit(get_template_directory()) . 'inc/admin/dashboard/class-about-render.php';

    /**
     * Theme dashboard settings.
     */
    require get_template_directory() . '/inc/admin/theme-dashboard-settings.php';

}

add_action('after_setup_theme', 'kiddies_admin_setup');

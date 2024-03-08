<?php

function lws_admin_settings_menu_pages() {

    add_menu_page(
        'Dashboard',
        'Admin Settings',
        'manage_options',
        'lws_admin_settings_dashboard', // menu slug | construct the URL
        'lws_admin_settings_dashboard_page', // callback function renders content
        'dashicons-tagcloud',
        101
    );

    require_once trailingslashit(LWS_ADMIN_SETTINGS_DIR) . 'packages/dashboard/admin-menu.php';
    require_once trailingslashit(LWS_ADMIN_SETTINGS_DIR) . 'packages/pages/admin-menu.php';
    require_once trailingslashit(LWS_ADMIN_SETTINGS_DIR) . 'packages/posts/admin-menu.php';
    require_once trailingslashit(LWS_ADMIN_SETTINGS_DIR) . 'packages/updates/admin-menu.php';

}
add_action('admin_menu', 'lws_admin_settings_menu_pages');
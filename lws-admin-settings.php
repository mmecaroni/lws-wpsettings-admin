<?php
/********************************
 * Plugin Name: LWS Admin Settings
 * Plugin URI: http://www.liquidstudiodev.com/wp/lws-admin-settings
 * Description: A Admin Settings plugin by Liquid Studio Group
 * Version: 0.0.0
 * Author: Mario Mecaroni
 * Author URI: http://www.liquidstudiogroup.com/team/mario-mecaroni
 * License: MIT
 * Text Domain: lws-admin-settings
 * GitHub Plugin URI: mmecaroni/lws-admin-settings
 * GitHub Branch: master
 */

/****** Get lost! */
if (!defined('ABSPATH')) { exit; }

/****** Constants for Plugin Environment */
define( 'LWS_ADMIN_SETTINGS_VERSION', 'v0.0.0' );
define( 'LWS_ADMIN_SETTINGS_DIR', plugin_dir_path( __FILE__ ) );
define( 'LWS_ADMIN_SETTINGS_ROOT_FILE', __FILE__ );
define( 'LWS_ADMIN_SETTINGS_ROOT_FILE_RELATIVE_PATH', plugin_basename( __FILE__ ) );
define( 'LWS_ADMIN_SETTINGS_SLUG', 'lws_admin_settings' );
define( 'LWS_ADMIN_SETTINGS_FOLDER', dirname( plugin_basename( __FILE__ ) ) );
define( 'LWS_ADMIN_SETTINGS_URL', plugins_url( '', __FILE__ ) );

/****** Require Menu handler file*/
require_once trailingslashit(LWS_ADMIN_SETTINGS_DIR) . 'includes/menu/add-menu-pages.php';

/****** Packages */
require_once trailingslashit(LWS_ADMIN_SETTINGS_DIR) . 'packages/dashboard/page-dashboard.php';
require_once trailingslashit(LWS_ADMIN_SETTINGS_DIR) . 'packages/pages/page-pages.php';
require_once trailingslashit(LWS_ADMIN_SETTINGS_DIR) . 'packages/posts/page-posts.php';
require_once trailingslashit(LWS_ADMIN_SETTINGS_DIR) . 'packages/updates/page-updates.php';

/****** Display Version on Frontend Footer */
add_action("wp_footer", function() { echo "LWS Admin Settings Version: " . LWS_ADMIN_SETTINGS_VERSION; });
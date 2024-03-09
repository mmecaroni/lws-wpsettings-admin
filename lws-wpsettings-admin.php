<?php
/********************************
 * Plugin Name: LWS WpSettings Admin
 * Plugin URI: http://www.liquidstudiodev.com/wp/lws-wpsettings-admin
 * Description: A WpSettings Admin Plugin by Liquid Studio Group
 * Version: 0.0.0
 * Author: Mario Mecaroni
 * Author URI: http://www.liquidstudiogroup.com/team/mario-mecaroni
 * License: MIT
 * Text Domain: lws-wpsettings-admin
 * GitHub Plugin URI: mmecaroni/lws-wpsettings-admin
 * GitHub Branch: master
 * Release Asset: false
 */

/****** Get lost! */
if (!defined('ABSPATH')) { exit; }

/****** Constants for Plugin Environment */
define( 'LWS_WPSETTINGS_ADMIN_VERSION', 'v0.0.0' );
define( 'LWS_WPSETTINGS_ADMIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'LWS_WPSETTINGS_ADMIN_ROOT_FILE', __FILE__ );
define( 'LWS_WPSETTINGS_ADMIN_ROOT_FILE_RELATIVE_PATH', plugin_basename( __FILE__ ) );
define( 'LWS_WPSETTINGS_ADMIN_SLUG', 'lws_admin_settings' );
define( 'LWS_WPSETTINGS_ADMIN_FOLDER', dirname( plugin_basename( __FILE__ ) ) );
define( 'LWS_WPSETTINGS_ADMIN_URL', plugins_url( '', __FILE__ ) );

/****** Require Menu handler file*/
require_once trailingslashit(LWS_WPSETTINGS_ADMIN_DIR) . 'includes/menu/add-menu-pages.php';

/****** Packages */
require_once trailingslashit(LWS_WPSETTINGS_ADMIN_DIR) . 'packages/dashboard/page-dashboard.php';
require_once trailingslashit(LWS_WPSETTINGS_ADMIN_DIR) . 'packages/pages/page-pages.php';
require_once trailingslashit(LWS_WPSETTINGS_ADMIN_DIR) . 'packages/posts/page-posts.php';
require_once trailingslashit(LWS_WPSETTINGS_ADMIN_DIR) . 'packages/updates/page-updates.php';

/****** Display Version on Frontend Footer */
add_action("wp_footer", function() { echo "LWS WpSettings Admin Version: " . LWS_WPSETTINGS_ADMIN_VERSION; });
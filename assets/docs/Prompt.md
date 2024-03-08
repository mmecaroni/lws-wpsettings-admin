# Prompt: File / Folder Structure

## File/Folder Structure

```
├── /assets
│   ├── /css
│   ├── /docs
│   └── /js
│
├── /includes
│   ├── /database
│   │   └── readme.md
│   └── /menu
│       └── add-menu-pages.php
│
├── /packages
│   ├── /dashboard
│   │   ├── page-dashboard.php
│   │   ├── readme.md
│   │   └── TODOS.md
│   │
│   ├── /pages
│   │   ├── add-excerpt.php
│   │   ├── add-featured-mobile-image.php
│   │   ├── page-pages.php
│   │   ├── readme.md
│   │   └── TODOS.md
│   │
│   └── /settings
│       ├── page-settings.php
│       ├── readme.md
│       └── TODOS.md
│
├── lws-admin-settings.php
├── TODOS.md
└── uninstall.php
```

## CODE

## lws-admin-settings.php

```
<?php
/********************************
 * Plugin Name: LWS Admin Settings
 * Plugin URI: https://github.com/mmecaroni/lws-wp-plugins
 * Description: Demo Admin Settings Plugin
 * Version: 0.0.0
 * Author: Mario Mecaroni
 * Author URI: http://www.liquidstudiogroup.com/mario-mecaroni
 */

 /****** Exit if accessed directly */
if (!defined('ABSPATH')) { exit; }

/****** Constant for Plugin Path */
define('LWS_ADMIN_SETTINGS_PLUGIN_FILE_PATH', plugin_dir_path(__FILE__));

/****** Main Plugin File Constant */
define('LWS_ADMIN_SETTINGS_PLUGIN_MAIN_FILE', __FILE__);

/****** Packages */
require_once trailingslashit(LWS_ADMIN_SETTINGS_PLUGIN_FILE_PATH) . 'packages/dashboard/page-dashboard.php';
require_once trailingslashit(LWS_ADMIN_SETTINGS_PLUGIN_FILE_PATH) . 'packages/pages/page-pages.php';
require_once trailingslashit(LWS_ADMIN_SETTINGS_PLUGIN_FILE_PATH) . 'packages/settings/page-settings.php';

/****** Require Menu handler file*/
require_once trailingslashit(LWS_ADMIN_SETTINGS_PLUGIN_FILE_PATH) . 'includes/menu/add-menu-pages.php';
```

### /packages/pages/add-excerpt.php

```
<?php
/********************************
 * Render the Template
 */

function lws_add_excerpt_to_pages() {
  ?>
  <style>
    .lws-metabox-container { margin: 16px 0px 16px 0px; padding: 0px 16px; background-color: #f6f7f7; border: 1px solid #c3c4c7; box-shadow: 0 1px 1px rgba(0,0,0,.04); }
    .lws-switch-container { position: relative; display: inline-block; width: 60px; height: 34px; }
    .lws-switch-container input.lws-input { width: 0; height: 0; opacity: 0; }
    .lws-slider { position: absolute; top: 0; right: 0; bottom: 0; left: 0; background-color: #ccc; cursor: pointer; -webkit-transition: .4s; transition: .4s; }
    .lws-slider:before { position: absolute; height: 26px; width: 26px; bottom: 4px; left: 4px; content: ""; background-color: white; -webkit-transition: .4s; transition: .4s; }
    input.lws-input:checked + .lws-slider { background-color: #0085ba; }
    input.lws-input:focus + .lws-slider { box-shadow: 0 0 1px #0085ba; }
    input.lws-input:checked + .lws-slider:before { -webkit-transform: translateX(26px); -ms-transform: translateX(26px); transform: translateX(26px); } 
    .lws-slider.lws-round { border-radius: 34px; }
    .lws-slider.lws-round:before { border-radius: 50%; }
  </style>

  <section class="lws-metabox-container">
    <form method="post" action="options.php">
      <?php
        settings_fields('lws_add_excerpt_to_pages_settings_group');
        do_settings_sections('lws-admin-settings');
        submit_button();
      ?>
    </form>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var checkbox = document.getElementById('lws_add_excerpt_to_pages_enable');
      var label = document.querySelector('label[for="lws_add_excerpt_to_pages_enable"]');
      label.innerHTML = '';
      label.className += ' lws-slider lws-round';
    });
  </script>
  <?php
}

// Initialize settings, section, and field
function lws_add_excerpt_to_pages_settings_init() {
  register_setting('lws_add_excerpt_to_pages_settings_group', 'lws_add_excerpt_to_pages_enable');

  add_settings_section(
    'lws_add_excerpt_to_pages_settings_section',
    'Page Excerpt Settings',
    'lws_add_excerpt_to_pages_settings_section_cb',
    'lws-admin-settings'
  );

  add_settings_field(
    'lws_add_excerpt_to_pages_enable_field',
    'Enable Excerpts for Pages',
    'lws_add_excerpt_to_pages_enable_field_cb',
    'lws-admin-settings',
    'lws_add_excerpt_to_pages_settings_section'
  );
}
add_action('admin_init', 'lws_add_excerpt_to_pages_settings_init');

// Settings section callback
function lws_add_excerpt_to_pages_settings_section_cb() {
  echo '<p>Enable or disable excerpt support for WordPress Pages. This allows you to add summaries or teasers to your pages similar to posts.</p>';
}

// Checkbox field callback
function lws_add_excerpt_to_pages_enable_field_cb() {
  $option = get_option('lws_add_excerpt_to_pages_enable');
  echo '
    <div class="lws-switch-container">
      <input 
        type="checkbox"
        id="lws_add_excerpt_to_pages_enable"
        class="lws-input"
        name="lws_add_excerpt_to_pages_enable" value="1" ' . checked(1, $option, false) . '>
      <label for="lws_add_excerpt_to_pages_enable" class="lws-slider"></label>
    </div>
  ';
}

// Add excerpt support to pages based on the setting
function lws_add_excerpt_to_pages_enable_excerpts() {
  if (get_option('lws_add_excerpt_to_pages_enable')) {
    add_post_type_support('page', 'excerpt');
  }
}
add_action('init', 'lws_add_excerpt_to_pages_enable_excerpts');
```

### /packages/pages/add-featured-mobile-image.php.php

```
<?php

function lws_add_featured_mobile_image_to_pages() {
  ?>
  <script>
    // Ensure the script is only enqueued on the post edit screen
    $screen = get_current_screen();
    if ( $screen->id !== 'page' ) {
        return;
    }

    (function (wp) {
        const { registerPlugin } = wp.plugins;
        const { PluginDocumentSettingPanel } = wp.editPost;
        const { Button } = wp.components;
        const { withSelect, withDispatch } = wp.data;
        const { compose } = wp.compose;

        const PluginSidebar = compose([
            withSelect((select) => ({
                // Add code to get image ID from post meta
            })),
            withDispatch((dispatch) => ({
                // Add code to update image ID in post meta
            }))
        ])(() => (
            <PluginDocumentSettingPanel
                name="featured-mobile-image"
                title="Featured Mobile Image"
                className="featured-mobile-image"
            >
                <p>Select a featured mobile image for mobile devices.</p>
                <Button isSecondary>Select Image</Button>
                {/* Add code to handle button click and media library interaction */}
            </PluginDocumentSettingPanel>
        ));

        registerPlugin('lws-featured-mobile-image', {
            render: PluginSidebar,
        });
    })(window.wp);
  </script>
  <?php
}
```

### /packages/pages/page-pages.php

```
<?php
/********************************
 * Pages Page
 */

require_once trailingslashit(LWS_ADMIN_SETTINGS_PLUGIN_FILE_PATH) . 'packages/pages/add-excerpt.php';
require_once trailingslashit(LWS_ADMIN_SETTINGS_PLUGIN_FILE_PATH) . 'packages/pages/add-featured-mobile-image.php';


function lws_admin_settings_page_pages_renderer() {
  echo '<div class="wrap">';
  echo '<h1 class="wp-heading-inline">Pages</h1>';
  echo '<hr />';
  echo '<p>This is Pages content.</p>';
  lws_add_excerpt_to_pages();
  lws_add_featured_mobile_image_to_pages();
  echo '</div>';
}
```

## ERROR

WHy is this not working!?
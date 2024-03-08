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
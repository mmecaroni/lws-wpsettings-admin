<?php
/*
 * Plugin Name: Add Excerpt to Pages
 * Description: Enable excerpts for WordPress pages.
 */

// Render the settings page
function lws_add_excerpt_to_pages() {
    ?>
    <div class="wrap">
        <h1>Add Excerpt to Pages Settings</h1>
        <hr />
        <div class="lws-metabox-container">
            <form method="post" action="options.php">
                <?php
                settings_fields('lws_add_excerpt_to_pages_settings_group');
                do_settings_sections('lws-wpsettings-admin');
                ?>

                <h2 class="">Enable Excerpts for Pages</h2>
                <label class="lws-switch-container lws-round">
                    <input type="checkbox" class="lws-input" name="lws_add_excerpt_to_pages_enable" value="1" <?php checked(1, get_option('lws_add_excerpt_to_pages_enable'), true); ?>>
                    <span class="lws-slider"></span>
                </label>

                <?php submit_button(); ?>
            </form>
        </div>
    </div>
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

    // No need for add_settings_field as the field is hardcoded in the settings section
}
add_action('admin_init', 'lws_add_excerpt_to_pages_settings_init');

// Settings section callback
function lws_add_excerpt_to_pages_settings_section_cb() {
    echo '<p>Enable or disable excerpt support for WordPress Pages. This allows you to add summaries or teasers to your pages similar to posts.</p>';
}

// Add excerpt support to pages based on the setting
function lws_add_excerpt_to_pages_enable_excerpts() {
    if (get_option('lws_add_excerpt_to_pages_enable')) {
        add_post_type_support('page', 'excerpt');
    }
}
add_action('init', 'lws_add_excerpt_to_pages_enable_excerpts');

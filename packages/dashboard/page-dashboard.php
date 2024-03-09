<?php
/********************************
 * Dashboard Page
 */

function lws_wpsettings_admin_dashboard_page() {
    echo '<div class="wrap">';
    echo '<h1 class="wp-heading-inline">Dashboard <small>'. LWS_WPSETTINGS_ADMIN_VERSION. '</small></h1>';
    echo '<hr />';
    echo '<p>This is the dashboard content.</p>';
    echo '</div>';
}
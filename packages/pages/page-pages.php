<?php
/********************************
 * Pages Page
 */

require_once trailingslashit(LWS_WPSETTINGS_ADMIN_DIR) . 'packages/pages/add-excerpt.php';


function lws_wpsettings_admin_pages_page() {
  echo '<div class="wrap">';
  echo '<h1 class="wp-heading-inline">Pages</h1>';
  echo '<hr />';
  echo '<p>This is the pages content.</p>';
  lws_add_excerpt_to_pages();
  echo '</div>';
}
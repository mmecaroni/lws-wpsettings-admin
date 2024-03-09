<?php

add_submenu_page(
  'lws_wpsettings_admin_dashboard',
  'Updates',
  'Updates',
  'manage_options',
  'lws_wpsettings_admin_updates',
  'lws_wpsettings_admin_updates_page'
);
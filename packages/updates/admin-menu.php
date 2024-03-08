<?php

add_submenu_page(
  'lws_admin_settings_dashboard',
  'Updates',
  'Updates',
  'manage_options',
  'lws_admin_settings_updates',
  'lws_admin_settings_updates_page'
);
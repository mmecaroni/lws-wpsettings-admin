<?php

add_submenu_page(
  'lws_admin_settings_dashboard',
  'Dashboard',
  'Dashboard',
  'manage_options',
  'lws_admin_settings_dashboard',
  'lws_admin_settings_dashboard_page'
);
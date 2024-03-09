<?php

add_submenu_page(
  'lws_wpsettings_admin_dashboard',
  'Dashboard',
  'Dashboard',
  'manage_options',
  'lws_wpsettings_admin_dashboard',
  'lws_wpsettings_admin_dashboard_page'
);
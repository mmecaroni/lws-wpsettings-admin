<?php

add_submenu_page(
  'lws_admin_settings_dashboard',
  'Pages',
  'Pages',
  'manage_options',
  'lws_admin_settings_pages',
  'lws_admin_settings_pages_page'
);
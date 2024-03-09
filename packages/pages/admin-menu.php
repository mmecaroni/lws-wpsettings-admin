<?php

add_submenu_page(
  'lws_wpsettings_admin_dashboard',
  'Pages',
  'Pages',
  'manage_options',
  'lws_wpsettings_admin_pages',
  'lws_wpsettings_admin_pages_page'
);
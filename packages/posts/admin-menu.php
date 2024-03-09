<?php

add_submenu_page(
  'lws_wpsettings_admin_dashboard',
  'Posts',
  'Posts',
  'manage_options',
  'lws_wpsettings_admin_posts',
  'lws_wpsettings_admin_posts_page'
);
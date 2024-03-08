<?php

add_submenu_page(
  'lws_admin_settings_dashboard',
  'Posts',
  'Posts',
  'manage_options',
  'lws_admin_settings_posts',
  'lws_admin_settings_posts_page'
);
<?php

// Enqueue frontend styles and scripts

add_action('wp_enqueue_scripts', function() use ($plugin) {

  $url = $plugin->url;
  $version = $plugin->version;

  wp_enqueue_style(
    'jaydash-reportpanel',
    $url . 'assets/build/jaydash-reportpanel.min.css',
    [],
    $version
  );

  wp_enqueue_script(
    'jaydash-reportpanel',
    $url . 'assets/build/jaydash-reportpanel.min.js',
    ['jquery'],
    $version
  );

});

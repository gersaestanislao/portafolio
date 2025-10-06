<?php
// Registro support----------------------------------------
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array(
  'aside',
  'image',
  'video',
  'quote',
  'link',
  'gallery',
  'status',
  'audio',
  'chat',
) );

add_action( 'wp_enqueue_scripts', 'porta_enqueue_theme_assets' );

function porta_enqueue_theme_assets() {
  if ( ! is_singular() ) {
    return;
  }

  wp_enqueue_script(
    'porta-chartjs',
    'https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js',
    array(),
    '4.4.1',
    true
  );

  wp_enqueue_script(
    'porta-metrics-charts',
    get_template_directory_uri() . '/scripts/metrics-charts.js',
    array( 'porta-chartjs' ),
    filemtime( get_template_directory() . '/scripts/metrics-charts.js' ),
    true
  );
}

// Registro de post
add_action('init', 'Web');
function Web() {
  register_post_type( 'Web', array(
  'labels' => array(
  'name' => __('Web'),
  'singular_name' => __('Crear Proyecyto')
  ),
  'public' => true,
  'show_ui' => true,
  'rewrite' => array(
  'slug' => 'Web',
  'with_front' => false
  ),
  'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
  'has_archive' => true,
  'taxonomies' => array('category', 'post_tag'),
  'exclude_from_search' => false,
  ) );
}

// Registro de post
add_action('init', 'Branding');
function Branding() {
  register_post_type( 'Branding', array(
  'labels' => array(
  'name' => __('Branding'),
  'singular_name' => __('Crear Proyecyto')
  ),
  'public' => true,
  'show_ui' => true,
  'rewrite' => array(
  'slug' => 'Branding',
  'with_front' => false
  ),
  'supports' => array('title','editor','author','thumbnail','excerpt','comments','custom-fields'),
  'has_archive' => true,
  'taxonomies' => array('category', 'post_tag'),
  'exclude_from_search' => false,
  ) );
}


?>
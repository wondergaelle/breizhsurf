<?php

/**
 * Register Custom Navigation Walker
 */
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

/**
 * Theme Configuration
 */
function scratch_setup(){

  // Let WordPress manage the document title.
  add_theme_support( 'title-tag' );

  // Post thumbnails
  add_theme_support( 'post-thumbnails' );

  // Register Menu
  register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'scratch' ),
    'social' => __( 'Social Menu', 'scratch' ),
  ) );
  
  // Custom image sizes
  add_image_size( 'thumb-555', 555, 410, true );
  add_image_size( 'thumb-1920', 1920, 1080, true );

}
add_action( 'after_setup_theme', 'scratch_setup' );

/**
 * Enqueue styles & scripts
 */
function scratch_scripts() {

  wp_enqueue_style( 'googlefont', '//fonts.googleapis.com/css?family=Roboto:400,600&display=swap' );
  wp_enqueue_style( 'forkawesome', '//cdn.jsdelivr.net/npm/fork-awesome@1.1.7/css/fork-awesome.min.css' );
  wp_enqueue_style( 'leaflet', get_template_directory_uri() . '/node_modules/leaflet/dist/leaflet.css' );
  
  wp_enqueue_style( 'scratch-styles', get_template_directory_uri() . '/css/main.min.css' );

  wp_enqueue_script( 'jquery');

  wp_enqueue_script('jquery.bootstrap.min', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js', 'jquery', true);
  wp_enqueue_script('jquery.slick.min', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.min.js', 'jquery', true);
  wp_enqueue_script('leaflet', get_template_directory_uri() . '/node_modules/leaflet/dist/leaflet.js', 'jquery', true);
  
  wp_enqueue_script('scratch-scripts', get_template_directory_uri() . '/js/main.js', 'jquery', '1.0.0', true);

  wp_localize_script('scratch-scripts', 'WPURLS', array( 'themeURL' => get_template_directory_uri() ));
}
add_action( 'wp_enqueue_scripts', 'scratch_scripts' );

/**
 * Register sidebars
 */
function scratch_widgets_init() {
  register_sidebar(array(
    'name'          => __( 'Footer', 'scratch' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Add widgets here to appear in your footer.', 'scratch' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s col-md-6 col-lg-4">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title h3">',
    'after_title'   => '</h2>',
  ));  
}
add_action('widgets_init', 'scratch_widgets_init');

/**
 * More link
 */
// add_filter('excerpt_more', function () {
//   return '&hellip; <div class="more-link"><a class="btn btn-outline-primary" href="' . get_permalink() . '" >' . __( 'Read More', 'scratch' ) . '</a></div>';
// });
add_filter('excerpt_more', function () {
  return '&hellip;';
});
add_filter('get_the_excerpt', function ($excerpt) {
  $excerpt_more = '<div class="more-link"><a class="btn btn-outline-primary" href="' . get_permalink() . '" >' . __( 'Lire la suite', 'scratch' ) . '</a></div>';
  return $excerpt . $excerpt_more;
});

/**
 * Excerpt length
 */
add_filter( 'excerpt_length', function ( $length ) {
  return 36;
}, 999 );

/**
 * Archive spots filtering
 */
add_action('pre_get_posts', 'my_pre_get_posts');
 
function my_pre_get_posts( $query ) {
	// validate
	if( is_admin() ) return;
 
  if( !$query->is_main_query() )return;
  
  if (is_post_type_archive('spot')) {

    if (isset($_GET['niveau'])) {

      $query->set( 'meta_key', 'niveau' );
      $query->set( 'meta_query', array(
        array(
          'key'		=> 'niveau',
          'value'		=> $_GET['niveau'],
          'compare'	=> 'IN',
          )
      ) );
      
    }

  }
 
	// always return
	return;
 
}

/* Archive title */
function my_theme_archive_title( $title ) {
  if ( is_category() ) {
    if(is_category( '8' )){
      $title = __('Les actualités du surf en Bretagne', 'scratch');
    }else{
      $title = single_cat_title( __('Actualités - ', 'scratch'), false );
    }
  } elseif ( is_tag() ) {
      $title = single_tag_title( '', false );
  } elseif ( is_author() ) {
      $title = '<span class="vcard">' . get_the_author() . '</span>';
  } elseif ( is_post_type_archive() ) {
    if(get_post_type()=='spot'){
      $title = __('Les meilleurs spots de Bretagne', 'scratch');
    }else{
      $title = post_type_archive_title( '', false );
    }
  } elseif ( is_tax() ) {
      $title = single_term_title( '', false );
  }

  return $title;
}

add_filter( 'get_the_archive_title', 'my_theme_archive_title' );
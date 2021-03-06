<?php
/*
Put custom functions for your theme here
**********************************************************************************/


/*
Sets up the Artwork post type for the theme
**********************************************************************************/

function artism_theme_setup() {

  /* post thumbnails */
  add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

  /* HTML5 */
  add_theme_support( 'html5' );

  /* Register the artwork custom post type */
  include( get_stylesheet_directory() . '/artism-functions/artism-cpt.php' );

  /* Setup the admin for individual Artwork postings */
  include( get_stylesheet_directory() . '/artism-functions/artism-admin.php' );

  /* Setup the image uploaders for Artowrk postings */
  include( get_stylesheet_directory() . '/artism-functions/artism-images.php' );

  /* Register Artwork postings fields with the API */
  include( get_stylesheet_directory() . '/artism-functions/artism-api-fields.php' );

  /* Enqueue scripts for Artwork Admin */
  include( get_stylesheet_directory() . '/artism-functions/artism-admin-scripts.php' );

  /* Remove CPT from URL structure */
  include( get_stylesheet_directory() . '/artism-functions/artism-remove-slug.php' );

}

add_action( 'after_setup_theme', 'artism_theme_setup' );

/*
Load scripts and styles for the site
**********************************************************************************/

function artism_enqueue_scripts() {
  wp_enqueue_style( 'artism-styles', get_template_directory_uri() . '/style.css', '', time() );
  wp_enqueue_style( 'artism-front-page' , get_template_directory_uri() . '/css/artism-front-page.css', '', time() );
  if ( is_singular( 'artwork' )) {
    wp_enqueue_style( 'artwork-single-styles', get_template_directory_uri() . '/css/artwork-single-style.css', '', time() );
  }
}

add_action( 'wp_enqueue_scripts', 'artism_enqueue_scripts' );

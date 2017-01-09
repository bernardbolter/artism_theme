<?php
/**********************************************************************************

artism_theme_setup - sets up the artwork post type for the theme

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


}

add_action( 'after_setup_theme', 'artism_theme_setup' );

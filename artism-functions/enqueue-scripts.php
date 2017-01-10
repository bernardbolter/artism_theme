<?php
function artism_admin_enqueue_scripts() {
    global $pagenow, $typenow;

    if ( ( $pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'artwork') {
      wp_enqueue_media();
      wp_enqueue_style( 'artism-admin', get_template_directory_uri() . '/css/artism-admin.css' );
      wp_enqueue_script( 'artism-js', get_template_directory_uri() . '/js/artism-admin.js', array( 'jquery', 'media-upload', 'jquery-ui-datepicker' ), '20170103' );
      wp_localize_script( 'artism-js', 'artismImageUpload', array(
         'primaryImageData' => get_post_meta( get_the_ID(), 'image', true),
         'complementaryImageData' => get_post_meta( get_the_ID(), 'complementaryImage', true),
         'secondComplementaryImageData' => get_post_meta( get_the_ID(), 'secondComplementaryImage', true)
         ) );
      wp_enqueue_style( 'artism-datepicker-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' );
    }
}

add_action( 'admin_enqueue_scripts', 'artism_admin_enqueue_scripts' );

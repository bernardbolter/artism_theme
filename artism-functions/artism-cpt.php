<?php

function artism_register_post_type() {

  $singular = 'Artwork';
  $plural = 'Artworks';

  $labels = array(
    'name'                => $plural,
    'singular_name'       => $singular,
    'add_new_label'       => 'Add New',
    'add_new_item'        => 'Add New ' . $singular,
    'edit'                => 'Edit',
    'edit_item'           => 'Edit ' . $singular,
    'new_item'            => 'New ' . $singular,
    'view'                => 'View ' . $singular,
    'view_item'           => 'View ' . $singular,
    'search_term'         => 'Search ' . $singular,
    'parent'              => 'Parent ' . $singular,
    'not_found'           => 'No ' . $plural . ' found',
    'not_found_in_trash'  => 'No ' . $plural . ' in Trash'
  );

  $args = array(
    'labels'              => $labels,
    'public'              => true,
    'publicly_queryable'  => true,
    'exclude_from_search' => false,
    'show_in_nav_menu'    => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 2,
    'menu_icon'           => 'dashicons-format-image',
    'can_export'          => true,
    'delete_with_user'    => false,
    'hierarchical'        => false,
    'has_archive'         => true,
    'query_var'           => true,
    'capability_type'     => 'post',
    'map_meta_cap'        => true,
    // 'capabilities' => array(),
    'rewrite'             => array(
        'slug'       => 'artwork',
        'with_front' => true,
        'pages'      => true,
        'feeds'      => true,
    ),
    'show_in_rest'            => true,
    'rest_controller_class'   => "WP_REST_Posts_Controller",
    'supports'             => array(
      'title'
    )
  );

  register_post_type( 'artwork', $args );
}

add_action( 'init', 'artism_register_post_type' );

?>

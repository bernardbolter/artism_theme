<?php

// REGISTER CUSTOM FIELDS WITH THE WORDPRESS API

add_action( 'rest_api_init', 'artism_register_custom_fields');

function artism_register_custom_fields() {
  register_rest_field(
    'artwork',
    'artMedium',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'artworkSurface',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'artform',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'dateCreated',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'width',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'height',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'depth',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'artEdition',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'headline',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'about',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'text',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'creator',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'contributor',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'copyrightHolder',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'copyrightYear',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'contentLocation',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'locationCreated',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'genre',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'keywords',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'name',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'url',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'description',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'series',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'image',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'thumbnailUrl',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'imageMedium',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'imageLarge',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'complementaryArtworkTitle',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'complementaryArtMedium',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'complementaryArtworkYear',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'complementaryArtworkLink',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'complementaryImage',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'complementaryThumbnailUrl',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'complementaryImageMedium',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'complementaryImageLarge',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'secondComplementaryArtworkTitle',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'secondComplementaryArtMedium',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'secondComplementaryArtworkYear',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'secondComplementaryArtworkLink',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'secondComplementaryImage',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'secondComplementaryThumbnailUrl',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'secondComplementaryImageMedium',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
  register_rest_field(
    'artwork',
    'secondComplementaryImageLarge',
    array(
        'get_callback' => 'artism_show_fields'
    )
  );
}

function artism_show_fields($object, $field_name, $request) {
  return get_post_meta($object['id'], $field_name, true);
}

?>

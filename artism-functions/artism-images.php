<?php

function artism_images_metaboxes() {
    add_meta_box(
      'artism-images',
      'Primary Artwork Image Uploader',
      'artism_images_uploader_callback',
      'artwork',
      'side',
      'high'
    );
}

// REGISTER METABOXES ------------------------------------------------------------------------

add_action( 'add_meta_boxes', 'artism_images_metaboxes' );

// PRIMARY IMAGE -----------------------------------------------------------------------------

function artism_images_uploader_callback( $post_id ) {
  wp_nonce_field( basename( __FILE__), 'artism_images_nonce' );
  ?>
      <div class="artism__imagewrapper">
        <h4 class="artism__uploader--headline">Choose an image of the artwork, bigger artwork files will be saved by Wordpress into smaller versions with correlating API declarations.</h4>
        <h5 class="artism__uploader--subheadline">SIZES(api): thumbnailUrl, mediumImage, largeImage, image</h5>
        <img id="primary-image-tag" />
        <input type="hidden" id="primary-image-hidden-field" name="image" />
        <input class="artism__button" type="button" id="primary-image-upload-button" value="Add Image" />
        <input class="artism__button" type="button" id="primary-image-delete-button" value="Remove Image" />
      </div>
  <?php
}

// SAVE IMAGES ---------------------------------------------------------------------------------

function artism_save_images( $post_id ) {
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST[ 'artism_images_nonce' ] ) && wp_verify_nonce( $_POST[ 'artism_images_nonce' ], basename( __FILE__ )));

  // exits script depnding on save status
  if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
    return;
  }

  if (isset( $_POST[ 'image' ])) {
      $primary_image_data = json_decode( stripslashes( $_POST[ 'image' ]));
      if ( is_object( $primary_image_data[0] ) ) {
      $attachment_id = ($primary_image_data[0]->id);
      update_post_meta( $post_id, '_thumbnail_id', $attachment_id);
  		$image_data = (esc_url_raw( $primary_image_data[0]->url ));
      update_post_meta( $post_id, 'image', $image_data );
      $thumbnail_image_data = (esc_url_raw( $primary_image_data[0]->thumbnailUrl ));
      update_post_meta( $post_id, 'thumbnailUrl', $thumbnail_image_data );
      $medium_image_data = (esc_url_raw( $primary_image_data[0]->mediumUrl ));
      update_post_meta( $post_id, 'imageMedium', $medium_image_data );
      $large_image_data = (esc_url_raw( $primary_image_data[0]->largeUrl ));
      update_post_meta( $post_id, 'imageLarge', $large_image_data );
    	} else {
        $primary_image_data = [];
      }
  }
}

add_action( 'save_post', 'artism_save_images' );

function artism_complementary_images_metaboxes() {
    add_meta_box(
      'artism-complementary-images',
      'Complementary Artwork Image Uploader',
      'artism_complementary_images_callback',
      'artwork',
      'side',
      'low'
    );
}

// REGISTER METABOXES ------------------------------------------------------------------------

add_action( 'add_meta_boxes', 'artism_complementary_images_metaboxes' );

// APPENDED IMAGES -----------------------------------------------------------------------------

function artism_complementary_images_callback( $post ) {
  wp_nonce_field( basename( __FILE__), 'artism_complementary_images_nonce' );
  $artism_complementary_image_meta = get_post_meta( $post->ID );
  ?><div class="image_wrap">

    <?php /* COMPLEMENTARY ARTWORK */ ?>
      <div class="artism__imagewrapper">
        <h3 class="artism__uploader--title">Complementary Artwork Image Uploader</h3>
        <h5 class="artism__uploader--subheadline">SIZES(api): complementaryThumbnailUrl, complementaryMediumImage, complementaryLargeImage, complementaryImage</h5>
        <img id="complementary-image-tag" />
        <input type="hidden" id="complementary-image-hidden-field" name="complementaryImage" />
        <input class="artism__button" type="button" id="complementary-image-upload-button" value="Add Image" />
        <input class="artism__button" type="button" id="complementary-image-delete-button" value="Remove Image" />

        <?php /* COMPLEMENTARY ARTWORK TITLE */ ?>

        <div class="artism__input">
            <label for="complementaryArtworkTitle" class="artism__input--title">Title <span class="artism__input--property"> - property | complementaryArtworkTitle</span></label>
            <input type="text" class="artism__input--field" name="complementaryArtworkTitle" id="complementaryArtworkTitle" value="<?php if ( ! empty ( $artism_complementary_image_meta['complementaryArtworkTitle'] ) ) echo esc_attr( $artism_complementary_image_meta['complementaryArtworkTitle'][0] ) ?>" />
        </div>
        <div class="artism__description">
            <h4 class="artism__description--content">Title of the Complementary Artwork image</h4>
        </div>

        <?php /* COMPLEMENTARY ART MEDIUM */ ?>

        <div class="artism__input">
            <label for="complementaryArtMedium" class="artism__input--title">Medium <span class="artism__input--property"> - property | complementaryArtMedium</span></label>
            <input type="text" class="artism__input--field" name="complementaryArtMedium" id="complementaryArtMedium" value="<?php if ( ! empty ( $artism_complementary_image_meta['complementaryArtMedium'] ) ) echo esc_attr( $artism_complementary_image_meta['complementaryArtMedium'][0] ) ?>" />
        </div>
        <div class="artism__description">
            <h4 class="artism__description--content">Medium of the Complementary Artwork</h4>
        </div>

        <?php /* COMPLEMENTARY ARTWORK YEAR */ ?>

        <div class="artism__input">
            <label for="complementaryArtworkYear" class="artism__input--title">Year <span class="artism__input--property"> - property | complementaryArtworkYear</span></label>
            <input type="text" class="artism__input--field" name="complementaryArtworkYear" id="complementaryArtworkYear" value="<?php if ( ! empty ( $artism_complementary_image_meta['complementaryArtworkYear'] ) ) echo esc_attr( $artism_complementary_image_meta['complementaryArtworkYear'][0] ) ?>" />
        </div>
        <div class="artism__description">
            <h4 class="artism__description--content">Year Complementary Artwork was created</h4>
        </div>

        <?php /* COMPLEMENTARY ARTWORK LINK */ ?>

        <div class="artism__input">
            <label for="complementaryArtworkLink" class="artism__input--title">Link <span class="artism__input--property"> - property | complementaryArtworkLink</span></label>
            <input type="text" class="artism__input--field" name="complementaryArtworkLink" id="complementaryArtworkLink" value="<?php if ( ! empty ( $artism_complementary_image_meta['complementaryArtworkLink'] ) ) echo esc_attr( $artism_complementary_image_meta['complementaryArtworkLink'][0] ) ?>" />
        </div>
        <div class="artism__description">
            <h4 class="artism__description--content">Link to the Complementary Artwork</h4>
        </div>
      </div>

      <?php /* SECOND COMPLEMENTARY ARTWORK */ ?>
      <div class="artism__imagewrapper">
        <h3 class="artism__uploader--title">Second Complementary Artwork Image Uploader</h3>
        <h5 class="artism__uploader--subheadline">SIZES(api): secondComplementaryThumbnailUrl, secondComplementaryMediumImage, secondComplementaryLargeImage, secondComplementaryImage</h5>
        <img id="second-complementary-image-tag" />
        <input type="hidden" id="second-complementary-image-hidden-field" name="secondComplementaryImage" />
        <input class="artism__button" type="button" id="second-complementary-image-upload-button" value="Add Image" />
        <input class="artism__button" type="button" id="second-complementary-image-delete-button" value="Remove Image" />

        <?php /* SECOND COMPLEMENTARY ARTWORK TITLE */ ?>

        <div class="artism__input">
            <label for="secondComplementaryArtworkTitle" class="artism__input--title">Title <span class="artism__input--property"> - property | secondComplementaryArtworkTitle</span></label>
            <input type="text" class="artism__input--field" name="secondComplementaryArtworkTitle" id="secondComplementaryArtworkTitle" value="<?php if ( ! empty ( $artism_complementary_image_meta['secondComplementaryArtworkTitle'] ) ) echo esc_attr( $artism_complementary_image_meta['secondComplementaryArtworkTitle'][0] ) ?>" />
        </div>
        <div class="artism__description">
            <h4 class="artism__description--content">Title of the Second Complementary Artwork image</h4>
        </div>

        <?php /* SECOND COMPLEMENTARY ART MEDIUM */ ?>

        <div class="artism__input">
            <label for="secondComplementaryArtMedium" class="artism__input--title">Medium <span class="artism__input--property"> - property | secondComplementaryArtMedium</span></label>
            <input type="text" class="artism__input--field" name="secondComplementaryArtMedium" id="secondComplementaryArtMedium" value="<?php if ( ! empty ( $artism_complementary_image_meta['secondComplementaryArtMedium'] ) ) echo esc_attr( $artism_complementary_image_meta['secondComplementaryArtMedium'][0] ) ?>" />
        </div>
        <div class="artism__description">
            <h4 class="artism__description--content">Medium of the Second Complementary Artwork</h4>
        </div>

        <?php /* SECOND COMPLEMENTARY ARTWORK YEAR */ ?>

        <div class="artism__input">
            <label for="secondComplementaryArtworkYear" class="artism__input--title">Year <span class="artism__input--property"> - property | secondComplementaryArtworkYear</span></label>
            <input type="text" class="artism__input--field" name="secondComplementaryArtworkYear" id="secondComplementaryArtworkYear" value="<?php if ( ! empty ( $artism_complementary_image_meta['secondComplementaryArtworkYear'] ) ) echo esc_attr( $artism_complementary_image_meta['secondComplementaryArtworkYear'][0] ) ?>" />
        </div>
        <div class="artism__description">
            <h4 class="artism__description--content">Year Second Complementary Artwork was created</h4>
        </div>

        <?php /* SECOND COMPLEMENTARY ARTWORK LINK */ ?>

        <div class="artism__input">
            <label for="secondComplementaryArtworkLink" class="artism__input--title">Link <span class="artism__input--property"> - property | secondComplementaryArtworkLink</span></label>
            <input type="text" class="artism__input--field" name="secondComplementaryArtworkLink" id="secondComplementaryArtworkLink" value="<?php if ( ! empty ( $artism_complementary_image_meta['secondComplementaryArtworkLink'] ) ) echo esc_attr( $artism_complementary_image_meta['secondComplementaryArtworkLink'][0] ) ?>" />
        </div>
        <div class="artism__description">
            <h4 class="artism__description--content">Link to the Second Complementary Artwork</h4>
        </div>
      </div>
  </div>
  <?php
}

// SAVE IMAGES ---------------------------------------------------------------------------------

function artism_save_complementary_images( $post_id ) {
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST[ 'artism_complementary_images_nonce' ] ) && wp_verify_nonce( $_POST[ 'artism_complementary_images_nonce' ], basename( __FILE__ )));

  // exits script depnding on save status
  if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
    return;
  }

  if (isset( $_POST[ 'complementaryImage' ])) {
      $complementary_image_data = json_decode( stripslashes( $_POST[ 'complementaryImage' ]));
      if ( is_object( $complementary_image_data[0] ) ) {
  		$image_data_complementary = (esc_url_raw( $complementary_image_data[0]->url ));
      update_post_meta( $post_id, 'complementaryImage', $image_data_complementary );
      $thumbnail_image_data_complementary = (esc_url_raw( $complementary_image_data[0]->thumbnailUrl ));
      update_post_meta( $post_id, 'complementaryThumbnailUrl', $thumbnail_image_data_complementary );
      $medium_image_data_complementary = (esc_url_raw( $complementary_image_data[0]->mediumUrl ));
      update_post_meta( $post_id, 'complementaryImageMedium', $medium_image_data_complementary );
      $large_image_data_complementary = (esc_url_raw( $complementary_image_data[0]->largeUrl ));
      update_post_meta( $post_id, 'complementaryImageLarge', $large_image_data_complementary );
    	} else {
        $complementary_image_data = [];
      }
  }

  if (isset( $_POST[ 'secondComplementaryImage' ])) {
      $second_complementary_image_data = json_decode( stripslashes( $_POST[ 'secondComplementaryImage' ]));
      if ( is_object( $second_complementary_image_data[0] ) ) {
  		$image_data_second_complementary = (esc_url_raw( $second_complementary_image_data[0]->url ));
      update_post_meta( $post_id, 'secondComplementaryImage', $image_data_second_complementary );
      $thumbnail_image_data_second_complementary = (esc_url_raw( $second_complementary_image_data[0]->thumbnailUrl ));
      update_post_meta( $post_id, 'secondComplementaryThumbnailUrl', $thumbnail_image_data_second_complementary );
      $medium_image_data_second_complementary = (esc_url_raw( $second_complementary_image_data[0]->mediumUrl ));
      update_post_meta( $post_id, 'secondComplementaryImageMedium', $medium_image_data_second_complementary);
      $large_image_data_second_complementary = (esc_url_raw( $second_complementary_image_data[0]->largeUrl ));
      update_post_meta( $post_id, 'secondComplementaryImageLarge', $large_image_data_second_complementary );
    	} else {
        $second_complementary_image_data = [];
      }
  }

  if ( isset( $_POST['complementaryArtworkTitle'] ) ) {
    update_post_meta($post_id, 'complementaryArtworkTitle', sanitize_text_field($_POST['complementaryArtworkTitle']) );
  }

  if ( isset( $_POST['complementaryArtworkYear'] ) ) {
    update_post_meta($post_id, 'complementaryArtworkYear', sanitize_text_field($_POST['complementaryArtworkYear']) );
  }

  if ( isset( $_POST['complementaryArtMedium'] ) ) {
    update_post_meta($post_id, 'complementaryArtMedium', sanitize_text_field($_POST['complementaryArtMedium']) );
  }

  if ( isset( $_POST['complementaryArtworkLink'] ) ) {
    update_post_meta($post_id, 'complementaryArtworkLink', sanitize_text_field($_POST['complementaryArtworkLink']) );
  }

  if ( isset( $_POST['secondComplementaryArtworkTitle'] ) ) {
    update_post_meta($post_id, 'secondComplementaryArtworkTitle', sanitize_text_field($_POST['secondComplementaryArtworkTitle']) );
  }

  if ( isset( $_POST['secondComplementaryArtworkYear'] ) ) {
    update_post_meta($post_id, 'secondComplementaryArtworkYear', sanitize_text_field($_POST['secondComplementaryArtworkYear']) );
  }

  if ( isset( $_POST['secondComplementaryArtMedium'] ) ) {
    update_post_meta($post_id, 'secondComplementaryArtMedium', sanitize_text_field($_POST['secondComplementaryArtMedium']) );
  }

  if ( isset( $_POST['secondComplementaryArtworkLink'] ) ) {
    update_post_meta($post_id, 'secondComplementaryArtworkLink', sanitize_text_field($_POST['secondComplementaryArtworkLink']) );
  }
}

add_action( 'save_post', 'artism_save_complementary_images' );

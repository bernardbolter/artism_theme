<?php

function artism_description_metaboxs() {
  add_meta_box(
    'artism-description',
    'Artwork Information',
    'artism_description_callback',
    'artwork',
    'normal',
    'high'
  );
}

add_action( 'add_meta_boxes', 'artism_description_metaboxs' );

function artism_description_callback( $post ) {
  wp_nonce_field( basename( __FILE__ ), 'artism_artwork_nonce');
  $artism_stored_meta = get_post_meta( $post->ID );
  ?>
    <div class="artism__properties">
      <h3>Properties from <a href="https://schema.org/VisualArtwork" target="_blank">VisualArtwork</a></h3>
      <h5 class="artism__properties--subtext">A work of art that is primarily visual in character.</h5>
    </div>

    <?php /* ARTWORK MEDIUM */ ?>

    <div class="artism__input">
        <label for="artMedium" class="artism__input--title">Artwork Medium <span class="artism__input--property"> - property | artMedium</span></label>
        <input type="text" class="artism__input--field" name="artMedium" id="artMedium" value="<?php if ( ! empty ( $artism_stored_meta['artMedium'] ) ) echo esc_attr( $artism_stored_meta['artMedium'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Text or URL</h3>
        <h4 class="artism__description--content">Description: The material used. (e.g. Oil, Watercolour, Acrylic, Linoprint, Marble, Cyanotype, Digital, Lithograph, DryPoint, Intaglio, Pastel, Woodcut, Pencil, Mixed Media, etc.) Supersedes <a href="https://schema.org/material" traget="_blank">material</a>.</h4>
    </div>

    <?php /* ARTWORK SURFACE */ ?>

    <div class="artism__input">
        <label for="artworkSurface" class="artism__input--title">Artwork Surface <span class="artism__input--property"> - property | artworkSurface</span></label>
        <input type="text" class="artism__input--field" name="artworkSurface" id="artworkSurface" value="<?php if ( ! empty ( $artism_stored_meta['artworkSurface'] ) ) echo esc_attr( $artism_stored_meta['artworkSurface'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Text or URL</h3>
        <h4 class="artism__description--content">Description: The supporting materials for the artwork, e.g. Canvas, Paper, Wood, Board, etc. Supersedes <a href="https://schema.org/surface" target="_blank">surface</a>.</h4>
    </div>

    <?php /* ARTWORK SURFACE */ ?>

    <div class="artism__input">
        <label for="artform" class="artism__input--title">Artwork Form <span class="artism__input--property"> - property | artform</span></label>
        <input type="text" class="artism__input--field" name="artform" id="artform" value="<?php if ( ! empty ( $artism_stored_meta['artform'] ) ) echo esc_attr( $artism_stored_meta['artform'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Integer or Text</h3>
        <h4 class="artism__description--content">Description: e.g. Painting, Drawing, Sculpture, Print, Photograph, Assemblage, Collage, etc.</h4>
    </div>

    <?php /* WIDTH */ ?>

    <div class="artism__input">
        <label for="width" class="artism__input--title">Width <span class="artism__input--property"> - property | width</span></label>
        <input type="text" class="artism__input--field" name="width" id="width" value="<?php if ( ! empty ( $artism_stored_meta['width'] ) ) echo esc_attr( $artism_stored_meta['width'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Distance or QuantitativeValue </h3>
        <h4 class="artism__description--content">Description: The width of the item.</h4>
    </div>

    <?php /* HEIGHT */ ?>

    <div class="artism__input">
        <label for="height" class="artism__input--title">Height <span class="artism__input--property"> - property | height</span></label>
        <input type="text" class="artism__input--field" name="height" id="height" value="<?php if ( ! empty ( $artism_stored_meta['height'] ) ) echo esc_attr( $artism_stored_meta['height'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Distance or QuantitativeValue </h3>
        <h4 class="artism__description--content">Description: The height of the item.</h4>
    </div>

    <?php /* DEPTH */ ?>

    <div class="artism__input">
        <label for="depth" class="artism__input--title">Depth <span class="artism__input--property"> - property | depth</span></label>
        <input type="text" class="artism__input--field" name="depth" id="depth" value="<?php if ( ! empty ( $artism_stored_meta['depth'] ) ) echo esc_attr( $artism_stored_meta['depth'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Distance or QuantitativeValue </h3>
        <h4 class="artism__description--content">Description: The depth of the item.</h4>
    </div>

    <?php /* EDITION */ ?>

    <div class="artism__input">
        <label for="artEdition" class="artism__input--title">Edition <span class="artism__input--property"> - property | artEdition</span></label>
        <input type="text" class="artism__input--field" name="artEdition" id="artEdition" value="<?php if ( ! empty ( $artism_stored_meta['artEdition'] ) ) echo esc_attr( $artism_stored_meta['artEdition'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Integer or Text</h3>
        <h4 class="artism__description--content">Description: The number of copies when multiple copies of a piece of artwork are produced - e.g. for a limited edition of 20 prints, 'artEdition' refers to the total number of copies (in this example "20").</h4>
    </div>

    <?php /* CREATIVE WORK */ ?>

    <div class="artism__properties">
      <h3>Properties from <a href="https://schema.org/CreativeWork" target="_blank">CreativeWork</a></h3>
      <h5 class="artism__properties--subtext">The most generic kind of creative work, including books, movies, photographs, software programs, etc.</h5>
    </div>

    <?php /* HEADLINE */ ?>

    <div class="artism__input">
        <label for="headline" class="artism__input--title">Headline <span class="artism__input--property"> - property | headline</span></label>
        <input type="text" class="artism__input--field" name="headline" id="headline" value="<?php if ( ! empty ( $artism_stored_meta['headline'] ) ) echo esc_attr( $artism_stored_meta['headline'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Text</h3>
        <h4 class="artism__description--content">Description: Headline of the Artwork.</h4>
    </div>

    <?php /* ABOUT */ ?>

    <div class="artism__input">
        <label for="about" class="artism__input--title">About <span class="artism__input--property"> - property | about</span></label>
        <textarea name="about" rows="5" cols="30" class="artism__input--field" name="about" id="about"><?php if ( ! empty ( $artism_stored_meta['about'] ) ) echo esc_attr( $artism_stored_meta['about'][0] ); ?></textarea>
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Text</h3>
        <h4 class="artism__description--content">Description: The subject matter of the content.</h4>
    </div>

    <?php /* TEXT */ ?>

    <div class="artism__input">
        <label for="text" class="artism__input--title">Text <span class="artism__input--property"> - property | text</span></label>
        <textarea name="text" rows="5" cols="30" class="artism__input--field" name="text" id="text"><?php if ( ! empty ( $artism_stored_meta['text'] ) ) echo esc_attr( $artism_stored_meta['text'][0] ); ?></textarea>
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Text</h3>
        <h4 class="artism__description--content">Description: The textual content of this CreativeWork.</h4>
    </div>

    <?php /* CREATOR */ ?>

    <div class="artism__input">
        <label for="creator" class="artism__input--title">Creator <span class="artism__input--property"> - property | creator</span></label>
        <input type="text" class="artism__input--field" name="creator" id="creator" value="<?php if ( ! empty ( $artism_stored_meta['creator'] ) ) echo esc_attr( $artism_stored_meta['creator'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Organization or Person</h3>
        <h4 class="artism__description--content">Description: The creator/author of this CreativeWork. This is the same as the Author property for CreativeWork.</h4>
    </div>

    <?php /* CONTRIBUTOR */ ?>

    <div class="artism__input">
        <label for="contributor" class="artism__input--title">Contributor <span class="artism__input--property"> - property | contributor</span></label>
        <input type="text" class="artism__input--field" name="contributor" id="contributor" value="<?php if ( ! empty ( $artism_stored_meta['contributor'] ) ) echo esc_attr( $artism_stored_meta['contributor'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Organization or Person</h3>
        <h4 class="artism__description--content">Description: A secondary contributor to the CreativeWork or Event.</h4>
    </div>

    <?php /* DATE CREATED */ ?>

    <div class="artism__input">
        <label for="dateCreated" class="artism__input--title">Date Created <span class="artism__input--property"> - property | dateCreated</span></label>
        <input type="text" class="artism__input--field datepicker" name="dateCreated" id="dateCreated" value="<?php if ( ! empty ( $artism_stored_meta['dateCreated'] ) ) echo esc_attr( $artism_stored_meta['dateCreated'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Date or DateTime ( Year-Month-Day ) </h3>
        <h4 class="artism__description--content">Description: The date on which the Artwork was created or the item was added to a DataFeed.</h4>
    </div>

    <?php /* COPYRIGHT HOLDER */ ?>

    <div class="artism__input">
        <label for="copyrightHolder" class="artism__input--title">Copyright Holder <span class="artism__input--property"> - property | copyrightHolder</span></label>
        <input type="text" class="artism__input--field" name="copyrightHolder" id="copyrightHolder" value="<?php if ( ! empty ( $artism_stored_meta['copyrightHolder'] ) ) echo esc_attr( $artism_stored_meta['copyrightHolder'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Organization or Person</h3>
        <h4 class="artism__description--content">Description: The party holding the legal copyright to the CreativeWork.</h4>
    </div>

    <?php /* COPYRIGHT YEAR */ ?>

    <div class="artism__input">
        <label for="copyrightYear" class="artism__input--title">Copyright Year <span class="artism__input--property"> - property | copyrightYear</span></label>
        <input type="number" class="artism__input--field" name="copyrightYear" id="copyrightYear" value="<?php if ( ! empty ( $artism_stored_meta['copyrightYear'] ) ) echo esc_attr( $artism_stored_meta['copyrightYear'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Number </h3>
        <h4 class="artism__description--content">Description: The year during which the claimed copyright for the CreativeWork was first asserted.</h4>
    </div>

    <?php /* CONTENT LOCATION */ ?>

    <div class="artism__input">
        <label for="contentLocation" class="artism__input--title">Content Location <span class="artism__input--property"> - property | contentLocation</span></label>
        <input type="text" class="artism__input--field" name="contentLocation" id="contentLocation" value="<?php if ( ! empty ( $artism_stored_meta['contentLocation'] ) ) echo esc_attr( $artism_stored_meta['contentLocation'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Place </h3>
        <h4 class="artism__description--content">Description: The location depicted or described in the content. For example, the location in a photograph or painting.</h4>
    </div>

    <?php /* LOCATION CREATED */ ?>

    <div class="artism__input">
        <label for="locationCreated" class="artism__input--title">Location Created <span class="artism__input--property"> - property | locationCreated</span></label>
        <input type="text" class="artism__input--field" name="locationCreated" id="locationCreated" value="<?php if ( ! empty ( $artism_stored_meta['locationCreated'] ) ) echo esc_attr( $artism_stored_meta['locationCreated'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Place </h3>
        <h4 class="artism__description--content">Description: The location where the CreativeWork was created, which may not be the same as the location depicted in the CreativeWork.</h4>
    </div>

    <?php /* GENRE */ ?>

    <div class="artism__input">
        <label for="genre" class="artism__input--title">Genre <span class="artism__input--property"> - property | genre</span></label>
        <input type="text" class="artism__input--field" name="genre" id="genre" value="<?php if ( ! empty ( $artism_stored_meta['genre'] ) ) echo esc_attr( $artism_stored_meta['genre'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Text or URL</h3>
        <h4 class="artism__description--content">Description: Genre of the creative work or group.</h4>
    </div>

    <?php /* KEYWORDS */ ?>

    <div class="artism__input">
        <label for="keywords" class="artism__input--title">Keywords <span class="artism__input--property"> - property | keywords</span></label>
        <input type="text" class="artism__input--field" name="keywords" id="keywords" value="<?php if ( ! empty ( $artism_stored_meta['keywords'] ) ) echo esc_attr( $artism_stored_meta['keywords'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Text</h3>
        <h4 class="artism__description--content">Description: Keywords or tags used to describe this content. Multiple entries in a keywords list are typically delimited by commas.</h4>
    </div>

    <?php /* THING */ ?>

    <div class="artism__properties">
      <h3>Properties from <a href="https://schema.org/Thing" target="_blank">Thing</a></h3>
      <h5 class="artism__properties--subtext">The most generic type of item.</h5>
    </div>

    <?php /* NAME */ ?>

    <div class="artism__input">
        <label for="name" class="artism__input--title">Name <span class="artism__input--property"> - property | name</span></label>
        <input type="text" class="artism__input--field" name="name" id="name" value="<?php if ( ! empty ( $artism_stored_meta['name'] ) ) echo esc_attr( $artism_stored_meta['name'][0] ); ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Text</h3>
        <h4 class="artism__description--content">Description: The name of the item.</h4>
    </div>

    <?php /* URL */ ?>

    <div class="artism__input">
        <label for="url" class="artism__input--title">URL <span class="artism__input--property"> - property | url</span></label>
        <input type="text" class="artism__input--field" name="url" id="url" value="<?php if ( ! empty ( $artism_stored_meta['url'] ) ) echo esc_attr( $artism_stored_meta['url'][0] ) ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: URL</h3>
        <h4 class="artism__description--content">Description: URL of the item. <span class="artism__input--property">(if nothing enter, use link attribute in API)</span></h4>
    </div>

    <?php /* DESCRIPTION */ ?>

    <div class="artism__input">
        <label for="description" class="artism__input--title">Description <span class="artism__input--property"> - property | description</span></label>
        <textarea name="description" rows="5" cols="30" class="artism__input--field" name="description" id="description"><?php if ( ! empty ( $artism_stored_meta['description'] ) ) echo esc_attr( $artism_stored_meta['description'][0] ); ?></textarea>
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Text</h3>
        <h4 class="artism__description--content">Description: A description of the item.</h4>
    </div>

    <?php /* PROPERTIES FOR BERNARD BOLTER DOT COM */ ?>

    <div class="artism__properties">
      <h3>Properties for bernardbolter.com</h3>
      <h5 class="artism__properties--subtext">These properties are specific to bernardbolter.com and not apart of the schema.</h5>
    </div>

    <?php /* SERIES */ ?>

    <div class="artism__input">
        <label for="series" class="artism__input--title">Series <span class="artism__input--property"> - property | series</span></label>
        <input type="text" class="artism__input--field" name="series" id="series" value="<?php if ( ! empty ( $artism_stored_meta['series'] ) ) echo esc_attr( $artism_stored_meta['series'][0] ) ?>" />
    </div>
    <div class="artism__description">
        <h3 class="artism__description--header">Expected Type: Text</h3>
        <h4 class="artism__description--content">Description: Code for series declaration. <span class="artism__input--property">ach = A Colorful History | dcs = Digital City Series | acs = Art Collision Series | vls = Vanishing Landscape Series | ogp = OG Oil Paintings | per = Performance Art | wat = Watercolour Paintings | dra = Drawings | pho = Photography</span></h4>
    </div>



<?php
}

function artism_description_meta_save( $post_id ) {
  // Check save status
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST[ 'artism_artwork_nonce' ]) && wp_verify_nonce( $_POST['artism_artwork_nonce'], basename(__FILE__) ) ) ? 'true' : 'false';

  if ( $is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }

  if ( isset( $_POST['artMedium'] ) ) {
    update_post_meta($post_id, 'artMedium', sanitize_text_field($_POST['artMedium']) );
  }

  if ( isset( $_POST['artworkSurface'] ) ) {
    update_post_meta($post_id, 'artworkSurface', sanitize_text_field($_POST['artworkSurface']) );
  }

  if ( isset( $_POST['artform'] ) ) {
    update_post_meta($post_id, 'artform', sanitize_text_field($_POST['artform']) );
  }

  if ( isset( $_POST['width'] ) ) {
    update_post_meta($post_id, 'width', sanitize_text_field($_POST['width']) );
  }

  if ( isset( $_POST['height'] ) ) {
    update_post_meta($post_id, 'height', sanitize_text_field($_POST['height']) );
  }

  if ( isset( $_POST['depth'] ) ) {
    update_post_meta($post_id, 'depth', sanitize_text_field($_POST['depth']) );
  }

  if ( isset( $_POST['artEdition'] ) ) {
    update_post_meta($post_id, 'artEdition', sanitize_text_field($_POST['artEdition']) );
  }

  if ( isset( $_POST['headline'] ) ) {
    update_post_meta($post_id, 'headline', sanitize_text_field($_POST['headline']) );
  }

  if ( isset( $_POST['about'] ) ) {
    update_post_meta($post_id, 'about', sanitize_text_field($_POST['about']) );
  }

  if ( isset( $_POST['text'] ) ) {
    update_post_meta($post_id, 'text', sanitize_text_field($_POST['text']) );
  }

  if ( isset( $_POST['creator'] ) ) {
    update_post_meta($post_id, 'creator', sanitize_text_field($_POST['creator']) );
  }

  if ( isset( $_POST['contributor'] ) ) {
    update_post_meta($post_id, 'contributor', sanitize_text_field($_POST['contributor']) );
  }

  if ( isset( $_POST['dateCreated'] ) ) {
    update_post_meta($post_id, 'dateCreated', sanitize_text_field($_POST['dateCreated']) );
  }

  if ( isset( $_POST['copyrightHolder'] ) ) {
    update_post_meta($post_id, 'copyrightHolder', sanitize_text_field($_POST['copyrightHolder']) );
  }

  if ( isset( $_POST['copyrightYear'] ) ) {
    update_post_meta($post_id, 'copyrightYear', sanitize_text_field($_POST['copyrightYear']) );
  }

  if ( isset( $_POST['contentLocation'] ) ) {
    update_post_meta($post_id, 'contentLocation', sanitize_text_field($_POST['contentLocation']) );
  }

  if ( isset( $_POST['locationCreated'] ) ) {
    update_post_meta($post_id, 'locationCreated', sanitize_text_field($_POST['locationCreated']) );
  }

  if ( isset( $_POST['genre'] ) ) {
    update_post_meta($post_id, 'genre', sanitize_text_field($_POST['genre']) );
  }

  if ( isset( $_POST['keywords'] ) ) {
    update_post_meta($post_id, 'keywords', sanitize_text_field($_POST['keywords']) );
  }

  if ( isset( $_POST['name'] ) ) {
    update_post_meta($post_id, 'name', sanitize_text_field($_POST['name']) );
  }

  if ( isset( $_POST['url'] ) ) {
    update_post_meta($post_id, 'url', sanitize_text_field($_POST['url']) );
  }

  if ( isset( $_POST['description'] ) ) {
    update_post_meta($post_id, 'description', sanitize_text_field($_POST['description']) );
  }

  if ( isset( $_POST['series'] ) ) {
    update_post_meta($post_id, 'series', sanitize_text_field($_POST['series']) );
  }


}

add_action( 'save_post', 'artism_description_meta_save');

<?php get_header(); ?>

<?php
  $artwork_meta = get_post_meta($post->ID);
  $artwork_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
  $artwork_width = $artwork_data[1];
?>

<section class="artwork" itemscope itemtype="http://schema.org/VisualArtwork">

    <div class="artwork-header">
      <a href="http://bernardbolter.com"><span></span> Back to bernardbolter.com</a>
      <p><?php the_permalink() ?></p>
    </div>

    <div class="artwork-container"
      <?php if ($artwork_width) :
        echo 'style="max-width:' . $artwork_width . 'px"';
        endif;
      ?>
    >
      <div class="artwork-title">
        <h1 itemprop="name"><?php the_title() ?></h1>
        <h2>
        <?php
          if ($artwork_meta['width'][0]) :
            echo $artwork_meta['width'][0];
          endif;
          if ($artwork_meta['height'][0]) :
            echo ' x ' . $artwork_meta['height'][0];
          endif;
          if ($artwork_meta['artform'][0]) :
            echo ' | ' . $artwork_meta['artform'][0];
          endif;
          if ($artwork_meta['copyrightYear'][0]) :
            echo ' | ' . $artwork_meta['copyrightYear'][0];
          endif;
          if ($artwork_meta['artEdition'][0]) :
            echo ' | ' . $artwork_meta['artEdition'][0];
          endif;
        ?>
        </h2>
      </div> <!-- .artwork-title-->
      <?php the_post_thumbnail('full', array('itemprop' => 'image')); ?>
      <div class="artwork-info-container">
        <div class="artwork-info">
          <h5>TITLE</h5>
          <h3 itemprop="name"><?php the_title() ?></h3>
          <?php
            if ($artwork_meta['artMedium'][0]) :
              echo '<h5>MEDIUM</h5>';
              echo '<h3 itemprop="artMedium">' . $artwork_meta['artMedium'][0] . '</h3>';
            endif;
            if ($artwork_meta['artSurface'][0]) :
              echo '<h5>ON</h5>';
              echo '<h3 itemprop="artSurface">' . $artwork_meta['artSurface'][0] . '</h3>';
            endif;
            if ($artwork_meta['artform'][0]) :
              echo '<h5>STYLE</h5>';
              echo '<h3 itemprop="artform">' . $artwork_meta['artform'][0] . '</h3>';
            endif;
            if ($artwork_meta['width'][0]) :
              echo '<h5>WIDTH</h5>';
              echo '<h3 itemprop="width" itemscope itemtype="http://schema.org/Distance">' . $artwork_meta['width'][0] . '</h3>';
            endif;
            if ($artwork_meta['height'][0]) :
              echo '<h5>HEIGHT</h5>';
              echo '<h3 itemprop="height" itemscope itemtype="http://schema.org/Distance">' . $artwork_meta['height'][0] . '</h3>';
            endif;
            if ($artwork_meta['depth'][0]) :
              echo '<h5>DEPTH</h5>';
              echo '<h3 itemprop="depth">' . $artwork_meta['depth'][0] . '</h3>';
            endif;
            if ($artwork_meta['artEdition'][0]) :
              echo '<h5>EDITION</h5>';
              echo '<h3 itemprop="artEdition">' . $artwork_meta['artEdition'][0] . '</h3>';
            endif;
            if ($artwork_meta['dateCreated'][0]) :
              echo '<h5>YEAR CREATED</h5>';
              echo '<h3 itemprop="dateCreated">' . $artwork_meta['dateCreated'][0] . '</h3>';
            endif;
            if ($artwork_meta['creator'][0]) :
              echo '<h5>CREATOR</h5>';
              echo '<h3 itemprop="creator" itemscope itemtype="http://schema.org/Person"><a itemprop="sameAs" href="http://www.bernardbolter.com" /><span itemprop="name">' . $artwork_meta['creator'][0] . '</span></a></h3>';
            endif;
            if ($artwork_meta['contributor'][0]) :
              echo '<h5>CONTRIBUTOR</h5>';
              echo '<h3 itemprop="contributor">' . $artwork_meta['contributor'][0] . '</h3>';
            endif;
            if ($artwork_meta['contentLocation'][0]) :
              echo '<h5>CONTENT LOCATION</h5>';
              echo '<h3 itemprop="contentLocation">' . $artwork_meta['contentLocation'][0] . '</h3>';
            endif;
            if ($artwork_meta['locationCreated'][0]) :
              echo '<h5>LOCATION CREATED</h5>';
              echo '<h3 itemprop="locationCreated">' . $artwork_meta['locationCreated'][0] . '</h3>';
            endif;
            if ($artwork_meta['headline'][0]) :
              echo '<h5>HEADLINE</h5>';
              echo '<h3 itemprop="headline">' . $artwork_meta['headline'][0] . '</h3>';
            endif;
            if ($artwork_meta['about'][0]) :
              echo '<h5>ABOUT</h5>';
              echo '<h4 itemprop="about">' . $artwork_meta['about'][0] . '</h4>';
            endif;
            if ($artwork_meta['description'][0]) :
              echo '<h5>DESCRIPTION</h5>';
              echo '<h4 itemprop="description">' . $artwork_meta['description'][0] . '</h4>';
            endif;
            if ($artwork_meta['genre'][0]) :
              echo '<h5>GENRE</h5>';
              echo '<h4 itemprop="genre">' . $artwork_meta['genre'][0] . '</h4>';
            endif;
            if ($artwork_meta['keywords'][0]) :
              echo '<h5>KEYWORDS</h5>';
              echo '<h4 itemprop="keywords">' . $artwork_meta['keywords'][0] . '</h4>';
            endif;
            echo '<hr />';
            if ($artwork_meta['series'][0]) :
              switch ($artwork_meta['series'][0]) {
                case 'dcs':
                  echo '<h5>SERIES</h5>';
                  echo '<h3>Digital City Series</h3>';
                  break;
                default:
                  echo '';
              }
            endif;
            if ($artwork_meta['printAvailable'][0]) :
              echo '<h5>AVAILABLE PRINT</h5>';
              echo '<h4>' . $artwork_meta['printAvailable'][0] . '</h4>';
            endif;
            if ($artwork_meta['printPrice'][0]) :
              echo '<h5>PRINT PRICE</h5>';
              echo '<h4>' . $artwork_meta['printPrice'][0] . '</h4>';
            endif;
            if ($artwork_meta['printURL'][0]) :
              echo '<h5>LINK TO PURCHASE</h5>';
              echo '<h4><a href="http://' . $artwork_meta['printURL'][0] . '">Click here to purchase</a></h4>';
            endif;
            echo '<h5>CONTACT</h5>';
            echo '<h3>b@bernardbolter.com</h3>';
           ?>
        </div><!-- .artwork-info -->
        <div class="artwork-images">
          <?php
            if ($artwork_meta['complementaryImageMedium'][0]) :
              echo '<img src="' . $artwork_meta['complementaryImageMedium'][0] . '" />';
            endif;
            if ($artwork_meta['complementaryArtworkTitle'][0]) :
              echo '<h3>' . $artwork_meta['complementaryArtworkTitle'][0] . '</h3>';
            endif;
            if ($artwork_meta['complementaryArtMedium'][0]) :
              echo '<h4>' . $artwork_meta['complementaryArtMedium'][0];
            endif;
            if ($artwork_meta['complementaryArtworkYear'][0]) :
              echo ' | ' . $artwork_meta['complementaryArtworkYear'][0] . '</h4>';
            else :
              echo '</h4>';
            endif;
            if ($artwork_meta['complementaryArtworkLink'][0]) :
              echo '<a href="' . $artwork_meta['complementaryArtworkLink'][0] . '">' . $artwork_meta['complementaryArtworkLink'][0] . '</a>';
            endif;
            if ($artwork_meta['secondComplementaryImageMedium'][0]) :
              echo '<img src="' . $artwork_meta['secondComplementaryImageMedium'][0] . '" />';
            endif;
            if ($artwork_meta['secondComplementaryArtworkTitle'][0]) :
              echo '<h3>' . $artwork_meta['secondComplementaryArtworkTitle'][0] . '</h3>';
            endif;
            if ($artwork_meta['secondComplementaryArtMedium'][0]) :
              echo '<h4>' . $artwork_meta['secondComplementaryArtMedium'][0];
            endif;
            if ($artwork_meta['secondComplementaryArtworkYear'][0]) :
              echo ' | ' . $artwork_meta['secondComplementaryArtworkYear'][0] . '</h4>';
            else :
              echo '</h4>';
            endif;
            if ($artwork_meta['secondComplementaryArtworkLink'][0]) :
              echo '<a href="' . $artwork_meta['secondComplementaryArtworkLink'][0] . '">' . $artwork_meta['secondComplementaryArtworkLink'][0] . '</a>';
            endif;
          ?>
        </div><!-- .artwork-images -->
      </div><!-- .artwork-info-container -->
    </div><!-- .artwork-container -->
</section><!-- .artwork -->

<?php get_footer() ?>

<?php
/*
 * 404 template, just like front page index
 */
?>

<?php get_header(); ?>

<section class="artism-front-page">
  <a href="http://bernardbolter.com">
    <h1>Bernard John Bolter IV</h1>
    <h3>artwork</h3>
  </a>
  <?php $artwork_loop = new WP_Query( array( 'post_type' => 'artwork', 'orderby' => 'rand', 'posts_per_page' => -1 ) ); ?>
  <?php if ( $artwork_loop->have_posts() ) :
       while ( $artwork_loop->have_posts() ) : $artwork_loop->the_post(); ?>
        <a href="<?php the_permalink() ?>">
          <?php the_post_thumbnail('thumbnail'); ?>
          <span>
            <h2><?php the_title() ?></h2>
          </span>
        </a>

  <?php endwhile; endif; wp_reset_postdata(); ?>
</section>

<?php get_footer() ?>

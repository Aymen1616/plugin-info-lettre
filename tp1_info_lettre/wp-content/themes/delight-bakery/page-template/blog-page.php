<?php
/**
 * Template Name: Blog Page Template
 */
?>

<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-12">
          <div class="row">
            <?php if ( have_posts() ) : ?>
                  <?php $theme_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $args = array(
                   'paged' => $theme_paged
                );
              $custom_query = new WP_Query( $args );
              while($custom_query->have_posts()) :
                 $custom_query->the_post();
                 get_template_part( 'template-parts/content' );
              endwhile; // end of the loop.
              wp_reset_postdata(); ?>
            <?php else : ?>
              <h2><?php _e('Not Found','delight-bakery'); ?></h2>
            <?php endif; ?>
          </div>
    </div>
    <div class="col-lg-4 col-md-4 col-12">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>


<?php
get_footer(); 
?>

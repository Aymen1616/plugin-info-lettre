<?php
/**
 * Home Section 1 Template
 *
 * @package Delight Bakery
 */

$delight_bakery_section_one = get_theme_mod('delight_bakery_section1_enable');
if ('Disable' == $delight_bakery_section_one) {
  return;
}
?>

<section id="section1" class="featured-posts">
  <div class="container-fluid">
    <div class="section-heading-main">
      <?php if (get_theme_mod('delight_bakery_section1_title', true) != '') { ?>
        <h3><?php echo esc_html(get_theme_mod('delight_bakery_section1_title')); ?></h3>
      <?php } ?>
    </div>
    <div class="row">
      <?php
        $args = array(
          'category_name' => get_theme_mod('delight_bakery_section1_category'),
          'posts_per_page' => get_theme_mod('delight_bakery_section1_category_number_of_posts_setting'),
          'order' => 'DESC'
        );
        $query = new WP_Query($args);
        while ($query->have_posts()) : $query->the_post();
      ?>
      <div class="col-lg-6 col-md-4 col-sm-12">
        <div class="main-post-bx">
          <div class="row">
          <div class="col-lg-6 col-12">
            <?php if (has_post_thumbnail()) : ?>
              <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail(); ?>
                </a>
              </div>
            <?php endif; ?>
          </div>
          <div class="col-lg-6 col-12">
            <div class="post-box-section">
              <?php if (get_theme_mod('delight_bakery_post_meta_toggle_switch_control', true)) : ?>
                <div class="sec2-meta">
                  <span><?php echo get_the_date(); ?></span>
                  <span><?php echo get_the_author(); ?></span>
                </div>
              <?php endif; ?>
              <h2 class="post-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
              <div class="latest-content">
                <?php the_excerpt(); ?>
              </div>
              <?php if (get_theme_mod('delight_bakery_post_readmore_toggle_switch_control', true)) : ?>
                <div class="readmore-latest"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'delight-bakery'); ?></a></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        </div>
        
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>

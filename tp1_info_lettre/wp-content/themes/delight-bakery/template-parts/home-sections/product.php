<?php
/**
 * Home Section Product Template
 *
 * @package Delight Bakery
 */

// All section-specific code goes here...

$delight_bakery_section_one = get_theme_mod('delight_bakery_product_enable');
if ('Disable' == $delight_bakery_section_one) {
    return;
}
?>


<section id="products">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="heading-section">
            <?php if(get_theme_mod('delight_bakery_product_title',true) != ''){?>
              <h3><?php echo esc_html(get_theme_mod('delight_bakery_product_title')); ?></h3>
            <?php }?>
            
          </div>
        </div>
        <div class="row pro-bx">
          <?php
            $args = array( 
            'post_type' => 'product', 
            'posts_per_page' => -1,
            'order' => 'ASC'
            );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="new-arrival-content">
                <div class="row new-arrival-title">
                  <div class="col-lg-12 col-md-12">
                    <span class="product-sale-tag">
                      <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                    </span> 
                    <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?> 
                  </div>
                  <div class="col-lg-12 col-md-12">
                    <div class="product-content">
                      <h4 class="product-title">
                      <a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?>
                      </a>
                    </h4>
                    <div class="product-rating"> 
                      <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
                    </div>
                    <div class="price-box">
                      <?php echo $product->get_price_html(); ?>
                    </div>
                    
                    <div class="add-btn">
                      <span class="arrival-cart"><?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_add_to_cart( $loop->post, $product ); } ?></span>
                    </div>
                    </div>
                    
                    
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
</section>
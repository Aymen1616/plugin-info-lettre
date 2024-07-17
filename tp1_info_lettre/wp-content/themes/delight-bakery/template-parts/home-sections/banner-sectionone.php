<?php
/**
 * Theme banner section
 *
 * @package Delight Bakery
 */

// All Function code and function definitions go here...


$delight_bakery_section_one = get_theme_mod('delight_bakery_section_banner');
if ('Disable' == $delight_bakery_section_one) {
    return;
}
?>

<section id="banner-section-first">
        <div class="main-banner-main">
            <?php if(get_theme_mod('delight_bakery_section_bannerimage_section')!=''){ ?>
                    <img src="<?php echo esc_url(get_theme_mod('delight_bakery_section_bannerimage_section')); ?>" alt="Image">
                <div class="text-box">
                    <p><?php echo esc_html(get_theme_mod('delight_bakery_section_bannerimage_section_text')); ?></p>
                    <h2><?php echo esc_html(get_theme_mod('delight_bakery_section_bannerimage_section_title')); ?></h2>
                    <?php if(get_theme_mod('delight_bakery_banner_btn_text')!=''){ ?>
                            <div class="theme-btn">
                              <a href="<?php echo esc_html(get_theme_mod('delight_bakery_banner_btn_text_url')); ?>"><?php echo esc_html(get_theme_mod('delight_bakery_banner_btn_text')); ?></a>
                            </div>
                      <?php } ?>
                </div>
            <?php } ?>
        </div>
</section>

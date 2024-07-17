<?php
/**
 * Theme About section
 *
 * @package Delight Bakery
 */

// All Function code and function definitions go here...


$delight_bakery_section_one = get_theme_mod('delight_bakery_section_about_enable');
if ('Disable' == $delight_bakery_section_one) {
    return;
}
?>

<section id="about">
        <div class="about-main">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="inner-box">
                        <div class="row">
                            <div class="col-lg-7 col-7">
                                <div class="img-class-abt img-abt">
                                    <img src="<?php echo esc_url(get_theme_mod('delight_bakery_section_abouimage1_section')); ?>" alt="Image">
                                </div>
                            </div>
                            <div class="col-lg-5 col-5">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="img-class-abt">
                                            <img src="<?php echo esc_url(get_theme_mod('delight_bakery_section_abouimage2_section')); ?>" alt="Image">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="img-class-abt">
                                            <img src="<?php echo esc_url(get_theme_mod('delight_bakery_section_abouimage3_section')); ?>" alt="Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="abt-content">
                        <h2><?php echo esc_html(get_theme_mod('delight_bakery_section_abt_section_title')); ?></h2>
                        <p><?php echo esc_html(get_theme_mod('delight_bakery_section_abt_section_text1')); ?></p>
                        <p><?php echo esc_html(get_theme_mod('delight_bakery_section_abt_section_text2')); ?></p>
                        <?php if(get_theme_mod('delight_bakery_abt_btn_text')!=''){ ?>
                            <div class="theme-btn">
                              <a href="<?php echo esc_html(get_theme_mod('delight_bakery_abt_btn_text_url')); ?>"><?php echo esc_html(get_theme_mod('delight_bakery_abt_btn_text')); ?></a>
                            </div>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
</section>

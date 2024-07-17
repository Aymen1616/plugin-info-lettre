<?php

// about theme info
add_action( 'admin_menu', 'delight_bakery_gettingstarted_page' );
function delight_bakery_gettingstarted_page() {      
    add_theme_page( esc_html__('Delight Bakery', 'delight-bakery'), esc_html__('All About Delight Bakery', 'delight-bakery'), 'edit_theme_options', 'delight_bakery_mainpage', 'delight_bakery_main_content_admin');   
}

function delight_bakery_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
        <div class="notice-content">
            <p><?php esc_html_e('Thanks For Choosing CA WP Themes', 'delight-bakery'); ?></p>
            <h2><?php esc_html_e('Thanks for installing Delight Bakery Free Theme!', 'delight-bakery'); ?></h2>
            <p><?php esc_html_e('Please Click on the link below to Check The Full Theme Edit Documentation', 'delight-bakery'); ?></p>
            <div class="info-link">
                <a href="<?php echo esc_url( DELIGHT_BAKERY_PRO_DOCUMENTATION ); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Documentation', 'delight-bakery'); ?></a>
            </div>
            <h2><?php esc_html_e('Now the Premium Version is only at $39.99 with Lifetime Access!Grab the deal now!', 'delight-bakery'); ?></h2>
            <h2><?php esc_html_e('Check The Pro Version: Delight Bakery Premium WordPress Theme for Amazing Features for Unlimited Site', 'delight-bakery'); ?></h2>
            <div class="info-link">
                <a href="<?php echo esc_url( DELIGHT_BAKERY_PRO_URL ); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Upgrade to Pro', 'delight-bakery'); ?></a>
            </div>
            <div class="info-link">
                <a href="<?php echo esc_url( DELIGHT_BAKERY_PRO_DEMO ); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Premium Demo', 'delight-bakery'); ?></a>
            </div>

        </div>
    </div>
    <?php }
}
add_action('admin_notices', 'delight_bakery_notice');


// About Theme Info
function delight_bakery_main_content_admin() { 

    // Custom function about theme customizer

    $return = add_query_arg( array()) ;
    $theme = wp_get_theme( 'delight-bakery' );
?>

<div class="wrapper-info">
    <div class="col-left">
        <h2><?php esc_html_e('Welcome to Delight Bakery Theme', 'delight-bakery'); ?> <span class="version">Version: 1.0</span></h2>
        <p><?php esc_html_e('CA WP Themes is a premium WordPress theme development company that provides high-quality themes for various types of websites. They specialize in creating themes for businesses, eCommerce, portfolios, blogs, and many more. Their themes are easy to use and customize, making them perfect for those who want to create a professional-looking website without any coding skills.', 'delight-bakery'); ?></p>
        <p><?php esc_html_e('CA WP Themes offers a wide range of themes that are designed to be responsive and compatible with the latest versions of WordPress. Our themes are also SEO optimized, ensuring that your website will rank well on search engines. They come with a variety of features such as customizable widgets, social media integration, and custom page templates.', 'delight-bakery'); ?></p>
        <p><?php esc_html_e('One of the unique things about CA WP Themes is their focus on providing excellent customer support. They have a dedicated team of support staff who are available 24/7 to help customers with any issues they may encounter. Their support team is knowledgeable and friendly, ensuring that customers receive the best possible experience.', 'delight-bakery'); ?></p>
    </div>
    <div class="col-right">
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Buy Delight Bakery Premium Theme', 'delight-bakery'); ?></h4>
            <p><?php esc_html_e('Now the Premium Version is only at $39.99 with Lifetime Access!Grab the deal now!', 'delight-bakery'); ?></p>
            <div class="info-link">
                <a href="<?php echo esc_url( DELIGHT_BAKERY_PRO_URL ); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Upgrade to Pro', 'delight-bakery'); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Premium Theme Demo', 'delight-bakery'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( DELIGHT_BAKERY_PRO_DEMO ); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Demo', 'delight-bakery'); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Need Support? / Contact Us', 'delight-bakery'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( DELIGHT_BAKERY_PRO_SUPPORT ); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Contact Us', 'delight-bakery'); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Documentation', 'delight-bakery'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( DELIGHT_BAKERY_PRO_DOCUMENTATION ); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Docs', 'delight-bakery'); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Free Theme', 'delight-bakery'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( DELIGHT_BAKERY_FREE_URL ); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Demo', 'delight-bakery'); ?></a>
            </div>
        </div>

    </div>
</div>

<?php } ?>
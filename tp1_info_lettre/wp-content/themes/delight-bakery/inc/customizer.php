<?php
/**
 * Add custom settings and controls to the WordPress Customizer
 */


//--------------------- Code to add the Upgrade to Pro button in the Customizer ----------

function delight_bakery_customize_register_btn( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    include get_template_directory() . '/inc/customizer-button/upsell-section.php';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'delight_bakery_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'delight_bakery_customize_partial_blogdescription',
        ) );
    }

    $wp_customize->register_section_type( 'Delight_Bakery_Customize_Upsell_Section' );

    // Register section.
    $wp_customize->add_section(
        new Delight_Bakery_Customize_Upsell_Section(
            $wp_customize,
            'theme_upsell',
            array(
                'title'    => esc_html__( 'Delight Bakery Pro', 'delight-bakery' ),
                'pro_text' => esc_html__( 'Upgrade To Pro', 'delight-bakery' ),
                'pro_url'  => 'https://cawpthemes.com/delight-bakery-premium-wordpress-theme/',
                'priority' => 1,
            )
        )
    );
}
add_action( 'customize_register', 'delight_bakery_customize_register_btn' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function delight_bakery_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function delight_bakery_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function delight_bakery_customize_preview_js() {
    wp_enqueue_script( 'delight-bakery-customizer', get_template_directory_uri() . '/inc/customizer-button/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'delight_bakery_customize_preview_js' );

/**
 * Customizer control scripts and styles.
 *
 * @since 1.0.0
 */
function delight_bakery_customizer_control_scripts() {

    wp_enqueue_style( 'delight-bakery-customize-controls', get_template_directory_uri() . '/inc/customizer-button/customize-controls.css', '', '1.0.0' );

    wp_enqueue_script( 'delight-bakery-customize-controls', get_template_directory_uri() . '/inc/customizer-button/customize-controls.js', array( 'customize-controls' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'delight_bakery_customizer_control_scripts', 0 );


//---------------------Code to add the Upgrade to Pro button in the Customizer End----------


//------------------Theme Information--------------------

function delight_bakery_customize_register( $wp_customize ) {



      // Add a custom setting for the Site Identity color
  $wp_customize->add_setting( 'delight_bakery_site_identity_color', array(
    'default' => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'delight_bakery_site_identity_color', array(
    'label' => __( 'Site Identity Color', 'delight-bakery' ),
    'section' => 'title_tagline',
    'settings' => 'delight_bakery_site_identity_color',
  ) ) );


  // Add a custom setting for the Site Identity color
  $wp_customize->add_setting( 'delight_bakery_site_identity_tagline_color', array(
    'default' => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'delight_bakery_site_identity_tagline_color', array(
    'label' => __( 'Tagline Color', 'delight-bakery' ),
    'section' => 'title_tagline',
    'settings' => 'delight_bakery_site_identity_tagline_color',
  ) ) );

//------------------Site Identity Ends---------------------

  
  // Add a custom setting for the primary color
  $wp_customize->add_setting( 'delight_bakery_primary_color', array(
    'default' => '#f74385',
    'sanitize_callback' => 'sanitize_hex_color',
  ) );

  // Add a custom control for the primary color
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'delight_bakery_primary_color', array(
    'label' => __( 'Primary Color', 'delight-bakery' ),
    'section' => 'colors',
    'settings' => 'delight_bakery_primary_color',
  ) ) );

  //-----------------------------------Home Front Page-------------------------------

  $wp_customize->add_panel( 'delight_bakery_panel', array(
    'title'    => __( 'Front Page Settings', 'delight-bakery' ),
    'priority' => 6,
  ) );


  //-------------------------------------Banner Image Section--------------

      $wp_customize->add_section( 'delight_bakery_section_banner', array(
        'title'    => __( 'Home First Section', 'delight-bakery' ),
        'priority' => 8,
        'panel'    => 'delight_bakery_panel',
    ) );


  //-----------------Enable Option banner-------------

  $wp_customize->add_setting('delight_bakery_section_banner',array(
      'default' => 'Enable',
      'sanitize_callback' => 'delight_bakery_sanitize_choices'
  ));
  $wp_customize->add_control('delight_bakery_section_banner',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'delight-bakery'),
        'section' => 'delight_bakery_section_banner',
        'choices' => array(
            'Enable' => __('Enable', 'delight-bakery'),
            'Disable' => __('Disable', 'delight-bakery')
  )));



  $wp_customize->add_setting('delight_bakery_section_bannerimage_section',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'delight_bakery_section_bannerimage_section',array(
    'label' => __('Banner Image','delight-bakery'),
    'description' => __('Dimention 500 * 500','delight-bakery'),
    'section' => 'delight_bakery_section_banner',
    'settings' => 'delight_bakery_section_bannerimage_section'
  )));



    $wp_customize->add_setting('delight_bakery_section_bannerimage_section_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('delight_bakery_section_bannerimage_section_title',array(
      'label' => __('Section Title','delight-bakery'),
      'section' => 'delight_bakery_section_banner',
      'setting' => 'delight_bakery_section_bannerimage_section_title',
      'type'    => 'text'
    )
  ); 

      $wp_customize->add_setting('delight_bakery_section_bannerimage_section_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('delight_bakery_section_bannerimage_section_text',array(
      'label' => __('Section Text','delight-bakery'),
      'section' => 'delight_bakery_section_banner',
      'setting' => 'delight_bakery_section_bannerimage_section_text',
      'type'    => 'text'
    )
  );

    $wp_customize->add_setting('delight_bakery_banner_btn_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('delight_bakery_banner_btn_text',array(
      'label' => __('Button Text','delight-bakery'),
      'section' => 'delight_bakery_section_banner',
      'setting' => 'delight_bakery_banner_btn_text',
      'type'    => 'text'
    )
  );


    $wp_customize->add_setting('delight_bakery_banner_btn_text_url',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('delight_bakery_banner_btn_text_url',array(
      'label' => __('Button URL','delight-bakery'),
      'section' => 'delight_bakery_section_banner',
      'setting' => 'delight_bakery_banner_btn_text_url',
      'type'    => 'text'
    )
  );


  //----------------------------About Section--------------

      $wp_customize->add_section( 'delight_bakery_section_about', array(
        'title'    => __( 'About Section', 'delight-bakery' ),
        'priority' => 8,
        'panel'    => 'delight_bakery_panel',
    ) );


  //-----------------Enable Option banner-------------

  $wp_customize->add_setting('delight_bakery_section_about_enable',array(
      'default' => 'Enable',
      'sanitize_callback' => 'delight_bakery_sanitize_choices'
  ));
  $wp_customize->add_control('delight_bakery_section_about_enable',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'delight-bakery'),
        'section' => 'delight_bakery_section_about',
        'choices' => array(
            'Enable' => __('Enable', 'delight-bakery'),
            'Disable' => __('Disable', 'delight-bakery')
  )));

  $wp_customize->add_setting('delight_bakery_section_abouimage1_section',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'delight_bakery_section_abouimage1_section',array(
    'label' => __('Banner Image','delight-bakery'),
    'description' => __('Dimention 500 * 500','delight-bakery'),
    'section' => 'delight_bakery_section_about',
    'settings' => 'delight_bakery_section_abouimage1_section'
  )));

  $wp_customize->add_setting('delight_bakery_section_abouimage2_section',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'delight_bakery_section_abouimage2_section',array(
    'label' => __('Banner Image','delight-bakery'),
    'description' => __('Dimention 500 * 500','delight-bakery'),
    'section' => 'delight_bakery_section_about',
    'settings' => 'delight_bakery_section_abouimage2_section'
  )));

  $wp_customize->add_setting('delight_bakery_section_abouimage3_section',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'delight_bakery_section_abouimage3_section',array(
    'label' => __('Banner Image','delight-bakery'),
    'description' => __('Dimention 500 * 500','delight-bakery'),
    'section' => 'delight_bakery_section_about',
    'settings' => 'delight_bakery_section_abouimage3_section'
  )));

    $wp_customize->add_setting('delight_bakery_section_abt_section_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('delight_bakery_section_abt_section_title',array(
      'label' => __('Section Title','delight-bakery'),
      'section' => 'delight_bakery_section_about',
      'setting' => 'delight_bakery_section_abt_section_title',
      'type'    => 'text'
    )
  );

      $wp_customize->add_setting('delight_bakery_section_abt_section_text1',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('delight_bakery_section_abt_section_text1',array(
      'label' => __('Section Text','delight-bakery'),
      'section' => 'delight_bakery_section_about',
      'setting' => 'delight_bakery_section_abt_section_text1',
      'type'    => 'text'
    )
  ); 

      $wp_customize->add_setting('delight_bakery_section_abt_section_text2',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('delight_bakery_section_abt_section_text2',array(
      'label' => __('Section Text','delight-bakery'),
      'section' => 'delight_bakery_section_about',
      'setting' => 'delight_bakery_section_abt_section_text2',
      'type'    => 'text'
    )
  );

    $wp_customize->add_setting('delight_bakery_abt_btn_text',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('delight_bakery_abt_btn_text',array(
      'label' => __('Button Text','delight-bakery'),
      'section' => 'delight_bakery_section_about',
      'setting' => 'delight_bakery_abt_btn_text',
      'type'    => 'text'
    )
  );


    $wp_customize->add_setting('delight_bakery_abt_btn_text_url',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('delight_bakery_abt_btn_text_url',array(
      'label' => __('Button URL','delight-bakery'),
      'section' => 'delight_bakery_section_about',
      'setting' => 'delight_bakery_abt_btn_text_url',
      'type'    => 'text'
    )
  );


  //----------------------------------Product Section----------------------------



    $wp_customize->add_section( 'delight_bakery_product', array(
        'title'    => __( 'Product Section', 'delight-bakery' ),
        'priority' => 10,
        'panel'    => 'delight_bakery_panel',
    ) );

  //-----------------Enable Option Section Features-------------

  $wp_customize->add_setting('delight_bakery_product_enable',array(
      'default' => 'Enable',
      'sanitize_callback' => 'delight_bakery_sanitize_choices'
  ));
  $wp_customize->add_control('delight_bakery_product_enable',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'delight-bakery'),
        'section' => 'delight_bakery_product',
        'choices' => array(
            'Enable' => __('Enable', 'delight-bakery'),
            'Disable' => __('Disable', 'delight-bakery')
  )));


    $wp_customize->add_setting('delight_bakery_product_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('delight_bakery_product_title',array(
      'label' => __('Product Section Title','delight-bakery'),
      'section' => 'delight_bakery_product',
      'setting' => 'delight_bakery_product_title',
      'type'    => 'text'
    )
  );



  //-----------------------------------------------------------------Section One (Featured Post)------------------------------------------

  $wp_customize->add_section( 'delight_bakery_section1', array(
        'title'    => __( 'Latest Post', 'delight-bakery' ),
        'priority' => 10,
        'panel'    => 'delight_bakery_panel',
    ) );


  //-----------------Enable Option Section One-------------

  $wp_customize->add_setting('delight_bakery_section1_enable',array(
      'default' => 'Enable',
      'sanitize_callback' => 'delight_bakery_sanitize_choices'
  ));
  $wp_customize->add_control('delight_bakery_section1_enable',array(
        'type' => 'radio',
        'label' => __('Do you want this section', 'delight-bakery'),
        'section' => 'delight_bakery_section1',
        'choices' => array(
            'Enable' => __('Enable', 'delight-bakery'),
            'Disable' => __('Disable', 'delight-bakery')
  )));

    //--------------Section One Title-----------------------

    $wp_customize->add_setting('delight_bakery_section1_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('delight_bakery_section1_title',array(
      'label' => __('Section Title','delight-bakery'),
      'section' => 'delight_bakery_section1',
      'setting' => 'delight_bakery_section1_title',
      'type'    => 'text'
    )
  ); 

  //-----------Category------------

  $categories = get_categories();
  $cats = array();
  $i = 0;
  foreach($categories as $category){
    if($i==0){
      $default = $category->name;
      $i++;
    }
    $cats[$category->name] = $category->name;
  }

  $wp_customize->add_setting('delight_bakery_section1_category',array(
  'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('delight_bakery_section1_category',array(
    'type'    => 'select',
    'choices' => $cats,
    'label' => __('Select Category to Display Post','delight-bakery'),
    'section' => 'delight_bakery_section1',
    'sanitize_callback' => 'sanitize_text_field',
  ));



    $wp_customize->add_setting('delight_bakery_section1_category_number_of_posts_setting',array(
    'default' => '6',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('delight_bakery_section1_category_number_of_posts_setting',array(
    'label' => __('Number of Posts','delight-bakery'),
    'section' => 'delight_bakery_section1',
    'setting' => 'delight_bakery_section1_category_number_of_posts_setting',
    'type'    => 'number'
  ));


  //------------------------Blog Page Settings--------------------------


  $wp_customize->add_section( 'delight_bakery_blogpage_settings', array(
        'title'    => __( 'Blog Page Settings', 'delight-bakery' ),
        'priority' => 10,
        'panel'    => 'delight_bakery_panel',
    ) );

    //--------------Section One Title-----------------------

    $wp_customize->add_setting('delight_bakery_blogpage_title',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control('delight_bakery_blogpage_title',array(
      'label' => __('Blog Page Title','delight-bakery'),
      'section' => 'delight_bakery_blogpage_settings',
      'setting' => 'delight_bakery_blogpage_title',
      'type'    => 'text'
    )
  ); 

  //-----------Category------------

  $categories = get_categories();
  $cats = array();
  $i = 0;
  foreach($categories as $category){
    if($i==0){
      $default = $category->name;
      $i++;
    }
    $cats[$category->name] = $category->name;
  }

  $wp_customize->add_setting('delight_bakery_blogpage_category',array(
  'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('delight_bakery_blogpage_category',array(
    'type'    => 'select',
    'choices' => $cats,
    'label' => __('Select Category to Display Post on Blog Page','delight-bakery'),
    'section' => 'delight_bakery_blogpage_settings',
    'sanitize_callback' => 'sanitize_text_field',
  ));

    $wp_customize->add_setting('delight_bakeryblog_page_category_number_of_posts_setting',array(
    'default' => '18',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('delight_bakeryblog_page_category_number_of_posts_setting',array(
    'label' => __('Number of Posts','delight-bakery'),
    'section' => 'delight_bakery_blogpage_settings',
    'setting' => 'delight_bakeryblog_page_category_number_of_posts_setting',
    'type'    => 'number'
  )); 



  //-------------------------Footer Settings------------------------------


    $wp_customize->add_section( 'delight_bakery_footer', array(
        'title'    => __( 'Footer Settings', 'delight-bakery' ),
        'priority' => 10,
        'panel'    => 'delight_bakery_panel',
    ) );


  // Add a custom setting for the footer text
  $wp_customize->add_setting( 'delight_bakery_footer_text', array(
    'default' => 'Charity Hope WordPress Theme',
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  // Add a custom control for the footer text
  $wp_customize->add_control( 'delight_bakery_footer_text', array(
    'label' => __( 'Footer Text', 'delight-bakery' ),
    'section' => 'delight_bakery_footer',
    'type' => 'text',
  ) );


 //-------------------404 Page-----------

  $wp_customize->add_section( 'delight_bakery_404page', array(
    'title'    => __( '404 Page Settings', 'delight-bakery' ),
    'priority' => 12,
    'panel'    => 'delight_bakery_panel',
    ) );


  // Add a custom setting for the footer text
  $wp_customize->add_setting( 'delight_bakery_404page_title', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  // Add a custom control for the footer text
  $wp_customize->add_control( 'delight_bakery_404page_title', array(
    'label' => __( 'Page Not Found Title', 'delight-bakery' ),
    'section' => 'delight_bakery_404page',
    'type' => 'text',
  ) );

  // Add a custom setting for the footer text
  $wp_customize->add_setting( 'delight_bakery_404page_text', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ) );

  // Add a custom control for the footer text
  $wp_customize->add_control( 'delight_bakery_404page_text', array(
    'label' => __( 'Page Not Found Text', 'delight-bakery' ),
    'section' => 'delight_bakery_404page',
    'type' => 'text',
  ) );

//--------------------------------------General Settings------------------------------------------

  $wp_customize->add_section( 'delight_bakery_general', array(
        'title'    => __( 'General Settings', 'delight-bakery' ),
        'panel'    => 'delight_bakery_panel',
    ) );

    $wp_customize->add_setting( 'delight_bakery_post_meta_toggle_switch_control', array(
        'default'   => true,
        'sanitize_callback' => 'sanitize_text_field', // Use a suitable sanitization function based on your needs
        'transport' => 'refresh', // or 'postMessage' for instant preview without page refresh
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'delight_bakery_post_meta_toggle_switch_control', array(
        'label'    => __( 'Display Time/Author', 'delight-bakery' ),
        'section'  => 'delight_bakery_general',
        'settings' => 'delight_bakery_post_meta_toggle_switch_control',
        'type'     => 'checkbox',
    ) ) );

    $wp_customize->add_setting( 'delight_bakery_post_meta_toggle_switch_control', array(
        'default'   => true,
        'sanitize_callback' => 'sanitize_text_field', // Use a suitable sanitization function based on your needs
        'transport' => 'refresh', // or 'postMessage' for instant preview without page refresh
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'delight_bakery_post_meta_toggle_switch_control', array(
        'label'    => __( 'Display Read More Link', 'delight-bakery' ),
        'section'  => 'delight_bakery_general',
        'settings' => 'delight_bakery_post_meta_toggle_switch_control',
        'type'     => 'checkbox',
    ) ) );


}
add_action( 'customize_register', 'delight_bakery_customize_register' );




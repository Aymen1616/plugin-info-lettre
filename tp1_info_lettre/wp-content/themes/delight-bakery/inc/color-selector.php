<?php


//-----------------------------Site Identity Color----------------

	$delight_bakery_site_identity_color = get_theme_mod('delight_bakery_site_identity_color');
	$delight_bakery_site_identity_tagline_color = get_theme_mod('delight_bakery_site_identity_tagline_color');


// ----------------Primary Color------------

	$delight_bakery_primary_color = get_theme_mod('delight_bakery_primary_color');



//=====================Whole CSS===================================


	$custom_css ='.display_only h1 a,.display_only p{';
	
	$custom_css .='}';





//==============Main Setting Section===========================================


// ----------------Site Identity Color--------------------

	if($delight_bakery_site_identity_color != false){
		$custom_css .='.display_only h1 a{';
			if($delight_bakery_site_identity_color != false)
		    	$custom_css .='color: '.esc_html($delight_bakery_site_identity_color).'!important;';
		$custom_css .='}';
	}

	if($delight_bakery_site_identity_tagline_color != false){
		$custom_css .='.display_only p{';
			if($delight_bakery_site_identity_tagline_color != false)
		    	$custom_css .='color: '.esc_html($delight_bakery_site_identity_tagline_color).'!important;';
		$custom_css .='}';
	}

//----------------------Primary Color---------------

	if($delight_bakery_primary_color != false){
		$custom_css .='h4.product-title a:hover,a.added_to_cart.wc-forward,.readmore-latest a,h4.product-title a:hover,a.added_to_cart.wc-forward,.nav-previous a:hover, .nav-next a:hover,footer a:hover{';
			if($delight_bakery_primary_color != false)
		    	$custom_css .='color: '.esc_html($delight_bakery_primary_color).'!important;';
		$custom_css .='}';
	}

	if($delight_bakery_primary_color != false){
		$custom_css .='.theme-btn a,span.arrival-cart a:hover,span.product-sale-tag,.theme-btn a,span.arrival-cart a:hover,span.product-sale-tag{';
			if($delight_bakery_primary_color != false)
		    	$custom_css .='background-color: '.esc_html($delight_bakery_primary_color).'!important;';
		$custom_css .='}';
	}


?>
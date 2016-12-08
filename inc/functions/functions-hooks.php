<?php
function infowazz_header_script() {

		wp_enqueue_style('infowazz-', get_stylesheet_uri());
		wp_enqueue_script('infowazz-effects', get_template_directory_uri() . '/inc/js/effects.js', array('jquery'), '1.0', true);

		$option = get_option("infowazz_theme_options");

		wp_enqueue_script( 'infowazz_defer', get_template_directory_uri(). '/inc/js/defer.js', array( 'jquery'), '', true );
		wp_enqueue_script( 'infowazz_script', get_template_directory_uri(). '/inc/js/scripts.js', array( 'jquery'), '', true );
		wp_localize_script( 'infowazz_script', 'ajax_posts', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'noposts' => esc_html__('No older posts found', 'infowazz'), ));

		wp_enqueue_script('infowazz_html5shiv', get_template_directory_uri() . '/inc/js/html5shiv.js', array('jquery'), '1.0', true);
		wp_script_add_data( 'infowazz_html5shiv', 'conditional', 'lt IE 9' );
		wp_enqueue_script('infowazz_respondmin', get_template_directory_uri() . '/inc/js/respond.js', array('jquery'), '1.0', true);
		wp_script_add_data( 'infowazz_respondmin', 'conditional', 'lt IE 9' );
    function infowazz_fonts_url() {

      $theme_font = "Lato:400,900,700";

        /*
        Translators: If there are characters in your language that are not supported
        by chosen font(s), translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Google font: on or off', 'infowazz' ) ) {
            $font_url = add_query_arg( 'family', urlencode( ''. esc_attr($theme_font) .'' ), "//fonts.googleapis.com/css" );
        }
        return $font_url;
    }
    wp_enqueue_style( 'infowazz-fonts', infowazz_fonts_url(), array(), '1.0.0' );
}
add_action('wp_enqueue_scripts', 'infowazz_header_script');






function infowazz_admin_script() {
	wp_enqueue_style('infowazz-admin', get_template_directory_uri().'/inc/css/admin.css');
}
add_action('admin_enqueue_scripts', 'infowazz_admin_script');


function infowazz_header_hooks() {

	get_template_part('style');

}

add_action('wp_head', 'infowazz_header_hooks');


add_filter('body_class','infowazz_class');
function infowazz_class($classes) {

	$body_class = "";

	$options = get_option("infowazz_theme_options");

	if(!empty( $options['mt_menu_fix'])){
		if( $options['mt_menu_fix']=="1") {
			$body_class .= 'mt-fixed ';
		}  else {
			$body_class .= ' mt-fixed-no ';
		}
	} else {
		$body_class .= ' mt-fixed-no ';
	}

	if(!empty( $options['menu_fixed'])){
		if($options['menu_fixed']=="mt-fixed-up") {
			$body_class .= ' mt-fixed-up ';
		}  else if($options['menu_fixed']=="mt-fixed-always") {
			$body_class .= ' mt-fixed-always ';
		} else if($options['menu_fixed']=="mt-fixed-disabled") {
			$body_class .= ' mt-fixed-disabled ';
		}
	} else {
		$body_class .= ' mt-fixed-up ';
	}


	$style = get_post_meta(get_the_ID(), "magazin_post_style", true);
	if(!empty($style)){
		$body_class .= ' post-style-'.$style;
		if($style=="8" and is_single()) {
			$body_class .= ' boxed-layout-on';
		}
	} else if (!empty($options['post_style'])) {
		$body_class .= ' post-style-'.$options['post_style'];
		if($options['post_style']=="8" and is_single()) {
			$body_class .= ' boxed-layout-on';
		}
	}

	$layout = get_post_meta(get_the_ID(), "magazin_layout", true);
	if(!empty($layout)){
		$body_class .= ' boxed-layout-on';
	} else if (!empty($options['boxed'])) {
		if ($options['boxed']=="1") {
			$body_class .= ' boxed-layout-on';
		}
	}

	if(!empty($options['menu_random'])) {
		if($options['menu_random']!="1") {
			$body_class .= ' random-off';
		}
	} else {
		$body_class .= ' random-off';
	}

	if(!empty($options['menu_top_ad'])) {
		if($options['menu_top_ad']=="ad") {
			$body_class .= ' menu-ad-on';
		}
	} else {
		$body_class .= ' menu-ad-off';
	}

	if(!empty($options['header_top'])) {
		$body_class .= ' header-top-on';
	} else {
		$body_class .= ' header-top-off';
	}


	$page_space = get_post_meta(get_the_ID(), "magazin_page_padding", true);
	if(!empty($page_space)){
		$body_class .= ' remove-page-padding ';
	}

	$classes[] =  $body_class;
	return $classes;
}

?>

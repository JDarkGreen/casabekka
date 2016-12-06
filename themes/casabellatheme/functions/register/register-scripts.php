<?php  /* Archivo que solo se encargará de cargas los scripts del tema 
	http://www.ey.com/PE/es/Home
*/

function load_custom_scripts()
{

	//cargar tether /
	wp_enqueue_script('tether', THEMEROOT . '/assets/js/vendor/tether.min.js', array('jquery'), '1.1.0', true);

	//cargar bootstrap v
	wp_enqueue_script('bootstrap', THEMEROOT . '/assets/js/vendor/bootstrap.min.js', array('jquery'), '3.3.6', true);	

	//Cargar Owl Carousel
	wp_enqueue_script('wp-owl-carousel-js', THEMEROOT . '/assets/js/vendor/owl.carousel.min.js', array('jquery'), '1.0', true);	

	/*
	 * Cargar Slider Revolution 
	 */

	wp_enqueue_script('revslidertools', THEMEROOT . '/assets/js/vendor/revslider/jquery.themepunch.tools.min.js', array('jquery'), '1.0', true);

	wp_enqueue_script('revsliderlog', THEMEROOT . '/assets/js/vendor/revslider/jquery.themepunch.enablelog.js', array('jquery'), '1.0', true);

	wp_enqueue_script('revslider', THEMEROOT . '/assets/js/vendor/revslider/jquery.themepunch.revolution.min.js', array('jquery'), '5.2.3', true);

	//Cargar Fancybox
	wp_enqueue_script('wp-fancybox-js', THEMEROOT . '/assets/js/vendor/jquery.fancybox.pack.js', array('jquery'), '2.1.5', true);

	//Cargar Validador
	wp_enqueue_script('parsley', THEMEROOT . '/assets/js/vendor/parsley.min.js', array('jquery'), '2.3.11', true);
	wp_enqueue_script('p_idioma_es', THEMEROOT . '/assets/js/vendor/i18n/es.js', '' , false , true);

	// Cargar ScrollReveal
	wp_enqueue_script('wp-scrollreveal-js', THEMEROOT . '/assets/js/vendor/scrollreveal/scrollreveal.min.js', array('jquery'), '' , true );	

	//Cargar ElevateZoom
	wp_enqueue_script('wp-elevatezoom-js', THEMEROOT . '/assets/js/vendor/elevatezoom/jquery.elevatezoom3.0.8.min.js', array('jquery'), '3.0.8' , true );	

	//custom script para videos de youtube
	wp_enqueue_script('custom_lazy_youtube', THEMEROOT . '/assets/js/source/lazy-load-youtube.js', array('jquery'), '1.0' , true );

	/*
	 * Cargar Slidebar Transitions 
	 */
	wp_enqueue_script( 'wp-modernizr-js' , THEMEROOT . '/assets/js/vendor/sidebar-transitions/modernizr.custom.js' , array('jquery') , '2.6.2' , true );
	
	wp_enqueue_script( 'wp-classie-js' , THEMEROOT . '/assets/js/vendor/sidebar-transitions/classie.js' , array('jquery') , '1.0.0' , true );	

	wp_enqueue_script( 'wp-sidebar-effects-js' , THEMEROOT . '/assets/js/vendor/sidebar-transitions/sidebarEffects.js' , array('jquery') , '1.0.0' , true );

	//Registrar Custom Script Personalizado
	wp_register_script( 'wp-js-custom_script' , THEMEROOT . '/assets/js/source/script.js' , array('jquery') , '1.0' , true );

	//Localización enviar nueva data
	$theme_data = array(
		'themeroot' => THEMEROOT
	);
	
	//Asignar
	wp_localize_script( 'wp-js-custom_script' , 'data' , $theme_data );
	wp_enqueue_script('wp-js-custom_script');
}

add_action('wp_enqueue_scripts', 'load_custom_scripts');


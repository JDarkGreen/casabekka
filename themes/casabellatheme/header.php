<?php 
/*
 * @file [ Header File ]
 */ 

/*
 * Objeto Global
 */
global $post;

/*
 * @var $options [opciones de personalizacion]
 */
$options = get_option('theme_settings');

/*
 * @var $logo_url [string] Image Logo
 */
$logo_url = get_header_image() !== '' ? get_header_image() : IMAGES . '/logo_casabella.png';

/*
 * @var $description_theme [string] Descripción del Tema
 */
$description_theme = get_post_meta( get_the_ID() , ' _yoast_wpseo_metadesc' , true ) !== '' ? : get_bloginfo('description'); ?>



<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title('|', true, 'right'); ?>
	<?php bloginfo('name'); ?></title>

	<meta name="description" content="<?= $description_theme; ?>">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
	
<?php  

/*
 * Importar @partial de navegación mobile
 */
//include( locate_template('/partials/navigation/sidebar-nav-mobile.php') );

/*
 * Importar @partial de Navegación de Servicios
 */
//include( locate_template('partials/navigation/sidebar-menu-service.php') ); 

/*
 * Importar @partial de Header mobile
 */
//include( locate_template('partials/header/header-mobile.php') );  ?>


<!-- Contenedor Para Navegación Mobile -->
<main id="slideout-container-panel">

	<!-- Header -->
	<header class="mainHeader hidden-xs-down">

		<?php 
 
		/*
		 * Importar template de contenido de Header
		 */
		include( locate_template('partials/header/header-content.php') ); 

		/*
		 * Importar template de Navegación Principal
		 */
		include( locate_template('partials/navigation/main-menu-nav.php') ); ?>

	</header> <!-- /.mainHeader -->


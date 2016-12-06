<?php
/*
 * Plantilla Padre Superior , mostrada como primera 
 * opción
 */

/*
 * Obtener Header
 */
get_header(); 

/*
 * Extraer Opciones del Tema
 */
$options = get_option( 'theme_settings' ); 

/*
 * Importar slider Home
 */
include( locate_template('partials/home/slider-home-content.php') );

/*
 * Importar Franja de Contacto
 */
include( locate_template('partials/common-section/section-contact-strip.php') );

/*
 * Importar Sección de Bienvenida
 */
include( locate_template('partials/nosotros/section-welcome-about-our.php') );

/* 
 * Importar Sección de Servicios
 */
include( locate_template('partials/home/section-carousel-services.php') );

/* 
 * Importar Sección de Miscelaneo
 */
include( locate_template('partials/home/miscelaneo.php') );



/*
 * Obtener Footer
 */
get_footer();

<?php  

/*-----------------------------------------------------*/
/* PERSONALIZAR CAMPOS DE TAXONOMÍA
/* -------------------------------------------------------*/

//SECCIÓN CUSTOM URL
add_settings_section( PREFIX."_themePage_rewriteurl" , __( 'Personalizar Url:' , 'LANG' ), 'custom_settings_rewrite_url_callback', 'customThemeRewriteUrl' );

function custom_settings_rewrite_url_callback()
{ 
	echo __( 'Personaliza Url de Taxonomías:', 'LANG' );
}

//SECCIÓN DE SOBREESCRIBIR SLUG TAXONOMÍAS

add_settings_field( 'theme_rewriteurl', __( 'Customizar Url:', 'LANG' ), 'theme_rewriteurl_render', 'customThemeRewriteUrl', PREFIX."_themePage_rewriteurl" );
//Renderizado 
function theme_rewriteurl_render() 
{ 
	$options        = get_option( 'theme_settings' ); 
	#todas las taxonomias
	$all_taxonomies = get_taxonomies();
	#excluir taxonomias
	$exclude_tax    =  array("category","post_tag","nav_menu","link_category","post_format","wpmf-category");
	#solo quedar con las taxonomias necesarias
	$all_taxonomies = array_diff( $all_taxonomies , $exclude_tax );
?>
	<h3> TAXONOMÍAS PERSONALIZADAS </h3>

	<table>
		<tr> 
			<td><b><u>ORIGINAL</u></b></td> 
			<td><b><u>ACTUAL</u></b></td> 
		</tr>

		<?php foreach( $all_taxonomies as $tax ) : 
		#var_dump( get_taxonomy( $tax ) ); ?>

		<tr>
			<td> <label><b> <?= $tax ?> </b></label> </td>
			<td> 
				<input type='text' id='theme_rewriteurl' data-suboption="<?= $tax ?>" class='js-field-ajax' value='<?= !empty($options['theme_rewriteurl'][$tax]) ? $options['theme_rewriteurl'][$tax] : $tax; ?>'>
			</td>
		</tr>
		<?php endforeach; ?>
	</table> 

	<h3> TIPOS DE POSTS </h3>

	<?php 
		#Obtener todos los custom post type
		$args = array(
			'public'   => true,
			'_builtin' => false
		);
			
		$output     = 'names'; // names or objects, note names is the default
		$operator   = 'and'; // 'and' or 'or'
		#Todos los tipos de posts
		$custom_post_types = get_post_types( $args, $output, $operator );
	?>

	<table>
		<tr> 
			<td><b><u>ORIGINAL</u></b></td> 
			<td><b><u>ACTUAL</u></b></td> 
		</tr>

		<?php foreach( $custom_post_types as $post_type ) : ?>

		<tr>
			<td> <label><b> <?= $post_type ?> </b></label> </td>
			<td> 
				<input type='text' id='theme_rewriteurl' data-suboption="<?= $post_type ?>" class='js-field-ajax' value='<?= !empty($options['theme_rewriteurl'][$post_type]) ? $options['theme_rewriteurl'][$post_type] : $post_type; ?>'>
			</td>
		</tr>
		<?php endforeach; ?>
	</table> 

<?php
	
}
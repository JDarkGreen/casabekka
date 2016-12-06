<?php  
/*
 * Metabox que agregar un campo personalizado para todos 
 * los producto en el cual setea el código 
 */

/*|-------------------------------------------------------------------------|*/
/*|---------------------- METABOX DE SLIDER REVOLUTION  --------------------|*/
/*|-------------------------------------------------------------------------|*/

add_action( 'add_meta_boxes', 'cd_mb_slider_revolution' );

//llamar funcion 
function cd_mb_slider_revolution()
{	
	$array_custom_types = array('theme-slider-home');

	//Solo en productos
	add_meta_box( 'mb-slider-revolution', 'Efecto de Slider', 'cd_mb_slider_revolution_cb', $array_custom_types , 'side', 'high' );
}

//customizar box
function cd_mb_slider_revolution_cb( $post )
{
	// $post is already set, and contains an object: the WordPress post
    global $post;

    $values         = get_post_custom( $post->ID );
    $current_effect = isset( $values['mb_rev_slider_select'] ) ? $values['mb_rev_slider_select'][0] : '';

	// We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

    ?>
        <label for="revsliderselect"> Efectos: </label> <br/>

        <select name="revsliderselect" id="revsliderselect">

            <!-- Efecto basico -->
            <option value="notransition"> BÁSICOS  </option> 

            <!-- Efecto basico -->
            <option value="notransition" <?php selected( $current_effect , 'notransition' ); ?> > No transición  </option> 
            <!-- Efecto  -->
            <option value="fade" <?php selected( $current_effect , 'fade' ); ?> > Fade </option>             
            <!-- Efecto  -->
            <option value="crossfade" <?php selected( $current_effect , 'crossfade' ); ?> > Cross Fade </option>             
            <!-- Efecto  -->
            <option value="fadethroughdark" <?php selected( $current_effect , 'fadethroughdark' ); ?> > Fade through Dark BG </option>             
            <!-- Efecto  -->
            <option value="fadethroughlight" <?php selected( $current_effect , 'fadethroughlight' ); ?> > Fade through Light BG </option>        
            <!-- Efecto  -->
            <option value="fadethroughtransparent" <?php selected( $current_effect , 'fadethroughtransparent' ); ?> > Fade through predefined BG </option> 

            <!-- Efecto parallax -->
            <option value="parallaxtoright"> PARALLAX  </option>             
            <!-- Efecto  -->
            <option value="parallaxtoright" <?php selected( $current_effect , 'parallaxtoright' ); ?> > Parallax to Right </option>
            <!-- Efecto  -->
            <option value="parallaxtoleft" <?php selected( $current_effect , 'parallaxtoleft' ); ?> > Parallax to Left </option>  
            <!-- Efecto  -->
            <option value="parallaxtotop" <?php selected( $current_effect , 'parallaxtotop' ); ?> > Parallax to Top </option>     
            <!-- Efecto  -->
            <option value="parallaxtobottom" <?php selected( $current_effect , 'parallaxtobottom' ); ?> > Parallax to Bottom </option>     
            <!-- Efecto  -->
            <option value="parallaxhorizontal" <?php selected( $current_effect , 'parallaxhorizontal' ); ?> > Parallax Horizontal </option>     
            <!-- Efecto  -->
            <option value="parallaxvertical" <?php selected( $current_effect , 'parallaxvertical' ); ?> > Parallax Vertical </option>

            <!-- Efecto ramdom -->
            <option value="random-selected"> RAMDOM  </option>
            <!-- Efecto  -->
            <option value="random-selected" <?php selected( $current_effect , 'random-selected' ); ?> > Random of Selected </option>    
            <!-- Efecto  -->
            <option value="random-static" <?php selected( $current_effect , 'random-static' ); ?> > Random Flat </option>     
            <!-- Efecto  -->
            <option value="random-premium" <?php selected( $current_effect , 'random-premium' ); ?> > Random Premium </option>        
            <!-- Efecto  -->
            <option value="random" <?php selected( $current_effect , 'random' ); ?> >  Random Flat and Premium </option>    

        </select> <!-- /.mb_rev_slider_select -->

    <?php    
}
//guardar la data
add_action( 'save_post', 'cd_mb_slider_select_save' );

function cd_mb_slider_select_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
     if ( !current_user_can( 'edit_post', $post_id ) ) return;
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['revsliderselect'] ) ):

        update_post_meta( $post_id, 'mb_rev_slider_select' , $_POST['revsliderselect']  );

    endif;
}
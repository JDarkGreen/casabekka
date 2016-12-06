<?php /**
** Metabox que agregar un campo personalizado para todos 
** las páginas tengan banner destacados
**/

/*|-------------------------------------------------------------------------|*/
/*|-------------- METABOX DE BANNER DESTACADO ---------------------------|*/
/*|-------------------------------------------------------------------------|*/

add_action( 'add_meta_boxes', 'cb_mb_featured_banner' );


//llamar funcion 
function cb_mb_featured_banner()
{ 
    #Registrar en todos las páginas
    add_meta_box( 'mb_featured_banner_mbox', 'Banner Personalizado de Página', 'cd_mb_featured_banner_cb', array('page') , 'side', 'high' );
}


//customizar box
function cd_mb_featured_banner_cb( $post )
{
    // $post is already set, and contains an object: the WordPress post
    global $post;

    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

    $mb_featured_banner = get_post_meta( $post->ID, 'mb_featured_banner' , true );

?>

        <!-- Input Oculto -->
        <input type="hidden" id="mb_featured_banner" name="mb_featured_banner" value="<?= trim($mb_featured_banner); ?>" />

        <p class="description"> Añade una imagen para banner personalizado - !No te olvides ACTUALIZAR! para guardar los datos</p>

        <!-- Contenedor Padre -->
        <div class="customize-img-container">

            <!-- Boton Agregar Elemento -->
            <button class="button button-primary js-add-custom-img" data-type="image" data-field-id="mb_featured_banner">
                <?= empty($mb_featured_banner) ? 'Agregar Elemento' : 'Cambiar Elemento'; ?>
            </button>  
            
            <!-- Espaciado -->
            <div style="clear:both; height: 5px;"> </div>

            <!-- Botón remover -->
            <button class="button button-primary js-remove-custom-img" data-field-id="mb_featured_banner">
                <?php _e( 'Remover Elemento' , LANG ); ?>
            </button>

            <!-- Contenedor Hijo -->
            <div class="container-preview" style="background: rgba(0,0,0,.3); border: 1px dotted black; margin: 10px 0; text-align: center;">

                <?php if(!empty($mb_featured_banner)) : ?>
                    <img src="<?= $mb_featured_banner; ?>" alt="" width="100%" height="auto" />
                <?php endif; ?>

            </div>
            
        </div> <!-- /.customize-img-container -->


<?php  

}


//guardar la data
add_action( 'save_post', 'cd_mb_featured_banner_save' );

function cd_mb_featured_banner_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

    /** Check the user allowed to edit the post or page */
    if ( !current_user_can( 'edit_post', $post_id ) ) return;

    // Make sure your data is set before trying to save it
   if( isset( $_POST['mb_featured_banner'] ) )
        update_post_meta( $post_id, 'mb_featured_banner', $_POST['mb_featured_banner'] );
}

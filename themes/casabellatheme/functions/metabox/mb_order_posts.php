<?php  

/*
 * METABOX : ORDER DE POST
 : ACCION : Contribuye a desplegar un select para ordenar los tipos de post 
  mediante el selector 
 */

/*
 * FUNCIONES A EMPLEAR
 	1.- Conseguir todos los post publicados segun el 
 	* parametro tipo de post
 */

function getPublishTypePosts( $type_post = 'post' )
{
	$args = array(
		'post_status'    => 'publish',
		'post_type'      => $type_post,
		'posts_per_page' => -1,
		'meta_key'       => 'mbox_order_post',
		'order'          => 'ASC',
		'orderby'        => 'meta_value_num',
	);

	$publish_tposts = get_posts( $args );

	return $publish_tposts;
}

/*
 * Ordenar Item por si hay duplicados
 */
function orderAllItems()
{
	if( getPublishTypePosts( getTypePost() ) ):

		/* Obtener todos los post publicados */
		$all_publish_posts = getPublishTypePosts( getTypePost() );

        /* Ordenar Todos los metabox si hay duplicados */
        $control = 1;

        foreach ( $all_publish_posts as $tpost ) :

        update_post_meta( $tpost->ID , 'mbox_order_post' , $control );
        	
        $control++; endforeach;

	endif;
}

/*
 * FUNCTION ORDENAMIENTO DE ITEMS POR METABOX
 */
function sortMetaboxItems( $item_order1 , $item_order2 )
{
	if( getPublishTypePosts( getTypePost() ) ):

		/*
		 * Obtener ID de metabox de order
		 */
		$element_from = getIdFromMetaboxOrder( $item_order1 );
		$element_to   = getIdFromMetaboxOrder( $item_order2 );

		/* 
		 * Finalmente Cambiar el orden solo de los dos elementos
		 */
		update_post_meta( $element_from , 'mbox_order_post' , $item_order2 );
		update_post_meta( $element_to , 'mbox_order_post' ,  $item_order1 );

	endif;
}



/*
 * Funcion que Obtiene el ID del Post segun el metabox
 */
function getIdFromMetaboxOrder( $mb_order )
{
	$args = array(
		'posts_per_page' => 1,
		'post_type'      => getTypePost(),
		'meta_query'     => array(
			array(
				'key'     => 'mbox_order_post',
				'value'   => intval($mb_order),
				'compare' => '=',
			),
		),
	);

	$items = get_posts( $args );

	if( empty($items) ) :
		
		return false;
	
	else:

		$the_item = $items[0];
		return $the_item->ID;

	endif;
}

/*
 * Obtener el tipo de post
 */
function getTypePost()
{
	global $post;

	return get_post_type( $post );
}

/*
 * Si el post está publicado
 */
function isPublishPost()
{
	global $post; 

	$status = get_post_status( $post->ID );
	if( $status === 'publish' ) : return true;
	else: return false; endif;
}

/*
 * Obtener Cuantos Elementos Publicados Hay
 */
function getNumberPublishPosts()
{
	$publish_posts = getPublishTypePosts( getTypePost() );
	return count( $publish_posts );
}

/*
 * Obtener Orden de Metabox
 */
function getOrderMetabox( $postID )
{
	$mb_order = get_post_meta( $postID , 'mbox_order_post' , true );
	if( !empty($mb_order) ) : return intval($mb_order);
	else: return 1; endif;
}

/*
 * Obtener actual Orden este publicado el post o no
 */
function getCurrentOrder()
{
	global $post;

	if( !isPublishPost() ) : return getNumberPublishPosts() + 1;
	else: return getOrderMetabox( $post->ID ); endif;
}


add_action( 'add_meta_boxes', 'cb_mb_order_type_posts' );

function cb_mb_order_type_posts()
{
	/*
	 * Obtener todos los tipos de posts
	 */
	$all_posts_types = get_post_types();

	/*
	 * Excluir typos
	 */
	$exclude = array('attachment','revision','nav_menu_item');
	$register_posts_types = array_diff( $all_posts_types , $exclude );


	add_meta_box( 'mb_order_tposts', 'Orden de Elementos', 'cd_mb_order_type_posts_cb', $register_posts_types , 'side', 'high' );
}

/*
 * Function Callback - Customizar metabox
 */
function cd_mb_order_type_posts_cb( $post )
{
	//variable global post
 	global $post;

    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
?>

	<!-- Input Hidden que almacenar el orden del post -->
	<label for="mb_current_order_mbox"> Orden Actual ( ó temporal ) : 
	<?= getCurrentOrder(); ?></label>
	<input type="hidden" name="mb_current_order_mbox" value="<?= getCurrentOrder(); ?>" />
	<br>

	<label class="description" for="select_order_tpost_mbox"> Selecciona donde deseas que se coloque este Item : <?= getTypePost(); ?> </label> <br/><br/>

	<?php  
	    /*
	     * Si el post o item está publicado se muestra el metabox
	     */
	    if( isPublishPost() ) :

	    /* Ordenar Todos los Items */
		orderAllItems();

		/*
		 * Obtener los post publicados segun el tipo
		 */
		$publish_posts = getPublishTypePosts( getTypePost() );
	?>

	<select name="select_order_tpost_mbox" id="select_order_tpost_mbox">
		<?php foreach( $publish_posts as $tpost ): ?>

			<option value="<?= getOrderMetabox( $tpost->ID ) ?>" <?php selected( getCurrentOrder() , getOrderMetabox( $tpost->ID ) ); ?> > 

				<?= 'ID:'. $tpost->ID . ' - ' . $tpost->post_title . ' Order: ' . getOrderMetabox( $tpost->ID ); ?>	

			</option>
		
		<?php endforeach; ?>
	</select> <!-- select -->

<?php
	
	/* Si el post no está publicado */
	else: echo '<b><u>Para acceder a esta funcionalidad por favor Publique el Item/Post. Gracias</u></b>';
	endif;
}

/*
 * Guardando la Data
 */

add_action( 'save_post', 'cd_mb_order_type_posts_save' );

function cd_mb_order_type_posts_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

    /** Check the user allowed to edit the post or page */
     if ( !current_user_can( 'edit_post', $post_id ) ) return;

    /*
     * Guardar La Data
     */

    /*
     * Si - 1.- el post esta publicado 
     */

    if( isset( $_POST['select_order_tpost_mbox'] ) && !empty( $_POST['select_order_tpost_mbox'] ) ) :

    	/* Orden Actual */
    	$current_order = intval( $_POST['mb_current_order_mbox'] );
    	/* Orden Selector */
    	$the_selector  = intval( $_POST['select_order_tpost_mbox'] );

		/*
		 * Llamar a function ordenar y le paso los parametros
		 */	
		sortMetaboxItems( $current_order , $the_selector );

    else:

    	/*
    	 * Setear el meta
    	 */
    	if( isset( $_POST['mb_current_order_mbox'] ) )
			add_post_meta( $post_id , 'mbox_order_post', intval($_POST['mb_current_order_mbox']) );

    endif;



   
}
<?php 
/*
 * Archivo crea campos personalizados para las taxonomías especificadas
*/

/*
 * TAXONOMIAS ESPECIFICADAS
 */


/*
 * Funciones para hacer la llamada callback
 */

/** AGREGAR NUMERO DE ORDEN **/
function theme_add_num_order( $value_number = 1 )
{
    ob_start(); //Encienda el búfer de salida ?>
    <tr class="form-field">  
        <th scope="row" valign="top">  
            <label for="theme_tax_order"><?php _e('Asignación Prioridad - Orden: '); ?></label> 
        </th>   <!-- /.scope="row" -->
        <td>
            <input type="number" name="theme_tax_order" value="<?= $value_number; ?>" min="1" style="max-width: 100px;" />
            <p class="description"> <?php _e( "Determina el orden de este termino: 1 = mayor prioridad , 2 , 3 etc", LANG ); ?></p>
            <!-- Separación--> <br />
        </td>
    </tr> <!-- /.form-field -->
    <?php
        $output_function_order = ob_get_contents(); #Devolver el contenido del búfer de salida
        ob_clean(); //Esta función desecha el contenido del búfer de salida. 
        return $output_function_order;
}

/** CAMPO PERSONALIZADO IMÁGEN TAXONOMIA  **/
function theme_add_images( $value_images = "" )
{
    ob_start(); //Encienda el búfer de salida ?>
    <tr class="form-field">  

        <th scope="row" valign="top">  
            <label for="theme_tax_image"><?php _e('Asignar Imágen(es): '); ?></label> 
        </th>   <!-- /.scope="row" -->

        <td>

            <section class="js-containerParentGallery">

                <!-- Input Oculto -->
                <input type="hidden" id="field_customize_gallery" name="theme_tax_images" value="<?= trim($value_images); ?>" />

                <!-- Contenedor Sorteable -->
                <ul id="js-containerSortableGallery" class="js-containerSortableGallery" data-field-id="field_customize_gallery">

                    <?php 
                        //convertir en arreglo
                        $value_images = explode(',', $value_images ); 
                        //eliminar valores negativos
                        $value_images = array_diff( $value_images , array(-1,'-1') );
                        //Eliminar espacios en blanco 
                        $value_images = array_filter( $value_images , function($var) {
                            return trim($var);
                        });

                        #Recorrido de id de imagenes
                        foreach ( $value_images as $meta_img_id ) : 

                        #Conseguir todos los datos de este item
                        $item = get_post( $meta_img_id ); 

                        if( !empty($item) ) : ?>

                        <!-- Nota: colocar data-id-img es referente al id de la imagen -->
                        <li class='ui-state-default' data-id-element="<?= $item->ID ?>">

                            <!--  Boton borrar Imagen -->
                            <a href="#" class="js-remove-element-gallery" data-field-id="field_customize_gallery" data-id-element="<?= $item->ID ?>" style="border-radius: 50%; width: 20px;height: 20px; border: 2px solid red; color: red; position: absolute; top: -10px; right: -8px; text-decoration: none; text-align: center; background: black; font-weight: 700; z-index:999;">X</a>

                            <!--  Boton Actualizar Imagen -->
                            <a href="#" class="js-update-element-gallery" data-field-id="field_customize_gallery" data-id-element="<?= $item->ID ?>" style="border-radius: 50%; width: 20px;height: 20px; border: 2px solid green; color: green; position: absolute; top: -10px; right: 18px; text-decoration: none; text-align: center; background: white; font-weight: 700; z-index:999;">@</a>
                            
                            <!-- Abrir frame del contenedor de imagen -->
                            <img src="<?= $item->guid; ?>" alt="<?= $item->post_title; ?>" class="" style="width: 100%; height: 100%; margin: 0 auto;" />

                            <!-- Titulo que muestra el id de imagen que tiene la imagen -->
                            <h2 style="position: absolute;top: 0px;left: 0px;right: 0px;bottom: 0px;color: white;align-items: center; display: flex; justify-content: center; font-size: 50px; text-shadow: 1px 1px 4px black;"> <?= $item->ID; ?> </h2>

                        </li> <!-- end figure -->

                    <?php endif; endforeach; ?>
    
                </ul> <!--/.js-containerSortableGallery -->

                <!-- Espacio -->
                <div style="clear:both; height: 1px;"> </div>
                    <p class="description"> Deben ser más de dos o más Imágenes </p>
                <div style="clear:both; height: 1px;"> </div>

                
                <!-- Boton Agregar Elemento -->
                <button class="button button-primary js-add-element-gallery" data-field-id="field_customize_gallery" >
                    <?= __('Agregar Elemento' , LANG ); ?>
                </button> 

                <!-- Botón remover -->
                <button class="button button-primary js-remove-all-gallery" data-field-id="field_customize_gallery">
                    <?php _e( 'Remover Todos Elementos' , LANG ); ?>
                </button>

            </section> <!-- /.js-containerParentGallery -->

        </td>

    </tr> <!-- /.form-field -->
    <?php
        $output_function = ob_get_contents(); #Devolver el contenido del búfer de salida
        ob_clean(); //Esta función desecha el contenido del búfer de salida. 
        return $output_function;
}


/** CAMPO PERSONALIZADO COLOR TAXONOMIA  **/
function theme_add_color( $value_color = "#000000" )
{
    ob_start(); //Encienda el búfer de salida ?>
    <tr class="form-field">  
        <th scope="row" valign="top">  
            <label for="theme_tax_color"><?php _e('Asignar Color Destacado: '); ?></label> 
        </th>   <!-- /.scope="row" -->
        <td>
            <p class="description"> <?php _e( "Por defecto Negro", LANG ); ?></p>

            <input type="text" class="js-add-theme-color" name="theme_tax_color" value="<?= $value_color; ?>" />

            <!-- Separación--> <br />
        </td>
    </tr> <!-- /.form-field -->
    <?php
        $output_function = ob_get_contents(); #Devolver el contenido del búfer de salida
        ob_clean(); //Esta función desecha el contenido del búfer de salida. 
        return $output_function;
}


/**---------------------------------------------------------------------------**/

function theme_taxonomy_add_custom_fields()
{
    /**
    *  CAMPO PERSONALIZADO ORDEN
    **/
    echo theme_add_num_order();    

    /**
    *  CAMPO PERSONALIZADO IMAGEN
    **/
    echo theme_add_images();

    /**
    * CAMPO PERSONALIZADO COLOR TAXONOMIA
    **/
    echo theme_add_color();

}


function theme_taxonomy_edit_custom_fields( $term  ) {  

    /*
     * Extraer los metas de cada taxonomia
     */

    /**
    *  CAMPO PERSONALIZADO ORDEN
    **/
    $value_order = get_term_meta( $term->term_id , 'meta_order_taxonomy' , true );
    echo theme_add_num_order( $value_order );

    /**
    *  CAMPO PERSONALIZADO IMÁGENES
    **/
    $value_images = get_term_meta( $term->term_id , 'meta_images_taxonomy' , true );
    echo theme_add_images( $value_images );

    /**
    * CAMPO PERSONALIZADO COLOR TAXONOMIA
    **/
    $value_color = get_term_meta( $term->term_id , 'meta_color_taxonomy' , true );
    echo theme_add_color( $value_color );

?>  

<?php  
}  

// Una función de devolución de llamada para salvar nuestro campo de la taxonomía extra (s)  
function save_taxonomy_custom_fields( $term_id ) {  

    /**
    * AGREGAR  META DATA A LAS TAXONOMIAS 
    **/

    /*|** [Campo Orden] **|*/ 

    #Si existe campo meta order
    if ( isset($_POST['theme_tax_order']) ):
        #Actualizar valor
        update_term_meta( $term_id , 'meta_order_taxonomy' , $_POST['theme_tax_order'] );
    endif;


    /*|** [Campo Imágenes] **|*/ 

    #Si existe campo meta images
    if ( isset($_POST['theme_tax_images']) ):
        #Actualizar valor
        update_term_meta( $term_id , 'meta_images_taxonomy' , $_POST['theme_tax_images'] );
    endif;


    /*|** [Campo Color] **|*/ 

    #Si ya tiene un meta data 
    if ( isset($_POST['theme_tax_color']) ):
        #Actualizar valor
        update_term_meta( $term_id , 'meta_color_taxonomy' , $_POST['theme_tax_color'] );
    endif;
}


/*
 * Agregamos los hooks necesarios solo a la taxonomía Categoría
 */

// Agregue hooks para mostrar en la página de seteo 
add_action( 'category_add_form_fields', 'theme_taxonomy_add_custom_fields');

//  Agregue los campos a categoria , utilizando nuestra función de devolución de llamada
add_action( 'category_edit_form_fields', 'theme_taxonomy_edit_custom_fields');

// Accion Guardar Agregue los campos a categoria
add_action( 'create_category', 'save_taxonomy_custom_fields');

// Accion Guardar los campos a categoria formulario editar
add_action( 'edited_category', 'save_taxonomy_custom_fields');

/**
** Agregamos los hooks necesarios segun cuantas taxonomías hayamos seteado solo personalizados 
*/

function customFieldsTaxonomies()
{
    $alltaxonomies = get_taxonomies();

    $exclude = array(
        'post_tag','nav_menu','link_category','post_format','wpmf-category'
    );

    $newtaxonomies = array_diff( $alltaxonomies , $exclude );

    foreach( $newtaxonomies as $tax ):
        // Agregue hooks para mostrar en la página de seteo 
        add_action( $tax . "_add_form_fields", 'theme_taxonomy_add_custom_fields', 10, 2 );  
        
        // Agregue los campos de la taxonomía , utilizando nuestra función de devolución de llamada
        add_action( $tax . "_edit_form_fields", 'theme_taxonomy_edit_custom_fields', 10, 2 );  
      
        // Guarde los cambios realizados en la taxonomía , utilizando nuestra función de devolución de llamada 
        add_action( "edited_" . $tax , 'save_taxonomy_custom_fields', 10, 2 );  
        add_action( "create_" . $tax , 'save_taxonomy_custom_fields', 10, 2 );

    endforeach; /* end of foreach*/
}

add_action('init' , 'customFieldsTaxonomies' );



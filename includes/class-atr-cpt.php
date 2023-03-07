<?php 
/**
 * Este sera el archivo donde gestionaremos los 
 * Custom Post Type de wordpress
 */

class ATR_CPT{

    public function atr_cpt_servicios() {



        // Etiquetas para el Post Type
        $labels = array(
            'name'                => _x( 'servicios', 'Post Type General Name', 'theme' ),
            'singular_name'       => _x( 'servicio', 'Post Type Singular Name', 'theme' ),
            'menu_name'           => __( 'servicios', 'theme' ),
            'parent_item_colon'   => __( 'Menu Padre', 'theme' ),
            'all_items'           => __( 'Todas las servicios', 'theme' ),
            'view_item'           => __( 'Ver Menu', 'theme' ),
            'add_new_item'        => __( 'Agregar Nueva servicio', 'theme' ),
            'add_new'             => __( 'Agregar Nueva servicio', 'theme' ),
            'edit_item'           => __( 'Editar servicio', 'theme' ),
            'update_item'         => __( 'Actualizar servicio', 'theme' ),
            'search_items'        => __( 'Buscar servicio', 'theme' ),
            'not_found'           => __( 'No encontrado', 'theme' ),
            'not_found_in_trash'  => __( 'No encontrado en la papelera', 'theme' ),
        );

        // Otras opciones para el post type

        $args = array(
            'label'               => __( 'servicios', 'theme' ),
            'description'         => __( 'servicio news and reviews', 'theme' ),
            'labels'              => $labels,
            // Todo lo que soporta este post type
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            /* Un Post Type hierarchical es como las paginas y puede tener padres e hijos.
            * Uno sin hierarchical es como los posts
            */
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-building',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            //Habilitando la wp rest appi
            'show_in_rest'          => true,
            'rest_base'             => 'services-appi',
            'rest_controller_class' => 'WP_REST_Posts_Controller',

        );

        //Por último registramos el post type
        register_post_type( 'services', $args );

        flush_rewrite_rules();

    }

    public function atr_pagination_post($data){

        
        //paginación para el custom post type
        $big = 9999999;

        $args = array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var( 'paged' )),//toma el valor 1 de la consulta 'paged'
            'show_all'           => false,
            'end_size'           => 1,
            'mid_size'           => 2,
            'prev_next'          => true,
            'prev_text'          => __('« Previous', 'atr-opt'),
            'next_text'          => __('Next »', 'atr-opt'),
            'type'               => 'plain',
            'add_args'           => false,
            'add_fragment'       => '',
            'before_page_number' => '',
            'after_page_number'  => '',
            'total' => $data->max_num_pages
        );

            echo paginate_links($args);

    }

    public function atr_taxonomia_servicios(){

        $post_types = [ 'rooms' ];

        $labels = array(
            'name'              => _x( 'Tipo de Habitación', 'taxonomy general name', 'theme' ),
            'singular_name'     => _x( 'Tipo de Habitación', 'taxonomy singular name', 'theme' ),
            'search_items'      => __( 'Buscar Tipo de Habitación', 'theme' ),
            'all_items'         => __( 'Todos los Tipo de Habitaciones', 'theme' ),
            'parent_item'       => __( 'Tipo de Habitación Padre', 'theme' ),
            'parent_item_colon' => __( 'Tipo de Habitación Padre:', 'theme' ),
            'edit_item'         => __( 'Editar Tipo de Habitación', 'theme' ),
            'update_item'       => __( 'Actualizar Tipo de Habitación', 'theme' ),
            'add_new_item'      => __( 'Agregar Nuevo Tipo de Habitación', 'theme' ),
            'new_item_name'     => __( 'Nuevo Tipo de Habitación', 'theme' ),
            'menu_name'         => __( 'Tipo de Habitación', 'theme' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite' => array( 'slug' => 'tipo-servicio' ),
            //Campos api rest
            'show_in_rest'          => true,
            'rest_base'             => 'tipo-servicio',
            'rest_controller_class' => 'WP_REST_Terms_Controller',

        );

        register_taxonomy( 'tipo-servicio', $post_types, $args );


    }

    public function atr_metadatos_cpt(){

        //add_post_meta( 140, 'mimetadato', 'un valor cualquiera');
        delete_post_meta( 140, 'mimetadato' );

        add_post_meta( 140, 'colores', 'azul', true);
        add_post_meta( 140, 'colores', 'verde', true);

        //delete_post_meta( 140, 'colores' );

        update_post_meta(140, 'colores', 'marron', 'azul');

    }

}
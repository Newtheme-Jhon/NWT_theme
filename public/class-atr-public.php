<?php

class ATR_Public {

    private $theme_name;
    private $version;

    public function __construct( $theme_name, $version ) {
        
        $this->theme_name = $theme_name;
        $this->version = $version;
        
        //function pagination
        $this->atr_suma();
        
    }

    public function enqueue_styles(){

        wp_enqueue_style( 
            'normalize', 
            ATR_DIR_URI . 'public/css/normalize.css', 
            array(), 
            '8.0.1', 
            'all' 
        );
    
        wp_enqueue_style( 
            'public', 
            ATR_DIR_URI . 'public/css/atr-public.css', 
            array(), 
            '1.0.0', 
            'all' 
        );
    
        //Libreria de bootstrap 5
        wp_enqueue_style(
            'bootstrap',
            ATR_DIR_URI . 'helpers/bootstrap-5.2/css/bootstrap.min.css',
            [],
            '5.0.0',
            'all'
        );
    
        //Archivos fontawesome css
        wp_enqueue_style( 
            'fontawesome', 
            ATR_DIR_URI . 'helpers/fontawesome-6.2.1/css/fontawesome.min.css', 
            [], 
            '6.2.1', 
            'all'
        );

        wp_enqueue_style(
            'brands', 
            ATR_DIR_URI . 'helpers/fontawesome-6.2.1/css/brands.min.css', 
            array(), 
            '5.15.4', 
            'all'
        );
    
    }

    
    public function enqueue_scripts(){
    
        wp_enqueue_script( 
            'public', 
            ATR_DIR_URI . 'public/js/atr-public.js', 
            ['jquery', 'bootstrap-min'], 
            '1.0.0', 
            true 
        );
    
         //Encolando libreria de bootstrap
         wp_enqueue_script(
            'bootstrap-min',
            ATR_DIR_URI . 'helpers/bootstrap-5.2/js/bootstrap.min.js',
            ['jquery'],
            '5.0.0',
            true
        );

        //Archivos fontawesome js
        wp_enqueue_script(
            'fontawesome', 
            ATR_DIR_URI . 'helpers/fontawesome-6.2.1/js/fontawesome.min.js', 
            array(), 
            '6.2.1', 
            true 
        );

        wp_enqueue_script(
            'brands', 
            ATR_DIR_URI . 'helpers/fontawesome-6.2.1/js/brands.min.js', 
            array(), 
            '6.2.1', 
            true 
        );

    }

    /**
     * Aquí cargaremos algunas funciones para ajustar el menú frontend
     */
    public function atr_theme_support(){

        //registrar menu
        register_nav_menus( [
            'menu_principal' => __('Menu Principal', 'theme'),
            'menu_redes_sociales' => __('Menu Redes Sociales', 'theme')
        ] );

        /**
         * Añadir logo dinamicamente desde la opcion personalizar
         * creamos un array de propiedades para la imagen del logo
         */
        $logo = [
            'width' => 300,
            'height' => 70,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'theme', 'Una red social para compartir' ),
        ];
        add_theme_support( 'custom-logo', $logo );

        //Añade la imagen destacada a todas las paginas y post
        add_theme_support('post-thumbnails');

        //widgets
        add_theme_support('widgets');
        // remove_theme_support( 'widgets-block-editor' );

    }

    public function atr_register_sidebars(){
        /**
         * sidebar para el blog
         */
        register_sidebar(array(
            'name' => __('Sidebar Blog', 'theme'),
            'id' => __('blog', 'theme'),
            'description' => __('sidebar para el blog', 'theme'),
            'before_widget' => '<div class="%1$s" id="widget-blog">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-blog">',
            'after_title' => '</h3>'
        ));

        /**
         * sidebar para Contacto
         */
        register_sidebar(array(
            'name' => __('Sidebar Contacto', 'theme'),
            'id' => __('contacto', 'theme'),
            'description' => __('sidebar para contacto', 'theme'),
            'before_widget' => '<div class="%1$s" id="widget-contacto">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-contacto">',
            'after_title' => '</h3>'
        ));


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

    public function atr_suma(){
        $resultado = 3*3;
        return $resultado;
    }


}

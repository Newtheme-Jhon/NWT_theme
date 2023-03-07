<?php 

class ATR_Admin {

    private $theme_name;
    private $version;
    private $build_menupage;

    public function __construct( $theme_name, $version ){
    
        $this->theme_name = $theme_name;
        $this->version = $version;
        $this->build_menupage = new ATR_Build_Menupage();
        
    }

    /**
     * Registra los archivos de hojas de estilos del área de administración
     */
    public function enqueue_styles( $hook ) {

        if( $hook != 'toplevel_page_res_options_page' && $hook != 'opciones-de-reservas_page_res_submenu_reserva'){
            return;
        }

        wp_enqueue_style( 
            $this->theme_name, 
            ATR_DIR_URI . 'admin/css/atr-admin.css', 
            array(), 
            $this->version, 
            'all' 
        );

    }

    /**
     * Registra los archivos Javascript del área de administración
     */
    public function enqueue_scripts( $hook ) {

        if( $hook != 'toplevel_page_res_options_page' && $hook != 'opciones-de-reservas_page_res_submenu_reserva'){
            return;
        }

        wp_enqueue_script( 
            $this->theme_name, 
            ATR_DIR_URI . 'admin/js/atr-admin.js', 
            [ 'jquery' ], 
            $this->version, 
            true 
        );

    }
    
    /**
     * Registra los menús del theme en el
     * área de administración
     * @version    1.0.0
     * @access   public
     */
    public function add_menu() {

        //Así agregamos el menú
        $this->build_menupage->add_menu_page(
            __( 'Opciones de Reservas', 'theme' ),
            __( 'Opciones de Reservas', 'theme' ),
            'manage_options',
            'res_options_page',
            [ $this, 'controlador_display_menu' ],
            'dashicons-flag',
            15
        );
        

        //Así agregamos el submenu
        $this->build_menupage->add_submenu_page(

            __('res_options_page', 'theme'),
            __('Submenu reservas', 'theme'),
            __('Submenu reservas', 'theme'),
            'manage_options',
            'res_submenu_reserva',
            [ $this, 'controlador_display_submenu' ]
        );

        $this->build_menupage->run();

    }

    /**
     * Controla las visualizaciones del menú
     * en el área de administración
     */
    public function controlador_display_menu() {
        
        require_once ATR_DIR_PATH . 'admin/partials/atr-menu-reservas-display.php';
        
    }
    public function controlador_display_submenu(){

        require_once ATR_DIR_PATH . 'admin/partials/atr-submenu-reserva-display.php';
        
    }

}
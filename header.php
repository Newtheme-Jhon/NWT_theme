<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php bloginfo('name'); ?><?php if(wp_title('',false)) { echo " | "; } ?><?php wp_title('') ?>
    </title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">

    <!--Favicon .ico-->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico"/>


    <!--Etiquetas Movil APP IOS-->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="NWT_theme">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.jpg">

    <!--Etiquetas moviles app android-->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#333333">
    <meta name="application-name" content="NWT_theme">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="bg-color-container">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                
                <?php
                    if ( function_exists( 'the_custom_logo' ) ){
                        the_custom_logo();
                    }
                ?>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <?php
                
                    wp_nav_menu( array(
                        'theme_location'    => 'menu_principal',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'navbarNavDropdown',
                        'menu_class'        => 'navbar-nav'
                    ) );

                ?>
                
            </div>
        </nav>
    </div>
</header>

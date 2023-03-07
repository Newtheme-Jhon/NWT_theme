<?php 
/**
 * Template Name: Page Contacto
 */
?>

<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-7 col-lg-7">
            <p>Esta es la pagina page-contacto.php</p>
        </div>
        <div class="col-12 col-sm-12 col-md-5 col-lg-5">
            <div id="sidebar-contacto" class="sidebar">
                <?php dynamic_sidebar( 'blog' ); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
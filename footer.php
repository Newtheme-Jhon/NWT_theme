<?php wp_footer(); ?>

<footer class="footer">
    <!--Block01-->
    <div class="block-01">
        <div class="container">
            <div class="row">
                <div class="col-md-4 logo-footer">
                    <?php
                        if ( function_exists( 'the_custom_logo' ) ){
                            the_custom_logo();
                        }
                    ?>
        
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi, deserunt atque. 
                        Iste harum voluptates ducimus maiores libero error natus aperiam explicabo, vero, 
                        suscipit tempore est dolorum! Voluptatem pariatur facilis dolor!
                    </p>
                </div>
                
                <div class="col-md-4 lista-servicios">
                    <p style="font-size:22px;">Servicios</p>
                    <ul class="lista">
                        <li>pack 1</li>
                        <li>pack 2</li>
                        <li>pack 3</li>
                    </ul>
                </div>

                <div class="col-md-4 ubicacion">
                    <p style="font-size:22px;">Ubicación</p>
                    <p>aqui la ubicación</p>
                </div>

            </div>
        </div>
    </div>

    <!--Block02-->
    <div class="block-02">
        <div class="container">
            <div class="row">
                <div class="col-12 text-footer">
                    <div class="row">
                        <div class="col-md-6 texto">
                            Newtheme@ <?php echo date_i18n( 'Y' ) . ' '; ?>
                            <span class="aviso-legal">
                                <a href="#">Aviso Legal | </a>
                            </span>
                            <span class="politica-privacidad">
                                <a href="#">Política de Privacidad</a>
                            </span>
                        </div>
                        <div class="col-md-6 redes-sociales d-flex justify-content-end">
                            <?php

                                $args = [
                                    'theme_location' => 'menu_redes_sociales',
                                    'menu_class' => 'menu-sociales'
                                ];
                            
                                //Validamos si se ha crado el menú en el panel de administación (Menús)
                                if ( has_nav_menu( 'menu_redes_sociales' ) ) {
                                    wp_nav_menu( $args );
                                }else{
                                    echo "Aquí pondremos las redes sociales";
                                }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<footer>

</body>
</html>
<?php
    require 'includes/app.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion">
        <h1>Más sobre nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, dolorum dolore voluptatum reiciendis
                    eius soluta voluptates. Adipisci corrupti dolorum obcaecati! Ex veritatis delectus perferendis
                    itaque corrupti culpa totam neque tenetur!</p>
            </div>


            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, dolorum dolore voluptatum reiciendis
                    eius soluta voluptates. Adipisci corrupti dolorum obcaecati! Ex veritatis delectus perferendis
                    itaque corrupti culpa totam neque tenetur!</p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, dolorum dolore voluptatum reiciendis
                    eius soluta voluptates. Adipisci corrupti dolorum obcaecati! Ex veritatis delectus perferendis
                    itaque corrupti culpa totam neque tenetur!</p>
            </div>
        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Pisos en venta</h2>

        <?php
        //Límite de propiedades que se muestran en index
        include 'includes/templates/anuncios.php';
        ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Rellena el formulario de contacto y un asesor te atenderá en breve</p>
        <a href="contacto.php" class="boton-amarillo">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img src="build/img/blog1.jpg" alt="texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>30/11/2021</span> por: <span>Admin</span></p>

                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img src="build/img/blog2.jpg" alt="texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>30/11/2021</span> por: <span>Admin</span></p>

                        <p>Maximiza el espacio en tu hogar con esta guía. Aprende a combinar colores y muebles para darle vida a tu casa</p>
                    </a>
                </div>
            </article>

        </section>

        <section class="testimoniales">
            <h3>Testimonial</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se portó de una excelente forma, muy buena atención y el piso que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Juan José Riaño</p>
            </div>
        </section>
    </div>

<?php
    incluirTemplate('footer');
?>
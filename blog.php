<?php
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Nuestro Blog</h1>

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
                    <p class=informacion-meta>Escrito el: <span>30/11/2021</span> por: <span>Admin</span></p>

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
                    <p class=informacion-meta>Escrito el: <span>30/11/2021</span> por: <span>Admin</span></p>

                    <p>Maximiza el espacio en tu hogar con esta guía. Aprende a combinar colores y muebles para darle vida a tu casa</p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <img src="build/img/blog3.jpg" alt="texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Como mantener tu espacio caliente en invierno</h4>
                    <p class=informacion-meta>Escrito el: <span>30/11/2021</span> por: <span>Admin</span></p>

                    <p>Consejos para calentar tu casa en invierno y mantenerla a una temperatura agradable</p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpg" type="image/jpeg">
                    <img src="build/img/blog4.jpg" alt="texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>La habitación como área principal</h4>
                    <p class=informacion-meta>Escrito el: <span>30/11/2021</span> por: <span>Admin</span></p>

                    <p>Aprovecha el espacio de tu habitación, con comodidad, lujo y poco presupuesto</p>
                </a>
            </div>
        </article>

    </main>

<?php
    incluirTemplate('footer');
?>
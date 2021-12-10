<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>

        <h2>Rellena el formulario de contacto</h2>

        <form class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="name">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="name">

                <label for="email">Email</label>
                <input type="email" placeholder="Tu Email" id="email">

                <label for="tel">Teléfono</label>
                <input type="tel" placeholder="Tu Teléfono" id="tel">

                <label for="message">Mensaje</label>
                <textarea id="message"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="options">Comprar o Vender:</label>
                <select id="options">
                    <option value="" disabled selected>-- Selecciona --</option>
                    <option value="compra">Comprar</option>
                    <option value="Venta">Vender</option>
                </select>

                <label for="budget">Precio o Presupuesto</label>
                <input type="number" placeholder="Precio o Presupuesto" id="budget">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>
                <p>¿Cómo deseas ser contactado?</p>

                <div class="forma-contacto">
                    <label for="contact-tel">Teléfono</label>
                    <input name="contact" type="radio" value="phone" id="contact-tel">

                    <label for="contact-email">Email</label>
                    <input name="contact" type="radio" value="email" id="contact-email">
                </div>

                <p>Si elegiste contacto telefónico, indícanos fecha y hora para llamarte</p>

                <label for="date">Fecha:</label>
                <input type="date" id="date">

                <label for="time">Hora:</label>
                <input type="time" id="time" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>
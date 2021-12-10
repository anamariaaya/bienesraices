<?php
    // Base de datos
    require '../../includes/config/database.php';
    
    $db = conectarDB();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
    }

    require '../../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton-verde">Volver al admin</a>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Título Propiedad" required>

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" required>

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej:3" min="1" max="9" required>

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej:3" min="1" max="9" required>

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej:3" min="0" max="9" required>
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select>
                    <option selected disabled>-- Elegir vendedor</option>
                    <option value="1">Ana</option>
                    <option value="2">Andreas</option>
                    <option value="3">Juanjo</option>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton-amarillo">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>
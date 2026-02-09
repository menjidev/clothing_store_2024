<?php 
if(isset($_SESSION['email']) && $_SESSION['estado'] == 'OK' && $_SESSION['tipo_usuario'] == 'administrador'){ 
    echo '
    <main class="main-content">
        <div id="modal2" class="modal2">
            <div class="modal-content2">
                <div class="encabezado_modal_registro2">
                    <h2 class="estilos_encabezado_modal2">Registro</h2>
                    <i class="fas fa-times close2 estilos_encabezado_modal2 estilo3" id="closeModal2"></i>
                </div>
                <div class="centrar_formulario_modal2">
                    <form id="registerForm2" method="post" action="tu_archivo.php">
                        <label for="nombre2">Nombre:</label>
                        <input type="text" id="nombre2" name="nombre" required>
                        
                        <label for="apellidos2">Apellidos:</label>
                        <input type="text" id="apellidos2" name="apellidos" required>
                        
                        <label for="password2">Contraseña:</label>
                        <input type="password" id="password2" name="password" required>
                        
                        <label for="confirmPassword2">Repetir contraseña:</label>
                        <input type="password" id="confirmPassword2" name="confirmPassword" required>
                        
                        <label for="email2">Email:</label>
                        <input type="email" id="email2" name="email" required>
                        
                        <br>
                        <input type="submit" name="registrarse">
                        <br>
                    </form>
                </div>
            </div>
        </div>

        <div class="contenedor_general_añadir_producto">
            <div class="contenedor_mitad_recuadro_añadir_fotografia">
                <img id="previewImg" src="images/16410.png" alt="">
            </div>
            <div class="contenedor_mitad_recuadro_añadir_formulario">
                <div class="opcion_formulario">
                    <button class="btn_añadir_foto" id="btnAbrirModal" onclick="abrirmodal_añadirfoto()">Añadir foto</button>
                </div>
                <form action="principal.php?pagina=main_añadir_producto" method="post" enctype="multipart/form-data" class="formulario_añadir_producto">
                    <div id="modal_añadir_producto" class="modal_añadir_producto">
                        <div class="modal_añadir_producto-content">
                            <div class="encabezado_modal_añadir_producto">
                                <h2 class="estilos_encabezado_modal_añadir_producto">Añadir Fotografía</h2>
                                <i class="fas fa-times close2 estilos_encabezado_modal2 estilo3" id="closeModal2" onclick="cerrarmodal_añadirfoto()"></i>
                            </div>
                            <div class="centrar_formulario_modal_añadir_producto">
                                <div class="container">
                                    <div class="file-input-container">
                                        <label for="inputFoto" class="file-input-label">Seleccionar archivo</label>
                                        <input type="file" id="inputFoto" name="archivo" class="file-input" onchange="previewImage(event)" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="opcion_formulario">
                        <label for="nombreProducto">Nombre producto</label>
                        <input type="text" id="nombreProducto" name="nombreproducto" required>
                    </div>
                    <div class="opcion_formulario">
                        <label for="marcaProducto">Marca</label>
                        <input type="text" id="marcaProducto" name="marcaproducto" required>
                    </div>
                    <div class="opcion_formulario">
                        <label for="categoriaProducto">Categoría</label>
                        <select id="categoriaProducto" name="opcioncategoria" required>
                            <option value="Zapatillas">Zapatillas</option>
                            <option value="Abrigos">Abrigos</option>
                            <option value="Camisetas">Camisetas</option>
                            <option value="Accesorios">Accesorios</option>
                        </select>
                    </div>
                    <div class="opcion_formulario">
                        <label for="descripcionProducto">Descripción</label>
                        <textarea id="descripcionProducto" name="descripcion" rows="4"></textarea>
                    </div>
                    <div class="opcion_formulario">
                        <input type="submit" id="enviar_añadir_producto" name="añadirproducto" value="Enviar">
                    </div>
                </form>';
                
                if (isset($_POST['añadirproducto'])){ // Verifica que el boton de añadir producto ha sido pulsado
                    $nombreproducto = $_POST['nombreproducto']; 
                    $marcaproducto = $_POST['marcaproducto'];
                    $categoria = $_POST['opcioncategoria'];
                    $descripcion = $_POST['descripcion']; //Estas lineas guardan los datos obtenidos por el formulario
                    
                    if(!$_FILES['archivo']['error']){ // Esta línea dice: Si no hay errores al subir el archivo....
                        if(isset($_FILES) && !$_FILES['archivo']['error']){ // Si la imagen está definida y no hay errores al subirla...
                            $archivoExtension = pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION); // Esta línea obtiene la extensión del archivo subido. pathinfo se usa para obtener información sobre la ruta del archivo, y PATHINFO_EXTENSION devuelve la extensión del archivo.
                            $archivoName = $nombreproducto . '.' . $archivoExtension; // Juntamos nombre de archivo + extensión
                            $rutaCategoria = "images/$categoria/"; // Define la ruta de la categoría
                            $rutaMarca = $rutaCategoria . $marcaproducto . "/"; // Define la ruta de la categoría más la marca del producto
                            $ruta = "images/$categoria/$marcaproducto/"; // Define la ruta donde se guardará el archivo
                    
                            // Crear la carpeta de la categoría si no existe
                            if (!is_dir($rutaCategoria)) {
                                mkdir($rutaCategoria, 0777, true); // Comprueba si la carpeta de la categoría no existe (!is_dir($rutaCategoria)). Si no existe, la crea con mkdir, asignando permisos de 0777 (acceso completo) y el parámetro true que permite la creación de directorios recursivos.
                            }
                    
                            // Crear la carpeta de la marca dentro de la categoría si no existe
                            if (!is_dir($rutaMarca)) {
                                mkdir($rutaMarca, 0777, true); // Similar al paso anterior, verifica si la carpeta de la marca dentro de la categoría no existe. Si no existe, la crea de la misma manera.
                            }
                            move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta . $archivoName); // Finalmente esta línea guarda el archivo en la ruta correcta con el nombre del producto
                        }
                    }
                    $query = "INSERT INTO productos (nombre_producto, marca, categoria, descripcion, nombre_imagen) VALUES ('$nombreproducto', '$marcaproducto', '$categoria', '$descripcion', '$archivoName')";
                    
                    if (mysqli_query($enlace, $query)) {
                        echo '<script>alert("Archivo subido con éxito");</script>';
                        
                    } else {
                        echo '<script>alert("error");</script>';
                    }
                }

                echo '
            </div>
        </div>
    </main>';
} else {
    echo '
    <script>alert("No tienes permiso para ver este apartado")</script>';
}
?>

<?php
if (isset($_SESSION['email']) && $_SESSION['estado'] == 'OK' && $_SESSION['tipo_usuario'] == 'administrador') {
    echo '
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
                    <input type="submit" name="registrarse"></input>
                    <br>
                </form>
            </div>
        </div>
    </div>

    <main class="maintabla">';
    
    $query = "SELECT * FROM productos";
    
    if ($result = mysqli_query($enlace, $query)) {
        echo '
        <table>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Marca</th>
                <th>Categoría</th>
                <th>Modificaciones</th>
            </tr>';
            
        while ($fila = mysqli_fetch_array($result)) {
            echo '
            <tr>
                <td>' . $fila['nombre_producto'] . '</td>
                <td>'.$fila['descripcion'].'</td>
                <td>' . $fila['marca'] . '</td>
                <td>' . $fila['categoria'] . '</td>
                <td class="centradotabla">
                <a href="principal.php?pagina=main_añadir_tabla_productos&id=' . $fila['id_producto'] .'&accion=actualizar"><i class="fa-solid fa-pen-to-square editar"></i></a>
                <a href="principal.php?pagina=main_añadir_tabla_productos&id=' . $fila['id_producto'] .'&accion=eliminar"><i class="fa-solid fa-trash eliminar"></i></a>
                </td>
                
            </tr>';
        }
        
        echo '</table>';
    }

    if (isset($_GET['id']) && $_GET['accion'] == 'eliminar') {

        $id_producto = $_GET['id'];

        $query = "SELECT * FROM productos WHERE id_producto = $id_producto";

        if ($result = mysqli_query($enlace, $query)) {
            $fila = mysqli_fetch_array($result);

        echo '
        <div id="modal_eliminar" class="modal_actualizar" style="display: flex;">
                <div class="modal_añadir_producto-content">
                    <div class="encabezado_modal_añadir_producto">
                        <h2 class="estilos_encabezado_modal_añadir_producto">Eliminar Producto</h2>
                        <i class="fas fa-times close_actualizar estilos_encabezado_modal_añadir_producto estilo3 close2" onclick="cerrarmodal_eliminar()" id="closeModalActualizar"></i>
                    </div>
                    <div class="centrar_formulario_modal_añadir_producto">
                        <form id="form_eliminar" method="post" action="principal.php?pagina=main_añadir_tabla_productos">
                        <p style="font-size: 20px">De verdad quieres borrar <b>'.$fila['nombre_producto'].'</b> de tu base de datos?</p>
                            <input type="hidden" name="id" value="'.$id_producto.'">
                            <br>
                            <input type="submit" name="eliminarProducto" value="Eliminar" class="boton_subir_archivo">
                            <br>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                    document.getElementById("modal_eliminar");
                    function cerrarmodal_eliminar(){
                    modal_eliminar.style.display="none"
                    document.body.classList.remove("no-scroll")
                    window.location.href = "principal.php?pagina=main_añadir_tabla_productos";
                    }</script>
        ';

    }

}
    
    if (isset($_POST['eliminarProducto'])){
        $id_producto = $_POST['id'];
        $query = "DELETE FROM productos WHERE id_producto = '$id_producto'";
        
        if (mysqli_query($enlace, $query)) {
            echo '<script>alert("Producto Eliminado");
            window.location.href = "principal.php?pagina=main_añadir_tabla_productos";
            </script>';
            
        } else {
            echo '<script>alert("Error en la eliminacion")</script>';
        }
    
    
}



    if (isset($_GET['id']) && $_GET['accion'] == 'actualizar') {
        $id_producto = $_GET['id'];

        $query = "SELECT * FROM productos WHERE id_producto = $id_producto";

        if ($result = mysqli_query($enlace, $query)) {
            $fila = mysqli_fetch_array($result);

            echo '
            <div id="modal_actualizar" class="modal_actualizar" style="display: flex;">
                <div class="modal_añadir_producto-content">
                    <div class="encabezado_modal_añadir_producto">
                        <h2 class="estilos_encabezado_modal_añadir_producto">Editar Producto</h2>
                        <i class="fas fa-times close_actualizar estilos_encabezado_modal_añadir_producto estilo3 close2" onclick="cerrarmodal_actualizar()" id="closeModalActualizar"></i>
                    </div>
                    <div class="centrar_formulario_modal_añadir_producto">
                        <form id="form_actualizar" method="post" action="principal.php?pagina=main_añadir_tabla_productos">
                            <label for="nombreProducto">Nombre:</label>
                            <input type="text" id="nombreProducto" name="nombreProductoActualizar" value="' . $fila['nombre_producto'] . '" required>

                            <label for="marcaProducto">Marca:</label>
                            <input type="text" id="marcaProducto" name="marcaProductoActualizar" value="' . $fila['marca'] . '" required>

                            <label for="categoriaProducto">Categoría:</label>
                            <select id="categoriaProducto" name="categoriaProductoActualizar">
                                <option value="'.$fila['categoria'].'">'.$fila['categoria'].'</option>
                                <option value="Zapatillas">Zapatillas</option>
                                <option value="Abrigos">Abrigos</option>
                                <option value="Camisetas">Camisetas</option>
                                <option value="Accesorios">Accesorios</option>
                            </select>

                            <label for="estadoProducto">Estado:</label>
                            <select id="estadoProducto" name="estadoProductoActualizar">
                                <option value="visible">Visible</option>
                                <option value="oculto">Oculto</option>
                            </select>

                            <label for="estadoProducto">Descripción:</label>
                            <textarea name="descripcionProductoActualizar">' . $fila['descripcion'] . '</textarea>
                            <input type="hidden" name="id" value="'.$id_producto.'">
                            <br>
                            <input type="submit" name="actualizarProducto" value="Actualizar" class="boton_subir_archivo">
                            <br>
                        </form>
                    </div>
                </div>
            </div>
           
            <script>
                    document.getElementById("modal_actualizar");
                    function cerrarmodal_actualizar(){
                    modal_actualizar.style.display="none"
                    document.body.classList.remove("no-scroll")
                    window.location.href = "principal.php?pagina=main_añadir_tabla_productos";
                    }</script>
            ';
           
        }
    }

    if (isset($_POST['actualizarProducto'])) {
        $nombreProductoActualizar = $_POST['nombreProductoActualizar'];
        $marcaProductoActualizar = $_POST['marcaProductoActualizar'];
        $categoriaProductoActualizar = $_POST['categoriaProductoActualizar'];
        $descripcionProductoActualizar = $_POST['descripcionProductoActualizar'];
        $estadoProductoActualizar = $_POST['estadoProductoActualizar'];
        $id_producto = $_POST['id'];

        $query = "UPDATE productos SET 
              nombre_producto = '$nombreProductoActualizar', 
              marca = '$marcaProductoActualizar', 
              categoria = '$categoriaProductoActualizar', 
              descripcion = '$descripcionProductoActualizar'
          WHERE id_producto = '$id_producto'";

        if (mysqli_query($enlace, $query)) {
            echo '<script>alert("Actualización Correcta");
            window.location.href = "principal.php?pagina=main_añadir_tabla_productos";
            </script>';
            
        } else {
            echo '<script>alert("Error en la actualización")</script>';
        }
    }

    

    echo '</main>';
} else {
    echo '<script>alert("No tienes permiso para ver este apartado")</script>';
}



?>

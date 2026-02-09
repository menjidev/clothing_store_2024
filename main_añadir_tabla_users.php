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
    <main class="maintabla maintablados">';

    $query = "SELECT * FROM usuarios";

    if ($result = mysqli_query($enlace, $query)) {
        echo '
        <table>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Modificaciones</th>
            </tr>';
        
        while ($fila = mysqli_fetch_array($result)) {
            echo '
            <tr>
                <td>' . $fila['nombre_usuario'] . '</td>
                <td>' . $fila['email'] . '</td>
                <td>' . $fila['estado'] . '</td>
                <td class="centradotabla">
                    <a href="principal.php?pagina=main_añadir_tabla_users&iduser=' . $fila['id_usuario'] . '&accion=actualizar"><i class="fa-solid fa-pen-to-square editar"></i></a>
                    <a href="principal.php?pagina=main_añadir_tabla_users&iduser=' . $fila['id_usuario'] . '&accion=eliminar"><i class="fa-solid fa-trash eliminar"></i></a>
                </td>
            </tr>';
        }
        
        echo '</table>';
    }

    if (isset($_GET['iduser']) && $_GET['accion'] == 'actualizar') {
        $id_usuario = $_GET['iduser'];

        $query = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario";

        if ($result = mysqli_query($enlace, $query)) {
            $fila = mysqli_fetch_array($result);
        
        echo '<div id="modal_editar_usuario" class="modal_actualizar" style="display: flex;">
                <div class="modal_añadir_producto-content">
                    <div class="encabezado_modal_añadir_producto">
                        <h2 class="estilos_encabezado_modal_añadir_producto">Editar Usuario</h2>
                        <i class="fas fa-times close_actualizar estilos_encabezado_modal_añadir_producto estilo3 close2" onclick="cerrarmodal_actualizar_usuarios()" id="closeModalActualizar"></i>
                    </div>
                    <div class="centrar_formulario_modal_añadir_producto">
                        <form id="form_editar_user" method="post" action="principal.php?pagina=main_añadir_tabla_users">
                        
                            <label for="nombreProducto">Nombre:</label>
                            <input type="text" id="nombreProducto" name="nombreUsuarioActualizar" value="' . $fila['nombre_usuario'] . '" required>

                            <label for="marcaProducto">Marca:</label>
                            <input type="text" id="marcaProducto" name="emailUsuarioActualizar" value="' . $fila['email'] . '" required>

                            <label for="estadoProducto">Estado:</label>
                            <select id="estadoProducto" name="estadoUsuarioActualizar">
                                <option value="NO">'.$fila['estado'].'</option>
                                <option value="OK">OK</option>
                            </select>

                            <input type="hidden" name="id" value="'.$id_usuario.'">
                            <input type="submit" name="ActualizarUsuario" value="Actualizar" class="boton_subir_archivo">
                            <br>
                        </form>
                    </div>
                </div>
            </div>
            
            <script>
                    document.getElementById("modal_editar_usuario");
                    function cerrarmodal_actualizar_usuarios(){
                    modal_editar_usuario.style.display="none"
                    document.body.classList.remove("no-scroll")
                    window.location.href = "principal.php?pagina=main_añadir_tabla_users";
                    }</script>
            
            
            ';
            }
        }

        if (isset($_POST['ActualizarUsuario'])){
        $id_usuario = $_POST['id']; 
        $nombreUsuarioActualizar = $_POST['nombreUsuarioActualizar'];
        $emailUsuarioActualizar = $_POST['emailUsuarioActualizar'];
        $estadoUsuarioActualizar = $_POST['estadoUsuarioActualizar'];

        $query = "UPDATE usuarios SET nombre_usuario = '$nombreUsuarioActualizar', email = '$emailUsuarioActualizar', estado = '$estadoUsuarioActualizar'
        WHERE id_usuario = $id_usuario
        ";

        if (mysqli_query($enlace, $query)) {
            echo '<script>alert("Actualización Correcta");
            window.location.href = "principal.php?pagina=main_añadir_tabla_users";
            </script>';
            
        } else {
            echo '<script>alert("Error en la actualización")</script>';
        }
    }


    if (isset($_GET['iduser']) && $_GET['accion'] == 'eliminar') {
        $id_usuario = $_GET['iduser'];

        $query = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario";

        if ($result = mysqli_query($enlace, $query)) {
            $fila = mysqli_fetch_array($result);

            echo '<div id="modal_eliminar_usuario" class="modal_actualizar" style="display: flex;">
                <div class="modal_añadir_producto-content">
                    <div class="encabezado_modal_añadir_producto">
                        <h2 class="estilos_encabezado_modal_añadir_producto">Eliminar Producto</h2>
                        <i class="fas fa-times close_actualizar estilos_encabezado_modal_añadir_producto estilo3 close2" onclick="cerrarmodal_eliminar_usuario()" id="closeModalActualizar"></i>
                    </div>
                    <div class="centrar_formulario_modal_añadir_producto">
                        <form id="form_eliminar" method="post" action="principal.php?pagina=main_añadir_tabla_users">
                        <p style="font-size: 20px">De verdad quieres borrar a <b>'.$fila['nombre_usuario'].'</b> de tu base de datos?</p>
                            <input type="hidden" name="id" value="'.$id_usuario.'">
                            <br>
                            <input type="submit" name="eliminarUsuario" value="Eliminar" class="boton_subir_archivo">
                            <br>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                    document.getElementById("modal_eliminar_usuario");
                    function cerrarmodal_eliminar_usuario(){
                    modal_eliminar_usuario.style.display="none"
                    document.body.classList.remove("no-scroll")
                    window.location.href = "principal.php?pagina=main_añadir_tabla_users";
                    }</script>
            ';
    }
    }

    if (isset($_POST['eliminarUsuario'])){
        $id_usuario = $_POST['id'];
        $query = "DELETE FROM usuarios WHERE id_usuario = '$id_usuario'";
        
        if (mysqli_query($enlace, $query)) {
            echo '<script>alert("Usuario Eliminado");
            window.location.href = "principal.php?pagina=main_añadir_tabla_users";
            </script>';
            
        } else {
            echo '<script>alert("Error en la eliminacion")</script>';
        }
    
    
}
    
    echo '</main>';
} else {
    echo '<script>alert("No tienes permiso para ver este apartado")</script>';
}
?>
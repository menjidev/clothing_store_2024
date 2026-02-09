<?php                  
if(isset($_SESSION['email']) && $_SESSION['estado'] == 'OK' && $_SESSION['tipo_usuario'] == 'user'){

    $id_usuario_sesion = $_SESSION['id_usuario'];

    $query = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario_sesion";


    if ($result = mysqli_query($enlace,$query)){
        if($fila = mysqli_fetch_array($result)){
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


    <main class="main-content">
        

        <div class="contenedor_general_añadir_producto ajustar_height">
            <h3 style="color: #F35B25!important">Mis Datos</h3>
            <div class="contenedor_mitad_recuadro_añadir_formulario">
            
                <form action="principal.php?pagina=main_mi_cuenta" method="post" class="formulario_añadir_producto">
                    
                <div class="opcion_formulario">
                        <input type="hidden" id="id_usuario_actualizar" name="id_usuario_actualizar" value="'.$fila['id_usuario'].'" required>
                    </div>

                    <div class="opcion_formulario">
                        <label for="nombreProducto">Nombre</label>
                        <input type="text" id="minombreusuario" name="minombreusuario" value="'.$fila['nombre_usuario'].'" required>
                    </div>

                    <div class="opcion_formulario">
                        <label for="marcaProducto">Apellidos</label>
                        <input type="text" id="miapellidousuario" name="miapellidousuario" value="'.$fila['apellido_usuario'].'" required>
                    </div>

                    <div class="opcion_formulario">
                        <label for="categoriaProducto">Email</label>
                        <input type="text" id="miemailusuario" name="miemailusuario" value="'.$fila['email'].'" required>
                    </div>

                    <div class="opcion_formulario">
                        <input type="submit" id="editarUsuario" name="editarUsuario" value="Actualizar">
                    </div>
                    <div class="opcion_formulario">
                        <form action="principal.php" method="post">
                        <input type="submit" name="cerrarsesion" value="Cerrar sesion">
                        </form>
                    </div>';

                    // if (isset($_POST['cerrarsesion'])){
                    //     session_destroy();
                    //     header("Location: principal.php");
                    // }    
                    
                echo'
                </form>
                
                </main><br><br><br>'; 
        }
    }   

    if (isset($_POST['editarUsuario'])){
        $miNombreUsuario = $_POST['minombreusuario'];
        $miApellidoUsuario = $_POST['miapellidousuario'];
        $miEmailUsuario = $_POST['miemailusuario'];
        $id_usuario_actualizar = $_POST['id_usuario_actualizar'];

    $query = "UPDATE usuarios SET nombre_usuario = '$miNombreUsuario', apellido_usuario = '$miApellidoUsuario', email = '$miEmailUsuario'
    WHERE id_usuario = '$id_usuario_actualizar'";   
    
    if (mysqli_query($enlace, $query)) {
        echo '<script>alert("Actualización Correcta");
        window.location.href = "principal.php?pagina=main_mi_cuenta";
        </script>';
        
    } else {
        echo '<script>alert("Error en la actualización")</script>';
    }
}

    }

?>
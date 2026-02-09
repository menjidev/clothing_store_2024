<?php 
echo '
   <div class="formulario_busqueda">
    <form id="formBusqueda" action="" method="post">
        <div class="busqueda-input-container">
            <input type="search" id="inputBusqueda" name="busqueda" placeholder="Buscar...">
            <button type="submit" name="buscador_main" id="botonBusqueda"><i class="fas fa-search"></i></button>
        </div>
    </form>
    </div>
            <script>
            document.getElementById("botonBusqueda").addEventListener("click", 
            function(e) {
            e.preventDefault(); // Evita que se envíe el formulario de manera predeterminada
            document.getElementById("formBusqueda").submit();
            </script>
    ';

   

    echo'
    <main class="main-content ajustar_height">';

    echo '
    <div id="modal2" class="modal2">
        <div class="modal-content2">
            <div class="encabezado_modal_registro2">
                <h2 class="estilos_encabezado_modal2">Registro</h2>
                <i class="fas fa-times close2 estilos_encabezado_modal2 estilo3" id="closeModal2"></i>
            </div>
            <div class="centrar_formulario_modal2">
                <form id="registerForm2" method="post" action="principal.php?pagina=main" onsubmit="return validarFormulario()">
                    <label for="nombre2">Nombre:</label>
                    <input type="text" id="nombre2" name="nombreRegistro" required>

                    <label for="apellidos2">Apellido:</label>
                    <input type="text" id="apellidos2" name="apellidosRegistro" required>

                    <label for="password2">Contraseña:</label>
                    <input type="password" id="password2" name="password" required>

                    <label for="confirmPassword2">Repetir contraseña:</label>
                    <input type="password" id="confirmPassword2" name="confirmPasswordRegistro" required>
                    <span id="mensaje-contra" style="color:red;"></span>

                    <label for="email2">Email:</label>
                    <input type="email" id="email2" name="emailRegistro" required>

                    <br>
                    <input type="submit" name="registrarse"></input>
                    <br>
                </form>
                
            </div>
        </div>
    </div>
    <script>
    function validarFormulario() {
        var password = document.getElementById("password2").value;
        var confirmPassword = document.getElementById("confirmPassword2").value;

        if (password !== confirmPassword) {
            document.getElementById("mensaje-contra").innerHTML = "Las contraseñas no coinciden";
            return false;
        } else {
            document.getElementById("mensaje-contra").innerHTML = "";
            return true;
        }
    }
    </script>
';

if (isset($_POST['registrarse'])) {
    $nombreRegistro = addslashes(htmlspecialchars($_POST['nombreRegistro']));
    $apellidosRegistro = addslashes(htmlspecialchars($_POST['apellidosRegistro']));
    $emailRegistro = addslashes(htmlspecialchars($_POST['emailRegistro']));
    $passwordRegistro = hash('md5', $_POST['password']); // Hashear la contraseña original

    $query = "INSERT INTO usuarios (nombre_usuario, apellido_usuario, email, contraseña) 
              VALUES ('$nombreRegistro', '$apellidosRegistro', '$emailRegistro', '$passwordRegistro')";

    if (mysqli_query($enlace, $query)) {
        echo '<script>alert("Usuario registrado, dentro de poco nuestro equipo verificará tu acceso");</script>';
    } else {
        echo '<script>alert("Error en el registro");</script>';
    }
}

if (isset($_POST['buscador_main']) || isset($_POST['buscador_main2'])){
    $busqueda = $_POST['busqueda'];

$query = "SELECT * FROM productos WHERE marca LIKE '%$busqueda%'";

if ($result = mysqli_query($enlace, $query)) {

    while ($fila = mysqli_fetch_array($result)) {
        echo '
        <div class="card">
        <img class="altoancho" src="images/' . $fila['categoria'] . '/' . $fila['marca'] . '/' . $fila['nombre_imagen'] . '" alt="Fotografía">
        <div class="card-content">
            <div class="card-title">
                <h4>' . $fila['marca'] . '</h4>';
                if(isset($_SESSION['email']) && $_SESSION['estado'] == 'OK' && $_SESSION['tipo_usuario'] == 'administrador'){
                echo '<a href="principal.php?main&idparaeliminar='.$fila['id_producto'].'><i class="fa-solid fa-circle-xmark"></i></a>';

                if (isset($_GET['idparaeliminar'])){
                    $id = $_GET['idparaeliminar'];
                    $query = "DELETE FROM productos WHERE id_producto = '$id_producto'";

                     if ($result = mysqli_query($enlace, $query)) {
                     $fila = mysqli_fetch_array($result);

                     if (mysqli_query($enlace, $query)) {
                        echo '<script>alert("Producto Eliminado");
                        window.location.href = "principal.php?pagina=main_añadir_tabla_productos";
                        </script>';
                        
                    } else {
                        echo '<script>alert("Error en la eliminacion")</script>';
                    }
                }
            }

                echo'
                        <i class="fa-solid fa-lock"></i>
                ';    
                }
                if(isset($_SESSION['email']) && $_SESSION['estado'] == 'OK' && $_SESSION['tipo_usuario'] == 'user'){
                echo'
                
                <a href="principal.php?main&idproducto='.$fila['id_producto'].'"><i class="fa-regular fa-heart" id=""></i></a>';
                    if (isset($_GET['idproducto'])){
                        $usuario = $_SESSION['id_usuario'];
                        $id = $_GET['idproducto'];
                        
                    $query = "INSERT INTO favoritos (id_usuario, id_producto) VALUES ('$usuario', '$id_producto')";
                    
                    if ($result = mysqli_query($enlace, $query)) {
                        $fila = mysqli_fetch_array($result);
                    }

                    }
                
            }
                echo'

                
            </div>
            <div class="card-description">
                Tallas 36-45
            </div>
        </div>
        </div>
       ';
    }
   
}
}


    
else{       
    
$query = "SELECT * FROM productos";
    
    if ($result = mysqli_query($enlace, $query)) {

        while ($fila = mysqli_fetch_array($result)) {
            echo '
            <div class="card">
            <img class="altoancho" src="images/' . $fila['categoria'] . '/' . $fila['marca'] . '/' . $fila['nombre_imagen'] . '" alt="Fotografía">
            <div class="card-content">
                <div class="card-title">
                    <h4>' . $fila['marca'] . '</h4>';
                    if (isset($_SESSION['email']) && $_SESSION['estado'] == 'OK' && $_SESSION['tipo_usuario'] == 'administrador') {
                        echo '<a href="principal.php?main&idparaeliminar='.$fila['id_producto'].'"><i class="fa-solid fa-circle-xmark"></i></a>';
                    
                        if (isset($_GET['idparaeliminar'])) {
                            $id = $_GET['idparaeliminar'];
                    
                            if (isset($_GET['idparaeliminar'])) {
                                $id_producto = $_GET['idparaeliminar'];
                    
                                $query = "SELECT * FROM productos WHERE id_producto = $id_producto";
                    
                                if ($result = mysqli_query($enlace, $query)) {
                                    $fila = mysqli_fetch_array($result);
                    
                                    echo '
                                    <div id="modal_eliminar2" class="modal_actualizar" style="display: flex;">
                                        <div class="modal_añadir_producto-content">
                                            <div class="encabezado_modal_añadir_producto">
                                                <h2 class="estilos_encabezado_modal_añadir_producto">Eliminar Producto</h2>
                                                <i class="fas fa-times close_actualizar estilos_encabezado_modal_añadir_producto estilo3 close2" onclick="cerrarmodal_eliminar()" id="closeModalActualizar"></i>
                                            </div>
                                            <div class="centrar_formulario_modal_añadir_producto">
                                                <form id="form_eliminar" method="post" action="principal.php?pagina=main_añadir_tabla_productos&accion=confirmar_eliminacion">
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
                                        function cerrarmodal_eliminar() {
                                            document.getElementById("modal_eliminar2").style.display = "none";
                                            document.body.classList.remove("no-scroll");
                                            window.location.href = "principal.php?pagina=main";
                                        }
                                    </script>
                                    ';
                                }
                            }
                    
                            if (isset($_POST['eliminarProducto']) && isset($_POST['id'])) {
                                $id_producto = $_POST['id'];
                                $query = "DELETE FROM productos WHERE id_producto = '$id_producto'";
                    
                                if (mysqli_query($enlace, $query)) {
                                    echo '<script>
                                        alert("Producto Eliminado");
                                        window.location.href = "principal.php?pagina=main_añadir_tabla_productos";
                                    </script>';
                                } else {
                                    echo '<script>alert("Error en la eliminación")</script>';
                                }
                            }
                        }
                    }
                    if (isset($_SESSION['email']) && $_SESSION['estado'] == 'OK' && $_SESSION['tipo_usuario'] == 'user') {
                        echo '
                    <a href="principal.php?main&idproducto='.$fila['id_producto'].'"><i class="fa-regular fa-heart" onclick="cambiaricono('.$fila['id_producto'].')" id="icono_corazon'.$fila['id_producto'].'"></i></a>';
                   
                }
                
                    echo'
                </div>
                <div class="card-description">
                '.$fila['descripcion'].'
                    
                </div>
            </div>
            </div>
           ';
        }
        if (isset($_GET['idproducto'])){
            $usuario = $_SESSION['id_usuario'];
            $id = $_GET['idproducto'];
            
        $query = "INSERT INTO favoritos (id_usuario, id_producto) VALUES ('$usuario', '$id')";
        

        if (mysqli_query($enlace, $query)) {
            echo '<script>alert("Producto añadido a favoritos")</script>';

        } else {
            echo '<script>alert("Error")</script>';
        }
    }
    }

}
    echo'
    </main>';


?>
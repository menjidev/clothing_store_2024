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
    <main class="main-content  ajustar_height">';

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
                echo '<i class="fa-solid fa-circle-xmark"></i>
                        <i class="fa-solid fa-lock"></i>
                ';    
                }
                if(isset($_SESSION['email']) && $_SESSION['estado'] == 'OK' && $_SESSION['tipo_usuario'] == 'user'){
                echo'
                
                <i class="fa-regular fa-heart" onclick="cambiar_icono()" id="corazon_vacio"></i>';

                
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
    
$query = "SELECT * FROM productos WHERE categoria = 'abrigos'";
    
    if ($result = mysqli_query($enlace, $query)) {

        while ($fila = mysqli_fetch_array($result)) {
            echo '
            <div class="card">
            <img class="altoancho" src="images/' . $fila['categoria'] . '/' . $fila['marca'] . '/' . $fila['nombre_imagen'] . '" alt="Fotografía">
            <div class="card-content">
                <div class="card-title">
                    <h4>' . $fila['marca'] . '</h4>';
                    if(isset($_SESSION['email']) && $_SESSION['estado'] == 'OK' && $_SESSION['tipo_usuario'] == 'administrador'){
                    echo '<i class="fa-solid fa-circle-xmark"></i>
                            <i class="fa-solid fa-lock"></i>
                    ';    
                    }
                    if (isset($_SESSION['email']) && $_SESSION['estado'] == 'OK' && $_SESSION['tipo_usuario'] == 'user') {
                        echo '
        <div>
            <a href="">
                <i class="fa-regular fa-heart" " id="corazon_vacio'.$fila['id_producto'].'"></i>
            </a>
        </div>
    ';

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
       
    }

}
    echo'
    </main>';


?>
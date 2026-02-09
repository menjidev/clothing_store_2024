<?php   
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
</div>';
if (isset($_SESSION['email']) && $_SESSION['estado'] == 'OK' && $_SESSION['tipo_usuario'] == 'user') { 
echo' <main class="maintabla maintablados">';

$query = "SELECT productos.nombre_producto, productos.marca, productos.descripcion, productos.id_producto
          FROM favoritos
          INNER JOIN productos ON favoritos.id_producto = productos.id_producto
          INNER JOIN usuarios ON favoritos.id_usuario = usuarios.id_usuario
          WHERE usuarios.id_usuario = " . $_SESSION['id_usuario'];


if ($result = mysqli_query($enlace, $query)) {
    echo '
    <table>
        <tr>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Descripción</th>
            <th>Modificar</th>
        </tr>';
    
    while ($fila = mysqli_fetch_array($result)) {
        echo '
        <tr>
            <td>' . $fila['nombre_producto'] . '</td>
            <td>' . $fila['marca'] . '</td>
            <td>' . $fila['descripcion'] . '</td>
            <td class="centradotabla">
                <a href="principal.php?pagina=main_favoritos&id=' . $fila['id_producto'] .'"><i class="fa-solid fa-trash eliminar"></i></a>
                </td>
            </tr>';
    }
    if (isset($_GET['id'])){
        $id = $_GET['id'];

    $query = "DELETE FROM favoritos WHERE id_producto = '$id'";

    if (mysqli_query($enlace, $query)) {
       echo '';
    } else {
        echo "Error en la consulta: " . mysqli_error($enlace);
    }
    }
}
    echo '</table>';


echo '</main>';
}





?>
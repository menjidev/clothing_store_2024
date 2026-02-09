<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Store</title>
    <link rel="stylesheet" href="css/css.css">
    <script src="https://kit.fontawesome.com/4bedf95414.js" crossorigin="anonymous"></script>
</head>
<body>
<?php  
$host_name  = "localhost";    
$database   = "e-commerce";
$user_name  = "root";
$password   = "";

$enlace = mysqli_connect($host_name, $user_name, $password, $database);    
if(mysqli_connect_errno()){

 echo 'Error al conectar: '.mysqli_connect_error();

}

header("Content-Type: text/html;charset=utf-8");
$enlace->query("SET NAMES 'utf8'");

session_start();

if ((isset($_GET['pagina']))){
    $pagina = $_GET['pagina'].'.php';
}
else{

    $pagina = 'main.php';
}

include 'nav_desplegable.php';
include 'header.php';
include 'nav.php';
echo' <div class="ajustarfooter">';
include $pagina;
include 'footer.php';
echo '</div>';

 if (isset($_POST['cerrarsesion'])){
            session_destroy();
            echo'
            <script>
            window.location.href = "principal.php?pagina=main";
            </script>
            ';
        } 

//SI DEJA DE FUNCIONAR QUITAR EL CIERRE DE CONEXION 
 mysqli_close($enlace);

?>
<script src="js/js copy.js"></script>
</body>
</html>
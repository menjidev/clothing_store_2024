<?php 
echo ' <nav class="mobile_nav_desplegable" id="menu_desplegable">
        <div class="contenedor_encabezado_desplegable width100">
            <div class="contenedor_logo_desplegable padding10"><img src="images/logoclothingstorepng.png" class="logopequeño" alt=""></div>
            <div class="contenedor_search_desplegable" id="buscador_desplegable">
                <div class="formulario_busqueda">
                    <form id="formBusqueda2" action="" method="post">
                        <div class="busqueda-input-container">
                            <input type="search" id="inputBusqueda2" name="busqueda" class="nuevoancho" placeholder="Buscar...">
                            <button type="submit" name="buscador_main2" id="botonBusqueda2"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    </div>
            <script>
            document.getElementById("botonBusqueda2").addEventListener("click", 
            function(e) {
            e.preventDefault(); // Evita que se envíe el formulario de manera predeterminada
            document.getElementById("formBusqueda2").submit();
            cerrar_menu();

            </script>';
            
            
            echo'
            </div>
            <div class="contenedor_cerrar_desplegable centrar_vertical_dos" id="icono_cerrar_desplegable_menu">
                <i class="fa-solid fa-xmark orange_detalle tamaño24"></i>
            </div>
        </div>
        <div class="opciones_menu_desplegable">
            <div class="contenedor_imagen_opcion_menu_desplegable"><img src="images/new-svg.png" alt=""></div>
           <a href="principal.php?pagina=main"><p>TODOS LOS PRODUCTOS</p></a>
        </div>
        <div class="opciones_menu_desplegable">
            <div class="contenedor_imagen_opcion_menu_desplegable"><img src="images/icon_shoes_sneakers-svg.png" alt=""></div>
            <a href="principal.php?pagina=main_zapatillas"><p>ZAPATILLAS</p></a>
        </div>
        <div class="opciones_menu_desplegable">
            <div class="contenedor_imagen_opcion_menu_desplegable"><img src="images/icon_tshirt10-svg.png" alt=""></div>
            <a href="principal.php?pagina=main_camisetas"><p>CAMISETAS</p></a>
        </div>
        <div class="opciones_menu_desplegable">
            <div class="contenedor_imagen_opcion_menu_desplegable"><img src="images/icon_tshirt10-svg.png" alt=""></div>
            <a href="principal.php?pagina=main_abrigos"><p>ABRIGOS</p></a>
        </div>
        <div class="opciones_menu_desplegable">
            <div class="contenedor_imagen_opcion_menu_desplegable"><img src="images/icon_cap-svg.png" alt=""></div>
            <a href="principal.php?pagina=main_accesorios"><p>ACCESORIOS</p></a>
        </div>';
        
        if(isset($_SESSION['email']) && $_SESSION['estado'] == 'OK' && $_SESSION['tipo_usuario'] == 'administrador'){
            echo'
            
            <div class="opciones_menu_desplegable gris" id="lista_de_usuarios">
            <div class="contenedor_imagen_opcion_menu_desplegable"><i class="fa-solid fa-user masgrande"></i></div>
            <p class="maspadding"><a href="principal.php?pagina=main_añadir_tabla_users">LISTA DE USUARIOS</a></p>
            </div>

            <div class="opciones_menu_desplegable gris" id="lista_de_productos">
            <div class="contenedor_imagen_opcion_menu_desplegable"><i class="fa-solid fa-key masgrande"></i></div>
            <p class="maspadding"><a href="principal.php?pagina=main_añadir_tabla_productos">LISTA DE PRODUCTOS</a></p>
            </div>

            <div class="opciones_menu_desplegable gris" id="añadir_producto">
            <div class="contenedor_imagen_opcion_menu_desplegable"><i class="fa-solid fa-database masgrande"></i></div>
            <p class="maspadding"><a href="principal.php?pagina=main_añadir_producto">AÑADIR PRODUCTO</a></p>
            </div>'
            
            ;
        }
        elseif(isset($_SESSION['email']) && $_SESSION['estado'] == 'OK' && $_SESSION['tipo_usuario'] == 'user'){
            echo '
            <div class="opciones_menu_desplegable gris" id="micuenta">
            <div class="contenedor_imagen_opcion_menu_desplegable"><i class="fa-solid fa-user masgrande"></i></div>
            <p class="maspadding"><a href=principal.php?pagina=main_mi_cuenta>MI CUENTA</a></p>
            </div>
            </div>
            ';
            }

            else{
                echo'
            <div class="opciones_menu_desplegable gris" id="registrate_desplegable">
            <div class="contenedor_imagen_opcion_menu_desplegable"><i class="fa-solid fa-user masgrande"></i></div>
            <p class="maspadding">MI CUENTA</p>
            </div>
            </div>';
        }
        if(isset($_SESSION['email']) && $_SESSION['estado'] == 'OK'){
            echo'<div class="contenedor_cerrar_sesion ">
                <form action="principal.php" method="post">
                <input type="submit" name="cerrarsesion" value="Cerrar sesion">
                </form>';
        if (isset($_POST['cerrarsesion'])){
            session_destroy();
            echo'
            <script>
            window.location.href = "principal.php?pagina=main";
            </script>
            
            ';
        }    
        }

        echo'
        
    </nav>';
?>
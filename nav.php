<?php 
echo ' <nav class="mobile_nav">
        <div class="contenedor_icono_izquierda" id="icono_menu"><i class="fa-solid fa-bars"></i></div>
        <div class="contenedor_iconos_derecha_multiple">';
        if(isset($_SESSION['email']) && $_SESSION['estado'] == 'OK' && $_SESSION['tipo_usuario'] == 'administrador'){
            echo'<div class="contenedor_icono_derecha" id="icono_corazon"><a href="principal.php?pagina=main_añadir_producto"><i class="fa-solid fa-database"></a></i></div>
            <div class="contenedor_icono_derecha" id="icono_llave"><a href="principal.php?pagina=main_añadir_tabla_productos"><i class="fa-solid fa-key"></i></a></div>
            <div class="contenedor_icono_derecha" id="lista_usuarios2"><a href="principal.php?pagina=main_añadir_tabla_users"><i class="fa-solid fa-user"></a></i></div>';
        }

        elseif(isset($_SESSION['email']) && $_SESSION['estado'] == 'OK' && $_SESSION['tipo_usuario'] == 'user'){


        echo '
       <div class="contenedor_icono_derecha" id="icono_favoritos"> <a href="principal.php?pagina=main_favoritos"><i class="fa-solid fa-heart"></i></a></div>
        <div class="contenedor_icono_derecha" id="mi_cuenta2"><a href="principal.php?pagina=main_mi_cuenta"><i class="fa-solid fa-user"></i></a></div>';
        }

        else{
            echo'
            <div class="contenedor_icono_derecha" id="icono_usuario"><i class="fa-solid fa-user"></i></div>';
        }
        
        echo'
        </div>
    </nav>
    <div class="modal_iniciar_sesion" id="modal_iniciar_sesion">
        
        <div class="encabezado_modal_registro">
            <h4 class="estilos_encabezado_modal">CONEXION/REGISTRO</h4>
            <i class="fa-solid fa-xmark orange_detalle tamaño24" id="icono_cerrar_modal"></i>

        </div>
    <div class="centrar_formulario_modal">
        <form method="post" action="#">
            <label for="username">Email:</label>
            <input type="email" id="username" name="email" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" name="entrar" value="Entrar"></input>
        </form>';
        if (isset($_POST['entrar'])){            
           
            $email =  addslashes(htmlspecialchars($_POST['email']));
            $pass =   hash('md5',$_POST['password']);

            $query = "SELECT * FROM usuarios WHERE email = '$email' AND contraseña = '$pass'";
            

				if ($result = mysqli_query($enlace,$query)){
                    
					if($fila = mysqli_fetch_array($result)){

					$_SESSION['nombre_usuario'] = $fila['nombre_usuario'];
                    $_SESSION['tipo_usuario'] = $fila['tipo_usuario'];
                    $_SESSION['apellido_usuario'] = $fila['apellido_usuario'];
                    $_SESSION['estado'] = $fila['estado'];
                    $_SESSION['email'] = $fila['email']; 
                    $_SESSION['id_usuario'] = $fila['id_usuario'];   
                    echo'
                    <script> window.location.href = "principal.php?pagina=main";</script>
                        ';
					}
                     else{
                        echo '<script>alert("Usuario o contraseña incorrectos")</script>';
                    }
				}
                
            

		}		
        

        echo '
        <div>
            <p>Si aun no estas registrado puedes hacerlo pulsando aquí:</p>
            <input type="submit" value="Registrarse" name="registrarse" id="openmodal2">
     </div>
    </div>
    </div>
';


?>
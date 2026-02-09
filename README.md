<img width="1898" height="905" alt="image" src="https://github.com/user-attachments/assets/3fd80432-d40e-4c4d-aa99-17f7b8175fe7" /># Clothing Store (2024)

Aplicación web desarrollada en 2024 para el proyecto final del certificado IFCD0210 que simula una tienda de ropa (e-commerce) con catálogo, autenticación de usuarios y área de administración. Proyecto orientado a practicar PHP + MySQL en entorno local con XAMPP.

## Descripción
Proyecto totalmente responsive que permite navegar por distintas secciones de productos, acceder a páginas por categoría y aplicar filtros por nombre y tipo de producto. Incluye un sistema de login/registro, donde las contraseñas se almacenan aplicando hashing. Además, desde el perfil de administrador se dispone de un panel para gestionar el contenido añadir productos a la base de datos desde la propia interfaz y realizar operaciones CRUD sobre los productos y los usuarios de la web.

No utiliza arquitectura MVC; la estructura está organizada por páginas PHP y componentes reutilizables (header/footer/nav).

## Tecnologías
- PHP (sin frameworks)
- MySQL
- HTML / CSS
- JavaScript
- XAMPP (Apache + MySQL)

## Funcionalidades
- Registro e inicio de sesión
- Hashing de contraseñas en el registro
- Catálogo de productos por secciones/categorías
- Favoritos
- Panel de administración (según permisos)

## Usuarios de prueba
Administrador:
- Email: `cristianmenjibar@gmail.com`
- Contraseña: `12345678`

Usuario:
- Email: `cristina@gmail.com`
- Contraseña: `1234`

## Instalación y ejecución (XAMPP)

### 1) Copiar el proyecto en htdocs
1. Copia la carpeta del proyecto en:
   - `C:\xampp\htdocs\clothing_store`

2. Inicia Apache y MySQL desde el panel de XAMPP.

### 2) Importar la base de datos
1. Abre phpMyAdmin:
   - `http://localhost/phpmyadmin`
2. Crea una base de datos (por ejemplo: `clothing_store`).
3. Importa el archivo SQL:
   - `BD/e-commerce(3).sql`

### 3) Abrir la aplicación
URL de entrada:
- `http://localhost/clothing_store/principal.php`

## Capturas de pantalla
## Capturas

<p align="center">
  <img src="screenshots/iPhone-13-PRO-localhost.png" alt="Clothing Store - captura 0" width="260">
</p>

<p align="center">
  <img src="screenshots/iPhone-13-PRO-localhost(1).png" alt="Clothing Store - captura 1" width="260">
</p>

<p align="center">
  <img src="screenshots/iPhone-13-PRO-localhost(2).png" alt="Clothing Store - captura 2" width="260">
</p>

<p align="center">
  <img src="screenshots/iPhone-13-PRO-localhost(3).png" alt="Clothing Store - captura 3" width="260">
</p>

<p align="center">
  <img src="screenshots/iPhone-13-PRO-localhost(4).png" alt="Clothing Store - captura 4" width="260">
</p>

<p align="center">
  <img src="screenshots/iPhone-13-PRO-localhost(5).png" alt="Clothing Store - captura 5" width="260">
</p>

<p align="center">
  <img src="screenshots/iPhone-13-PRO-localhost(6).png" alt="Clothing Store - captura 6" width="260">
</p>


## Notas
Este repositorio forma parte de mi portfolio. El contenido y estructura están enfocados a práctica y aprendizaje en PHP/MySQL.

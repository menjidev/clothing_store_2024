# Clothing Store (2024)

Aplicación web desarrollada en 2024 para el proyecto final del certificado IFCD0210 que simula una tienda de ropa (e-commerce) con catálogo, autenticación de usuarios y área de administración. Proyecto orientado a practicar PHP + MySQL en entorno local con XAMPP.

## Descripción
El proyecto permite navegar por diferentes secciones de productos, acceder a páginas de categoría, filtrar por nombre, tipo de producto y gestionar favoritos. Incluye sistema de login/registro, y el registro almacena contraseñas aplicando hashing. Ademas desde el perfil de administrador podremos añadir archivos a la base de datos directamente desde el panel.

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

## Notas
Este repositorio forma parte de mi portfolio. El contenido y estructura están enfocados a práctica y aprendizaje en PHP/MySQL.


var menu_desplegable = document.getElementById("menu_desplegable");
var icono_menu = document.getElementById("icono_menu");
var icono_cerrar = document.getElementById("icono_cerrar_desplegable_menu");
var modal_iniciar_sesion = document.getElementById("modal_iniciar_sesion");
var icono_usuario = document.getElementById("icono_usuario");
var icono_cerrar_modal = document.getElementById("icono_cerrar_modal");
var openmodal2 = document.getElementById("openmodal2");
var closeModal2 = document.getElementById("closeModal2");
var registrate_desplegable = document.getElementById("registrate_desplegable");
var modal_añadir_producto = document.getElementById("modal_añadir_producto");
// var btnAbrirModal = document.getElementById("btnAbrirModal");
// var spanCerrar = document.getElementById("cerrarModal_añadir_producto");
var modal_actualizar = document.getElementById("modal_actualizar");


function desplegar_menu() {
    document.body.classList.add("no-scroll");
    menu_desplegable.style.display = "block";
    setTimeout(function() {
        menu_desplegable.classList.add("active");
    }, 10); 
}

function cerrar_menu() {
    document.body.classList.remove("no-scroll");
    menu_desplegable.classList.remove("active");
    setTimeout(function() {
        if (!menu_desplegable.classList.contains("active")) {
            menu_desplegable.style.display = "none";
        }
    }, 500);
}

function desplegar_modal() {
    document.body.classList.add("no-scroll");
    modal_iniciar_sesion.classList.add("active");
}

function cerrar_modal() {
    document.body.classList.remove("no-scroll");
    modal_iniciar_sesion.classList.remove("active");
}

function abrirmodal_registro(){
    modal_iniciar_sesion.classList.remove("active");
    document.body.classList.add("no-scroll");
    setTimeout(function(){
        modal2.classList.add("active"); 
    },300)
}

function cerrar_modal_registro(){
    document.body.classList.remove("no-scroll");
    modal2.classList.remove("active");
    
}

function abrirmodal_registro2(){
    document.body.classList.remove("no-scroll");
    menu_desplegable.classList.remove("active");
    setTimeout(function() {
        if (!menu_desplegable.classList.contains("active")) {
            menu_desplegable.style.display = "none";
        }
    }, 500);
    modal_iniciar_sesion.classList.remove("active");
    document.body.classList.add("no-scroll");
    setTimeout(function(){
        modal2.classList.add("active"); 
    },550)
}

function abrirmodal_añadirfoto(){
    modal_añadir_producto.classList.add("active");
    document.body.classList.add("no-scroll");
}

function cerrarmodal_añadirfoto(){
    modal_añadir_producto.classList.remove("active")
    document.body.classList.remove("no-scroll");
}

// function abrirmodal_actualizar(){
//     alert (modal_actualizar);
//     modal_actualizar.classList.add("active");
//     document.body.classList.add("no-scroll");
// }



// function cerrarmodal_actualizar(){
//     modal_actualizar.classList.remove("active");
//     document.body.classList.remove("no-scroll");
// }

function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('previewImg');
        output.src = reader.result;
        modal_añadir_producto.classList.remove("active")
        document.body.classList.remove("no-scroll");
    }
    reader.readAsDataURL(event.target.files[0]);
}


function onSubmit(token) {
document.getElementById("registerForm2").submit(); // Envía el formulario
}

closeModal2.addEventListener("click", cerrar_modal_registro);
icono_menu.addEventListener("click", desplegar_menu);
icono_cerrar.addEventListener("click", cerrar_menu);
icono_usuario.addEventListener("click", desplegar_modal);
icono_cerrar_modal.addEventListener("click", cerrar_modal);
openmodal2.addEventListener("click", abrirmodal_registro);
modal_iniciar_sesion.addEventListener("click", function(event) {
    if (event.target === modal_iniciar_sesion) {
        cerrar_modal();
    }
});
registrate_desplegable.addEventListener("click", abrirmodal_registro2);


$('#updateModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var modal = $(this);
    modal.find('#update-id').val(id);
});

$('#deleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var modal = $(this);
    modal.find('#delete-id').val(id);
});

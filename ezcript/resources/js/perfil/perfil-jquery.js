// Código Javascript

function cambiarURL(input) {
    // Verificar si este input tiene alguna imagen
    if (input.files && input.files[0]) {
        var lector = new FileReader();

        lector.onload = function(e) {
            $("#foto-perfil").attr("src", e.target.result);
        }

        lector.readAsDataURL(input.files[0]);
        console.log("foto cambiada");
    }
}

function eliminarUsuario(evt) {

    $("input[name='operacion']").val("destroy");

    return true;
}

// swal({
//     title: "¿Estas seguro que quieres eliminar este perfil de forma permanente?",
//     showDenyButton: true,
//     denyButtonText: "Cancelar",
//     confirmButtonText: "Aceptar"
// }).then((result) => {
//     if (result.isConfirmed) {
//         $("input[name='operacion']").val("destroy");
//         return true;

//     } else {
//         return false;
//     }

// });

function desplegarAlertaEliminarUsuario(evt) {

}


// Código JQuery
$(document).ready(function() {

    // MOSTRAR/OCULTAR EL BOTÓN PARA GUARDAR LOS NUEVOS DATOS DEL PERFIL EN LA BASE DE DATOS 
    // $("#editar-perfil").click(function() {

    //     // Ocultar el boton de editar perfil
    //     $("#editar-perfil").addClass("d-none");

    //     // Ocultar el botón de eliminar perfil
    //     $("#eliminar-perfil").addClass("d-none");

    //     // Mostrar el botón para cancelar la operación
    //     $("#cancelar-editar-perfil").removeClass("d-none");

    //     // Mostrar el botón de guardar cambios
    //     $("#guardar-datos").removeClass("d-none");

    //     // Mostrar el botón para cambiar la foto
    //     $("#cambiar-foto").removeClass("d-none");

    //     // Mostrar el botón para alternar (mostrar/ocultar) la contraseña
    //     $("#alternar-contrasena").removeClass("d-none");

    //     // Cambiar el contenido de los campos teléfono, página web y 
    //     // descripción dependiendo se si tienen el valor "No tiene"
    //     if ($("input[name='pef_telefono']").val() == "No tiene") {
    //         $("input[name='pef_telefono']").val("");
    //     }
    //     if ($("input[name='pef_pagina_web']").val() == "No tiene") {
    //         $("input[name='pef_pagina_web']").val("");
    //     }
    //     if ($("input[name='pef_descripcion']").val() == "No tiene") {
    //         $("input[name='pef_descripcion']").val("");
    //     }

    //     // Volver editable todos los inputs del formulario 
    //     // para cambiar los datos del usuario
    //     $("input").addClass("form-control");
    //     $("input").not("input[name='rol_id']").removeClass("border-0");
    //     $("input").not("input[name='rol_id']").removeAttr("readonly");
    // });

    // // // MOSTRAR BOTÓN PARA EDITAR CAMPO
    // // $(".col-12").on("mouveover", function(event) {
    // //     $(event.target).children("button").eq(0).removeClass("d-none");
    // //     //$(event.relatedTarget).children("button").eq(0).addClass("d-none");
    // // });
    // // // OCULTAR BOTÓN PARA EDITAR CAMPO
    // // $(".col-12").on("mouseleave", function(event) {
    // //     $(event.target).children("button").eq(0).addClass("d-none");
    // //     //$(event.relatedTarget).children("button").eq(0).removeClass("d-none");
    // // });

    // CANCELAR LA OPERACIÓN DE EDITAR DATOS DEL PERFIL
    $("#cancelar-editar-perfil").click(function() {
        const idUsuario = $("input[name='pef_id']").val();
        window.location.replace("/ezcript/public/perfil/" + idUsuario);
    });

    // BOTÓN PARA CAMBIAR LA FOTO DE PERFIL
    $("input[name='pef_foto']").change(function() {

        // Ocultar el botón de eliminar perfil
        var btnEliminarPerfil = $("#eliminar-perfil");
        if (!btnEliminarPerfil.hasClass("d-none")) {
            btnEliminarPerfil.addClass("d-none");
        }

        // Mostrar el botón para cancelar la operación
        var btnCancelarEditarPerfil = $("#cancelar-editar-perfil");
        if (btnCancelarEditarPerfil.hasClass("d-none")) {
            btnCancelarEditarPerfil.removeClass("d-none");
        }

        // Mostrar el botón para guardar los datos
        var btnGuardarCambios = $("#guardar-datos");
        if (btnGuardarCambios.hasClass("d-none")) {
            btnGuardarCambios.removeClass("d-none");
        }

        // Mostrar la foto que fue seleccionada
        cambiarURL(this);

    });

    // EDITAR CAMPO
    $("[id='editar-campo']").click(function() {

        console.log("editando campo");
        // Ocultar el boton de editar perfil
        $(this).addClass("d-none");

        // Ocultar el botón de eliminar perfil
        var btnEliminarPerfil = $("#eliminar-perfil");
        if (!btnEliminarPerfil.hasClass("d-none")) {
            btnEliminarPerfil.addClass("d-none");
        }

        // Mostrar el botón para cancelar la operación
        var btnCancelarEditarPerfil = $("#cancelar-editar-perfil");
        if (btnCancelarEditarPerfil.hasClass("d-none")) {
            btnCancelarEditarPerfil.removeClass("d-none");
        }

        // Mostrar el botón para guardar los datos
        var btnGuardarCambios = $("#guardar-datos");
        if (btnGuardarCambios.hasClass("d-none")) {
            btnGuardarCambios.removeClass("d-none");
        }

        // Mostrar el botón para guardar los cambios

        // Cambiar el contenido de los campos teléfono, página web y 
        // descripción dependiendo se si tienen el valor "No tiene"
        var inputName = $(this).attr("input");
        var input = $("input[name='" + inputName + "']");
        if (input.val() == "No tiene") {
            input.val("");
        }

        // Volver editable el input
        input.addClass("form-control");
        input.removeClass("border-0");
        input.removeAttr("readonly");

    });
});
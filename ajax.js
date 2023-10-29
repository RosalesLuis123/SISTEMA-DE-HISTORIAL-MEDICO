$(document).ready(function () {
    // Manejar clic en "Pacientes"
    $("#mostrarPacientes").click(function (e) {
        e.preventDefault();
        $.ajax({
            url: "pacientes.php",
            type: "GET",
            success: function (data) {
                $("#contenido").html(data);
            }
        });
    });

    // Manejar clic en "Registro de Pacientes"
    $("#mostrarRegistro").click(function (e) {
        e.preventDefault();
        $.ajax({
            url: "registro.php",
            type: "GET",
            success: function (data) {
                $("#contenido").html(data);
            }
        });
    });

    // Manejar clic en "Borrar Paciente"
    $(document).on("click", "#borrarPaciente", function (e) {
        e.preventDefault();
        var idPaciente = $(this).data("id");

        // Realizar una solicitud AJAX para eliminar al paciente
        $.ajax({
            url: "borrar.php?id=" + idPaciente,
            type: "GET",
            success: function (data) {
                // Actualizar la vista de pacientes después de borrar
                $("#contenido").load("pacientes.php");
            }
        });
    });

    // Manejar clic en "Editar Paciente"
    $(document).on("click", "#editarPaciente", function (e) {
        e.preventDefault();
        var idPaciente = $(this).data("id");

        // Realizar una solicitud AJAX para cargar el formulario de edición
        $.ajax({
            url: "formu_editar.php?id=" + idPaciente,
            type: "GET",
            success: function (data) {
                $("#contenido").html(data);
            }
        });
    });

    // Manejar clic en "Crear Paciente"
    $(document).on("click", "#crearPaciente", function (e) {
        e.preventDefault();

        // Realizar una solicitud AJAX para cargar el formulario de creación
        $.ajax({
            url: "formu_crear.php",
            type: "GET",
            success: function (data) {
                $("#contenido").html(data);
            }
        });
    });

    // Agrega esto a ajax.js

// Manejar envío del formulario para crear un paciente




});

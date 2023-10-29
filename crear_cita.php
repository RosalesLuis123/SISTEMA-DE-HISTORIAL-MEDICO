<?php
include "conexion.php";

if (isset($_POST['crear_cita'])) {
    $fecha = $_POST['fecha'];
    $detalles = $_POST['detalles'];
    $doctor_id = $_POST['doctor'];
    $medicacion_id = $_POST['medicacion'];
    $examen_id = $_POST['examen'];
    $paciente_id = $_POST['paciente'];

    // Realizar la inserción de una nueva cita médica en la base de datos
    $insercion_query = "INSERT INTO cita (fecha, detalles, doctor_id, medicacion_id, examen_id, paciente_id) VALUES ('$fecha', '$detalles', $doctor_id, $medicacion_id, $examen_id, $paciente_id)";

    if ($con->query($insercion_query) === TRUE) {
        header("Location: citas.php"); // Redirigir a la página de citas después de crear la cita
        exit;
    } else {
        echo "Error al crear la cita: " . $con->error;
    }
}

// Cerrar la conexión a la base de datos
$con->close();
?>

<?php
include "conexion.php";

if (isset($_POST['crear'])) {
    $nombre = $con->real_escape_string($_POST['nombre']);
    $apellido = $con->real_escape_string($_POST['apellido']);
    $edad = intval($_POST['edad']);
    $tamano = floatval($_POST['tamano']);
    $peso = floatval($_POST['peso']);
    $sexo = $con->real_escape_string($_POST['sexo']);

    // Realizar la inserción de un nuevo paciente en la base de datos
    $insercion_query = "INSERT INTO pacientes (nombre, apellido, edad, tamano, peso, sexo) VALUES ('$nombre', '$apellido', $edad, $tamano, $peso, '$sexo')";

    if ($con->query($insercion_query) === TRUE) {
        // Redirigir a la página de pacientes después de crear
        header("Location: pacientes.php");
        exit;
    } else {
        echo "Error al crear el paciente: " . $con->error;
    }
}

// Cerrar la conexión a la base de datos
$con->close();
?>

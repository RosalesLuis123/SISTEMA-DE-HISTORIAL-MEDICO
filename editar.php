<?php
include "conexion.php";

if (isset($_POST['actualizar'])) {
    $id_paciente = $_GET['id'];
    $nuevo_nombre = $_POST['nuevo_nombre'];
    $nuevo_apellido = $_POST['nuevo_apellido'];
    $nueva_edad = $_POST['nueva_edad'];
    $nuevo_tamano = $_POST['nuevo_tamano'];
    $nuevo_peso = $_POST['nuevo_peso'];
    $nuevo_sexo = $_POST['nuevo_sexo'];

    // Realizar la actualización de los datos del paciente en la base de datos
    $actualizacion_query = "UPDATE pacientes SET nombre='$nuevo_nombre', apellido='$nuevo_apellido', edad=$nueva_edad, tamano=$nuevo_tamano, peso=$nuevo_peso, sexo='$nuevo_sexo' WHERE id=$id_paciente";

    if ($con->query($actualizacion_query) === TRUE) {
        header("Location: pacientes.php"); // Redirigir a la página de pacientes después de actualizar
    } else {
        echo "Error al actualizar el paciente: " . $con->error;
    }
}

// Cerrar la conexión a la base de datos
$con->close();
?>

<?php
include "conexion.php";

// Verificar si se ha pasado un ID de paciente para borrar
if (isset($_GET['id'])) {
    $id_paciente = $_GET['id'];
    
    // Realizar una consulta para eliminar el paciente
    $borrar_query = "DELETE FROM pacientes WHERE id = $id_paciente";
    
    if ($con->query($borrar_query) === TRUE) {
        header("Location: pacientes.php"); // Redirigir a la página de pacientes después de borrar
    } else {
        echo "Error al borrar el paciente: " . $con->error;
    }
} else {
    echo "No se proporcionó un ID válido para borrar.";
}

// Cerrar la conexión a la base de datos
$con->close();
?>

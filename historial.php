<?php
include "header.php"; 

include "conexion.php";

if (isset($_GET['id'])) {
    $paciente_id = $_GET['id'];

    // Consulta para obtener los datos del paciente
    $consultaPaciente = "SELECT * FROM pacientes WHERE id = $paciente_id";
    $resultPaciente = $con->query($consultaPaciente);

    if ($resultPaciente) {
        $paciente = $resultPaciente->fetch_assoc();
    } else {
        echo "Error al recuperar datos del paciente: " . $con->error;
    }

    // Consulta para obtener las citas del paciente
    $consultaCitas = "SELECT * FROM cita WHERE paciente_id = $paciente_id";
    $resultCitas = $con->query($consultaCitas);

    if (!$resultCitas) {
        echo "Error al recuperar las citas del paciente: " . $con->error;
    }
    
    // Crear un array para almacenar los detalles de las citas
    $detallesCitas = array();

    while ($cita = $resultCitas->fetch_assoc()) {
        // Consulta para obtener información de la cita (medicación, doctor y examen)
        $consultaCitaInfo = "SELECT m.nombre_medicamento, d.nombre AS nombre_doctor, e.nombre_examen
            FROM cita c
            JOIN medicacion m ON c.medicacion_id = m.id
            JOIN doctores d ON c.doctor_id = d.id
            JOIN examenes e ON c.examen_id = e.id
            WHERE c.id = " . $cita['id'];
        $resultCitaInfo = $con->query($consultaCitaInfo);
        
        if ($resultCitaInfo) {
            $citaInfo = $resultCitaInfo->fetch_assoc();
            $cita['nombre_medicamento'] = $citaInfo['nombre_medicamento'];
            $cita['nombre_doctor'] = $citaInfo['nombre_doctor'];
            $cita['nombre_examen'] = $citaInfo['nombre_examen'];
        }
        
        // Agregar detalles de la cita al array
        $detallesCitas[] = $cita;
    }
} else {
    echo "No se proporcionó un ID de paciente válido.";
}

// Cerrar la conexión a la base de datos
$con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Historial Médico</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <h1>Historial Médico de <?php echo $paciente['nombre'] . " " . $paciente['apellido']; ?></h1>
    
    <h2>Datos del Paciente</h2>
    <p>Nombre: <?php echo $paciente['nombre'] . " " . $paciente['apellido']; ?></p>
    <p>Edad: <?php echo $paciente['edad']; ?></p>
    <p>Tamaño: <?php echo $paciente['tamano']; ?></p>
    <p>Peso: <?php echo $paciente['peso']; ?></p>
    <p>Sexo: <?php echo $paciente['sexo']; ?></p>
    
    <h2>Citas Médicas</h2>
    <ul>
        <?php
        foreach ($detallesCitas as $cita) {
            echo "<li>Fecha de Cita: " . $cita['fecha'] . "</li>";
            echo "<li>Detalles: " . $cita['detalles'] . "</li>";
            echo "<li>Medicación: " . $cita['nombre_medicamento'] . "</li>";
            echo "<li>Doctor: " . $cita['nombre_doctor'] . "</li>";
            echo "<li>Examen: " . $cita['nombre_examen'] . "</li>";
            echo "<br>";
        }
        ?>
    </ul>
    
    <!-- Agrega un botón para regresar a la lista de pacientes o a la página principal -->
    <a href="pacientes.php">Regresar a la Lista de Pacientes</a>
</body>
</html>

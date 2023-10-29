<?php
include "header.php"; 
include "conexion.php";

// Consulta para obtener la lista de doctores
$consultaDoctores = "SELECT id, nombre FROM doctores";
$resultDoctores = $con->query($consultaDoctores);

// Consulta para obtener la lista de medicación
$consultaMedicacion = "SELECT id, nombre_medicamento FROM medicacion";
$resultMedicacion = $con->query($consultaMedicacion);

// Consulta para obtener la lista de exámenes
$consultaExamenes = "SELECT id, nombre_examen FROM examenes";
$resultExamenes = $con->query($consultaExamenes);

// Consulta para obtener la lista de pacientes
$consultaPacientes = "SELECT id, nombre FROM pacientes";
$resultPacientes = $con->query($consultaPacientes);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Citas Médicas</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <main>
        <h1>Registro de Citas Médicas</h1>
        <form action="crear_cita.php" method="post">
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" required><br>

            <label for="detalles">Detalles:</label>
            <textarea name="detalles" required></textarea><br>

            <label for="doctor">Doctor:</label>
            <select name="doctor" required>
                <?php
                while ($rowDoctor = $resultDoctores->fetch_assoc()) {
                    echo "<option value='" . $rowDoctor['id'] . "'>" . $rowDoctor['nombre'] . "</option>";
                }
                ?>
            </select><br>

            <label for="medicacion">Medicación:</label>
            <select name="medicacion" required>
                <?php
                while ($rowMedicacion = $resultMedicacion->fetch_assoc()) {
                    echo "<option value='" . $rowMedicacion['id'] . "'>" . $rowMedicacion['nombre_medicamento'] . "</option>";
                }
                ?>
            </select><br>

            <label for="examen">Examen:</label>
            <select name="examen" required>
                <?php
                while ($rowExamen = $resultExamenes->fetch_assoc()) {
                    echo "<option value='" . $rowExamen['id'] . "'>" . $rowExamen['nombre_examen'] . "</option>";
                }
                ?>
            </select><br>

            <label for="paciente">Paciente:</label>
            <select name="paciente" required>
                <?php
                while ($rowPaciente = $resultPacientes->fetch_assoc()) {
                    echo "<option value='" . $rowPaciente['id'] . "'>" . $rowPaciente['nombre'] . "</option>";
                }
                ?>
            </select><br>

            <input type="submit" name="crear_cita" value="Crear Cita">
        </form>
    </main>
</body>
</html>

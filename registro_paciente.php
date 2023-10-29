<?php
include "header.php"; 
include "conexion.php";

// Realizar una consulta para obtener la lista de pacientes con nombre y apellido
$query = "SELECT id, nombre, apellido FROM pacientes";
$result = $con->query($query);

if (!$result) {
    die("Error al recuperar datos de pacientes: " . $con->error);
}

// Comenzar a imprimir la página HTML
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Pacientes</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <h1>Registro de Pacientes</h1>
    <a href="pacientes.php">Retornar</a>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Acciones</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellido'] . "</td>";
            echo "<td>";
            echo "<a href='historial.php?id=" . $row['id'] . "' class='btn-historial'>Historial Médico</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>

    </table>
</body>
</html>

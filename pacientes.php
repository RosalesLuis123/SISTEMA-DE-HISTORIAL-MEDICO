<?php
include "header.php"; 
include "conexion.php";

// Realizar una consulta para obtener la lista de pacientes
$query = "SELECT * FROM pacientes";
$result = $con->query($query);

if (!$result) {
    die("Error al recuperar datos de pacientes: " . $con->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Pacientes</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <h1>Lista de Pacientes</h1>
    <a href="formu_crear.php" class="btn-crear">Crear Paciente</a>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Tamaño</th>
            <th>Peso</th>
            <th>Acciones</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellido'] . "</td>";
            echo "<td>" . $row['edad'] . "</td>";
            echo "<td>" . $row['tamano'] . "</td>";
            echo "<td>" . $row['peso'] . "</td>";
            echo "<td>";
            echo "<a href='formu_editar.php?id=" . $row['id'] . "' class='btn-editar'>Editar</a>";
            echo "<a href='borrar.php?id=" . $row['id'] . "' class='btn-borrar'>Borrar</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>

    </table>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$con->close();
include "footer.php";
?>

<?php
include "header.php"; 

include "conexion.php";

if (isset($_GET['id'])) {
    $id_paciente = $_GET['id'];

    // Realizar una consulta para obtener los datos del paciente a editar
    $consulta_paciente = "SELECT * FROM pacientes WHERE id = $id_paciente";
    $result = $con->query($consulta_paciente);

    if ($result) {
        $paciente = $result->fetch_assoc();
    } else {
        echo "Error al recuperar datos del paciente: " . $con->error;
    }
} else {
    echo "No se proporcionó un ID válido para editar.";
}

// Cerrar la conexión a la base de datos
$con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Paciente</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="ajax.js"></script>
</head>
<body>
    <h1>Editar Paciente</h1>
    <a href="pacientes.php">Retornar</a>
    <form action="editar.php?id=<?php echo $id_paciente; ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nuevo_nombre" value="<?php echo $paciente['nombre']; ?>" required><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="nuevo_apellido" value="<?php echo $paciente['apellido']; ?>" required><br>

        <label for="edad">Edad:</label>
        <input type="number" name="nueva_edad" value="<?php echo $paciente['edad']; ?>" required><br>

        <label for="tamano">Tamaño:</label>
        <input type="number" step="0.01" name="nuevo_tamano" value="<?php echo $paciente['tamano']; ?>" required><br>

        <label for="peso">Peso:</label>
        <input type="number" step="0.01" name="nuevo_peso" value="<?php echo $paciente['peso']; ?>" required><br>

        <label for="sexo">Sexo:</label>
        <select name="nuevo_sexo">
            <option value="M" <?php if ($paciente['sexo'] === 'M') echo 'selected'; ?>>Masculino</option>
            <option value="F" <?php if ($paciente['sexo'] === 'F') echo 'selected'; ?>>Femenino</option>
        </select><br>

        <input type="submit" name="actualizar" value="Actualizar Paciente">
    </form>
</body>
</html>

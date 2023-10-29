<?php include "header.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Crear Paciente</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="ajax.js"></script>
</head>
<body>
    <h1>Crear Paciente</h1>
    <a href="pacientes.php">Retornar</a>
    <form action="crear.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required><br>

        <label for="edad">Edad:</label>
        <input type="number" name="edad" required><br>

        <label for="tamano">Tamaño:</label>
        <input type="number" step="0.01" name="tamano" required><br>

        <label for="peso">Peso:</label>
        <input type="number" step="0.01" name="peso" required><br>

        <label for="sexo">Sexo:</label>
        <select name="sexo">
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select><br>

        <input type="submit" name="crear" value="Crear Paciente">
    </form>
</body>
</html>

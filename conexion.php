<?php
$con = new mysqli("localhost:8081", "root", "", "bd_consultorio");

if ($con->connect_error) {
    die("Conexión fallada: " . $con->connect_error);
}
?>

<?php
$servername = "localhost";
$username   = "root";      // usuario por defecto de XAMPP
$password   = "";          // sin contraseña
$database   = "usuarios_db"; // nombre de la base creada

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

<?php
$servername = "localhost";
$username   = "root";       // usuario por defecto de XAMPP
$password   = "";           // contraseña vacía si no cambiaste
$database   = "usuarios_db"; // base de datos creada en phpMyAdmin

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("❌ Error de conexión: " . $conn->connect_error);
}
?>

<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro de Usuario</title>
<link rel="stylesheet" href="admin.css">
</head>

<body>
<div class="login-container">
    <h2>Registro de Nuevo Usuario</h2>

    <form action="registro.php" method="POST">
        <label for="nombre">Nombre completo:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="usuario">Matricula:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="registrar">Registrar</button>
    </form>

    <div class="links">
        <a href="login.php">← Volver al inicio de sesión</a>
    </div>
</div>

<?php
include("conexion.php");

if (isset($_POST['registrar'])) {
    $nombre   = $_POST['nombre'];
    $usuario  = $_POST['usuario'];
    $correo   = $_POST['correo'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // 🔒 encriptar contraseña

    $sql = "INSERT INTO usuarios (nombre, usuario, correo, password)
            VALUES ('$nombre', '$usuario', '$correo', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='text-align:center; color:green;'>✅ Registro exitoso. Ya puedes iniciar sesión.</p>";
    } else {
        echo "<p style='text-align:center; color:red;'>❌ Error: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>

</body>
</html>

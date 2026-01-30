<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Recuperar Contraseña</title>
<link rel="stylesheet" href="admin.css">
</head>

<body>
<div class="login-container">
    <h2>Recuperar Contraseña</h2>

    <form action="recuperar.php" method="POST">
        <label for="correo">Correo registrado:</label>
        <input type="email" id="correo" name="correo" required>

        <button type="submit" name="recuperar">Enviar enlace</button>
    </form>

    <div class="links">
        <a href="login.php">← Volver al inicio de sesión</a>
    </div>
</div>

<?php
if (isset($_POST['recuperar'])) {
    $correo = $_POST['correo'];

    // Buscar usuario
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Generar token único
        $token = bin2hex(random_bytes(16));
        $conn->query("UPDATE usuarios SET token_reset='$token' WHERE correo='$correo'");

        // Simular el envío del enlace (sin correo real)
        $enlace = "http://localhost/administracion/restablecer.php?token=$token";
        echo "<div style='text-align:center; color:green; margin-top:20px;'>
                Enlace de recuperación generado:<br>
                <a href='$enlace'>$enlace</a>
              </div>";
    } else {
        echo "<p style='text-align:center; color:red;'> No existe la cuenta.</p>";
    }
}
?>
</body>
</html>

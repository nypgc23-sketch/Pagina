<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Restablecer Contraseña</title>
<link rel="stylesheet" href="admin.css">
</head>

<body>
<div class="login-container">
    <h2>Restablecer Contraseña</h2>

<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM usuarios WHERE token_reset='$token'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '
        <form action="restablecer.php" method="POST">
            <input type="hidden" name="token" value="'.$token.'">
            <label for="password">Nueva contraseña:</label>
            <input type="password" name="password" required>
            <button type="submit" name="cambiar">Cambiar contraseña</button>
        </form>';
    } else {
        echo "<p style='color:red;'> Enlace inválido.</p>";
    }
}

if (isset($_POST['cambiar'])) {
    $token = $_POST['token'];
    $nueva = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // actualizar contraseña y borrar token
    $update = "UPDATE usuarios SET password='$nueva', token_reset=NULL WHERE token_reset='$token'";
    if ($conn->query($update)) {
        echo "<p style='text-align:center; color:green;'> Contraseña actualizada correctamente.</p>
              <div class='links'><a href='login.php'>Iniciar sesión</a></div>";
    } else {
        echo "<p style='text-align:center; color:red;'>Error al actualizar contraseña.</p>";
    }
}
?>
</div>
</body>
</html>

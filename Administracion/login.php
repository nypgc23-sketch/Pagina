<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Administración - Iniciar Sesión</title>
<link rel="stylesheet" href="admin.css">
</head>

<body>
<div class="login-container">
    <h2>Iniciar Sesión</h2>

    <form action="login.php" method="POST">
        <label for="usuario">Matricula:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="login">Conectar</button>
    </form>

    <div class="links">
        <a href="recuperar.php">¿Olvidaste tu contraseña?</a><br>
        <a href="registro.php">Registrar nuevo usuario</a>
    </div>
</div>

<?php
include("conexion.php");

if (isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "<p style='text-align:center; color:green;'> Bienvenido, {$row['nombre']}.</p>";
        } else {
            echo "<p style='text-align:center; color:red;'>Contraseña incorrecta.</p>";
        }
    } else {
        echo "<p style='text-align:center; color:red;'> El usuario no existe.</p>";
    }

    $conn->close();
}
?>

</body>
</html>

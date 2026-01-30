<?php
include("conexion.php");
$result = $conn->query("SELECT id, nombre, usuario, correo, fecha_registro FROM usuarios");
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Usuarios registrados</title></head>
<body>
<h2>Usuarios registrados</h2>
<table border="1" cellpadding="8">
<tr><th>ID</th><th>Nombre</th><th>Usuario</th><th>Correo</th><th>Fecha de Registro</th></tr>
<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['nombre'] ?></td>
    <td><?= $row['usuario'] ?></td>
    <td><?= $row['correo'] ?></td>
    <td><?= $row['fecha_registro'] ?></td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>

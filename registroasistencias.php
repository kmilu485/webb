<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $query = $pdo->prepare("INSERT INTO grados (nombre, descripcion) VALUES (?, ?)");
    if ($query->execute([$nombre, $descripcion])) {
        echo "Grado registrado";
    } else {
        echo "Error";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="POST">
        <label for="nombre">Nombre del grado:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea>

        <button type="submit">Registrar</button>
    </form>
    <a href="menu.php">Volver al menú</a>
</body>
</html>
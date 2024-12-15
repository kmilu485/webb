<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $documento = $_POST['documento'];

    $query = $pdo->prepare("DELETE FROM estudiantes WHERE documento = ?");
    if ($query->execute([$documento])) {
        echo "Estudiante eliminado.";
    } else {
        echo "Error al eliminar al estudiante.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Eliminar Estudiantes</title>
</head>
<body>
    <h2>Eliminar Estudiante</h2>
    <form method="POST">
        <label for="documento">Documento del Estudiante:</label>
        <input type="text" name="documento" required>
        <button type="submit">Eliminar</button>
    </form>
    <a href="menu.html">Volver al Menú</a>
</body>
</html>

<?php
session_start();
include "db.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $documento = $_POST['documento'];
    $nuevo_nombre = $_POST['nuevo_nombre'];
    $nuevo_grado_id = $_POST['nuevo_grado_id'];

    $query = $pdo->prepare("UPDATE estudiantes SET nombre = ?, grado_id = ? WHERE documento = ?");
    if($query->execute([$nuevo_nombre, $nuevo_grado_id, $documento])) {
        echo "Datos del estudiante actualizados.";
    } else {
        echo "Error al actualizar los datos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Actualizar Estudiantes</title>
</head>
<body>
    <h2>Actualizar Estudiante</h2>
    <form method="POST">
        <label for="documento">Documento del estudiante:</label>
        <input type="text" name="documento" required>
        
        <label for="nuevo_nombre">Nuevo Nombre:</label>
        <input type="text" name="nuevo_nombre" required>
        
        <label for="nuevo_grado_id">Nuevo Grado:</label>
        <select name="nuevo_grado_id" required>
            <?php
            $grados = $pdo->query("SELECT * FROM grados")->fetchAll();
            foreach($grados as $grado) {
                echo "<option value='{$grado['id']}'>{$grado['nombre']}</option>";
            }
            ?>
        </select>
        <button type="submit">Actualizar</button>
    </form>
    <a href="menu.html">Volver al Menú</a>
</body>
</html>

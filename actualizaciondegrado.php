<?php
session_start();
include "db.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $grado_id = $_POST['grado_id'];
    $nuevo_nombre = $_POST['nuevo_nombre'];
    $nueva_descripcion = $_POST['nueva_descripcion'];

    $query = $pdo->prepare("UPDATE grados SET nombre = ?, descripcion = ? WHERE id = ?");
    if($query->execute([$nuevo_nombre, $nueva_descripcion, $grado_id])) {
        echo "Grado actualizado.";
    } else {
        echo "Error al actualizar el grado.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Actualizar Grados</title>
</head>
<body>
    <h2>Actualizar Grado</h2>
    <form method="POST">
        <label for="grado_id">Seleccionar Grado:</label>
        <select name="grado_id" required>
            <?php
            $grados = $pdo->query("SELECT * FROM grados")->fetchAll();
            foreach($grados as $grado) {
                echo "<option value='{$grado['id']}'>{$grado['nombre']}</option>";
            }
            ?>
        </select>
        <label for="nuevo_nombre">Nuevo Nombre:</label>
        <input type="text" name="nuevo_nombre" required>
        <label for="nueva_descripcion">Nueva Descripción:</label>
        <textarea name="nueva_descripcion" required></textarea>
        <button type="submit">Actualizar</button>
    </form>
    <a href="menu.html">Volver al Menú</a>
</body>
</html>
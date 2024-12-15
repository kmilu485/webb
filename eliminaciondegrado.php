<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $grado_id = $_POST['grado_id'];

    $query = $pdo->prepare("DELETE FROM grados WHERE id = ?");
    if ($query->execute([$grado_id])) {
        echo "Grado eliminado.";
    } else {
        echo "Error al eliminar el grado.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Eliminar Grados</title>
</head>
<body>
    <h2>Eliminar Grado</h2>
    <form method="POST">
        <label for="grado_id">Seleccionar Grado:</label>
        <select name="grado_id" required>
            <?php
            $grados = $pdo->query("SELECT * FROM grados")->fetchAll();
            foreach ($grados as $grado) {
                echo "<option value='{$grado['id']}'>{$grado['nombre']}</option>";
            }
            ?>
        </select>
        <button type="submit">Eliminar</button>
    </form>
    <a href="menu.html">Volver al Menú</a>
</body>
</html>

<?php
session_start();
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);

    if (empty($nombre) || empty($descripcion)) {
        echo "Por favor, completa todos los campos.";
    } else {
        try {
            $query = $pdo->prepare("INSERT INTO grados (nombre, descripcion) VALUES (?, ?)");
            $query->execute([$nombre, $descripcion]);
            echo "Grado registrado exitosamente.";
        } catch (Exception $e) {
            echo "Ocurrió un error: " . $e->getMessage();
        }
    }
} else {
    echo "Método de solicitud no válido.";
}
?>

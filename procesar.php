

<?php
session_start(); // Inicia la sesión
include "db.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') { /
    $nombre = $_POST['nombre']; 
    $correo = $_POST['correo']; 
    $contrasena = $_POST['contrasena']; 

    
    if (empty($nombre) || empty($correo) || empty($contrasena)) {
    
    } else {
        $contrHSEna_encriptada = password_hash($contrasena, PASSWORD_DEFAULT); 

        try {
        
            $query = $pdo->prepare("INSERT INTO docentes (nombre, correo, contrasena) VALUES (?, ?, ?)");
            $query->execute([$nombre, $correo, $contrasena_encriptada]); 
            echo "Docente registrado exitosamente."; 
        } catch (Exception $e) {
            
            echo "Ocurrió un error: " . $e->getMessage();
        }
    }
} else {
    
    echo "Método de solicitud no válido.";
}
?>

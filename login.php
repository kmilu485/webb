

<?php

session_start():
include 'db.php';
if ($_SERVER['REQUEST_ METHOD'] =='POST') {
$correo = $_POST['correo'];
$contrasena = $_POST[' contrasena'];

$query = $pdo->prepare ("SELECT * FROM docentes WHERE correo = ?");
$query- >execute([$correo]);
$docente = $query->fetch();


if ($docente && password verify ($contrasena, $docente['contrasena ' ])) {
$_SESSION[ ' docente_id'] = $docente ['id'];
$_SESSION[ ' docente_nombre'] = $docente[ 'nombre'];
header("Location: menu.html");
exit();
}
else{
echo "Credenciales inválidas";
}
}



?>
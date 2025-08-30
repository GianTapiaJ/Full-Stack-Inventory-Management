<?php
// Iniciar sesión
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Si se desea eliminar completamente la sesión, también se puede destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio o al login
header("Location: /autoservicios/login.php");  // O redirigir a la página principal: "Location: ../index.php"
exit();
?>

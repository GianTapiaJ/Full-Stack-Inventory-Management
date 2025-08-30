<?php
// check_session.php
session_start();
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_id'])) {
    header("Location: /autoservicios/login.php"); // Redirigir al login si no está logueado
    exit();
}
?>

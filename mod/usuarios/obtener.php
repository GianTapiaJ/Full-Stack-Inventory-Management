<?php
include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/db.php');

$sql = "SELECT * FROM usuarios";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($usuarios);
?>

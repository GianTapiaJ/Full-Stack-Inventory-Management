<?php
include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/db.php');

$sql = "SELECT * FROM productos";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($productos);
?>

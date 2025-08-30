<?php
include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/db.php');

$sql = "SELECT * FROM ventas";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$ventas = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($ventas);
?>

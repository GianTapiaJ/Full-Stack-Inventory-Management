<?php
include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/db.php');

$sql = "SELECT * FROM detalles_ventas";
$stmt = $conexion->prepare($sql);
$stmt->execute();

$detallesVentas = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($detallesVentas);
?>

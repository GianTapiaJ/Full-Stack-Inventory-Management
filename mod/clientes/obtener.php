<?php
include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/db.php');

$sql = "SELECT * FROM clientes";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($clientes);
?>

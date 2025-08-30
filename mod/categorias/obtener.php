<?php
include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/db.php');

$sql = "SELECT * FROM categorias";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($categorias);
?>

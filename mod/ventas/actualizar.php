<?php
include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id_cliente = $_POST['id_cliente'];
    $id_empleado = $_POST['id_empleado'];
    $fecha_venta = $_POST['fecha_venta'];
    $total = $_POST['total'];

    $sql = "UPDATE ventas SET id_cliente = :id_cliente, id_empleado = :id_empleado, fecha_venta = :fecha_venta, total = :total WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':id_cliente', $id_cliente);
    $stmt->bindParam(':id_empleado', $id_empleado);
    $stmt->bindParam(':fecha_venta', $fecha_venta);
    $stmt->bindParam(':total', $total);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
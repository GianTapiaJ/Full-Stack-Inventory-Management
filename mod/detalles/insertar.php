<?php
include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_venta = $_POST['id_venta'];
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];
    $precio_unitario = $_POST['precio_unitario'];
    $subtotal = $_POST['subtotal'];

    $sql = "INSERT INTO detalles_ventas (id_venta, id_producto, cantidad, precio_unitario, subtotal) 
            VALUES (:id_venta, :id_producto, :cantidad, :precio_unitario, :subtotal)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id_venta', $id_venta);
    $stmt->bindParam(':id_producto', $id_producto);
    $stmt->bindParam(':cantidad', $cantidad);
    $stmt->bindParam(':precio_unitario', $precio_unitario);
    $stmt->bindParam(':subtotal', $subtotal);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>

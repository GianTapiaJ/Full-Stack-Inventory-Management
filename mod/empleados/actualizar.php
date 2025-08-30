<?php
include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $puesto = $_POST['puesto'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $sql = "UPDATE empleados SET nombre = :nombre, puesto = :puesto, telefono = :telefono, correo = :correo WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':puesto', $puesto);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':correo', $correo);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>

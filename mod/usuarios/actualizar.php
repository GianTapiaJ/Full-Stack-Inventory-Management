<?php
include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $rol = $_POST['rol'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $hash = md5($password);

    $sql = "UPDATE usuarios SET user = :user, password = :password, hash = :hash WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':rol', $rol);
    $stmt->bindParam(':user', $user);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':hash', $hash);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>

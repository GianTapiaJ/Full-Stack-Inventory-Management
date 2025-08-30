<?php
include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rol = $_POST['rol'];
    $user = $_POST['user'];
    $password = $_POST['password'];
    $hash = md5($password);

    $sql = "INSERT INTO usuarios (rol, user, password, hash) VALUES (:rol, :user, :password, :hash)";
    $stmt = $conexion->prepare($sql);
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
<?php
include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/session_check.php');
$rol = $_SESSION['usuario_rol'];
if ($rol != 'guest'){
    header("Location: /autoservicios/index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Detalles de Ventas</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/header.php');?>
<div class="container mt-5">
    <h2 class="text-center">Gestión de Detalles de Ventas</h2>
    <div class="row">
        <div class="col-md-12">
            <h4>Lista de Detalles de Ventas</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Venta</th>
                        <th>ID Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody id="detallesVentaLista"></tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="/autoservicios/assets/js/view_detalles.js"></script>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/footer.php');?>
</body>
</html>

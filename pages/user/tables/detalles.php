<?php
include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/session_check.php');
$rol = $_SESSION['usuario_rol'];
if ($rol != 'user'){
    header("Location: /autoservicios/index.php");
}?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Detalles de Ventas</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/header.php');?>
<div class="container mt-5">
    <h2 class="text-center">Gestión de Detalles de Ventas</h2>
    <div class="row">
        <div class="col-md-6">
            <h4>Agregar/Actualizar Detalle de Venta</h4>
            <form id="detalleVentaForm">
                <input type="hidden" id="detalleVentaId"> <!-- Campo oculto para el ID del detalle de venta -->
                <div class="mb-3">
                    <label for="id_venta" class="form-label">ID Venta</label>
                    <input type="number" id="id_venta" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="id_producto" class="form-label">ID Producto</label>
                    <input type="number" id="id_producto" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" id="cantidad" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="precio_unitario" class="form-label">Precio Unitario</label>
                    <input type="number" id="precio_unitario" class="form-control" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="subtotal" class="form-label">Subtotal</label>
                    <input type="number" id="subtotal" class="form-control" step="0.01" required readonly>
                </div>
                <button type="submit" class="btn btn-primary" id="btnGuardarDetalle">Guardar Detalles de Venta</button>
            </form>
        </div>

        <div class="col-md-6">
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
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="detallesVentaLista"></tbody>
            </table>
        </div>
    </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/footer.php');?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="/autoservicios/assets/js/detalles.js"></script>
</body>
</html>

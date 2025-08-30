<?php
include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/session_check.php');
$rol = $_SESSION['usuario_rol'];
if ($rol != 'admin'){
    header("Location: /autoservicios/index.php");
}?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Ventas</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/header.php');?>
<div class="container mt-5">
    <h2 class="text-center">Gestión de Ventas</h2>
    <div class="row">
        <div class="col-md-6">
            <h4>Agregar/Actualizar Venta</h4>
            <form id="ventaForm">
                <input type="hidden" id="ventaId"> <!-- Campo oculto para el ID de la venta -->
                <div class="mb-3">
                    <label for="id_cliente" class="form-label">ID Cliente</label>
                    <input type="number" id="id_cliente" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="id_empleado" class="form-label">ID Empleado</label>
                    <input type="number" id="id_empleado" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_venta" class="form-label">Fecha de Venta</label>
                    <input type="datetime-local" id="fecha_venta" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input type="number" id="total" class="form-control" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
            </form>
        </div>

        <div class="col-md-6">
            <h4>Lista de Ventas</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Cliente</th>
                        <th>ID Empleado</th>
                        <th>Fecha de Venta</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="ventasLista"></tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="/autoservicios/assets/js/ventas.js"></script>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/footer.php');?>
</body>
</html>

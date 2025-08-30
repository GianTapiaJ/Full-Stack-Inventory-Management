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
    <title>Gestión de clientes</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/header.php');?>
<div class="container mt-5">
    <h2 class="text-center">Gestion de clientes</h2>
    <div class="row">
        <div class="col-md-6">
            <h4>Agregar/Actualizar Cliente</h4>
            <form id="clientesForm">
                <input type="hidden" id="clientesId"> <!-- Campo oculto para el ID del empleado -->
                
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" id="direccion" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" id="telefono" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" id="correo" class="form-control" required>
                </div>
                
                <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
            </form>
        </div>

        <div class="col-md-6">
            <h4>Lista de clientes</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo Electrónico</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="clientesLista"></tbody>
            </table>
        </div>
    </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/footer.php');?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="/autoservicios/assets/js/clientes.js"></script>
</body>
</html>

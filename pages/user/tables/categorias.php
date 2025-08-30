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
    <title>Gestión de Categotías</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/header.php');?>
<div class="container mt-5">
    <h2 class="text-center">Gestion de Categorías</h2>
    <div class="row">
        <div class="col-md-6">
            <h4>Agregar/Actualizar Categoría</h4>
            <form id="categoriasForm">
                <input type="hidden" id="categoriasId"> <!-- Campo oculto para el ID de categoria -->
                
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" id="descripcion" class="form-control" required>
                </div>
                
                
                
                <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
            </form>
        </div>

        <div class="col-md-6">
            <h4>Lista de Categorías</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="categoriasLista"></tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="/autoservicios/assets/js/categorias.js"></script>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/footer.php');?>
</body>
</html>

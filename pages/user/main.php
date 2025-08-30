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
    <title>Main Usuario</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        header h2 {
            margin: 0;
            font-size: 2rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        h1 {
            color: #333;
            margin-top: 50px;
            text-align: center;
        }

        .contenedor {
            margin-top: 30px;
            text-align: center;
        }

        .boton {
            display: inline-block;
            padding: 15px 30px;
            margin: 10px;
            font-size: 18px;
            color: white;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .boton:hover {
            background-color: #0056b3;
        }

        .logout {
            background-color: red;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/header.php');?>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?></h1>

    <div class="contenedor">
        <!-- Botones comunes para todos los usuarios -->
        <a href="tables/productos.php" class="boton">Gestión de Productos</a>
        <a href="tables/empleados.php" class="boton">Gestión de Empleados</a>
        <a href="tables/clientes.php" class="boton">Gestión de Clientes</a>
        <a href="tables/categorias.php" class="boton">Gestión de Categorías</a>
        <a href="tables/ventas.php" class="boton">Gestión de Ventas</a>
        <a href="tables/detalles.php" class="boton">Gestión de Detalles de Ventas</a>
        <!-- Botón de cierre de sesión (visible para todos) -->
        <a href="/autoservicios/logout.php" class="boton logout">Cerrar Sesión</a>
    </div>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/footer.php');?>
</body>
</html>
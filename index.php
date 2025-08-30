<?php
include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/session_check.php');
$rol = $_SESSION['usuario_rol'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <style>
        body {
            background-image: url('/autoservicios/assets/imgs/background.png');
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            color: #333;
        }

        .boton {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            color: white;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .boton:hover {
            background-color: #0056b3;
        }

        .boton.logout {
            background-color: red;
        }
    </style>
</head>
<body>
<?php if ($rol === 'admin'): ?>
    <h1>Bienvenido. Administrador: <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?></h1>
    <a href="/autoservicios/pages/admin/main.php" class="boton">Acceder a la base de datos</a>
<?php endif; ?>
<?php if ($rol === 'user'): ?>
    <h1>Bienvenido. Usuario: <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?></h1>
    <a href="/autoservicios/pages/user/main.php" class="boton">Acceder a la base de datos</a>
<?php endif; ?>
<?php if ($rol === 'guest'): ?>
    <h1>Bienvenido. Invitado: <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?></h1>
    <a href="/autoservicios/pages/guest/main.php" class="boton">Acceder a la base de datos</a>
<?php endif; ?>

    <!-- Botón para cerrar sesión -->
    <a href="/autoservicios/logout.php" class="boton logout">Cerrar Sesión</a>
</body>
</html>
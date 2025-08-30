<?php// orden para ver la sesion de manera global (desde cualquier lugar se puede acceder)
include($_SERVER['DOCUMENT_ROOT'] . '/autoservicios/includes/session_check.php');
$rol = $_SESSION['usuario_rol'];  // Obtener el rol del usuario desde la sesión
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header con menú y botón de cerrar sesión</title>
  <style>
    /* Estilos generales del header */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      display: flex;
      justify-content: space-between; /* Distribuye el espacio entre los elementos */
      align-items: center;
      background-color: #333;
      color: white;
      padding: 10px 20px;
      position: relative; /* Necesario para posicionar el menú desplegable */
    }

    /* Icono de tres líneas */
    .menu-icon {
      font-size: 30px;
      cursor: pointer;
      display: block; /* Siempre visible */
    }

    /* Estilo del menú desplegable */
    .menu {
      display: none; /* Lo mantenemos oculto inicialmente */
      background-color: #444;
      position: absolute;
      top: 50px; /* Coloca el menú justo debajo del icono */
      left: 0;
      padding: 10px;
      border-radius: 5px;
      width: 150px;
    }

    .menu a {
      color: white;
      text-decoration: none;
      display: block;
      padding: 8px;
    }

    .menu a:hover {
      background-color: #555;
    }

    /* Estilos del botón de cerrar sesión */
    .logout-button {
      background-color: #d9534f;
      color: white;
      padding: 8px 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .logout-button:hover {
      background-color: #c9302c;
    }

  </style>
</head>
<body>
  <header>
    <!-- Icono de tres líneas -->
    <div class="menu-icon" id="menu-icon">&#9776;</div>

    <!-- Menú desplegable -->
    <div class="menu" id="menu">
    <?php if ($rol === 'admin'): ?>
        <a href="/autoservicios/pages/admin/main.php">Página Principal</a>
        <a href="/autoservicios/pages/admin/tables/productos.php">Gestión de Productos</a>
        <a href="/autoservicios/pages/admin/tables/empleados.php">Gestión de Empleados</a>
        <a href="/autoservicios/pages/admin/tables/clientes.php">Gestión de Clientes</a>
        <a href="/autoservicios/pages/admin/tables/categorias.php">Gestión de Categorías</a>
        <a href="/autoservicios/pages/admin/tables/ventas.php">Gestión de Ventas</a>
        <a href="/autoservicios/pages/admin/tables/detalles.php">Gestión de Detalles de Ventas</a>
        <a href="/autoservicios/pages/admin/tables/usuarios.php">Gestión de Usuarios</a>
    <?php endif; ?>
    <?php if ($rol === 'user'): ?>
        <a href="/autoservicios/pages/user/main.php">Página Principal</a>
        <a href="/autoservicios/pages/user/tables/productos.php">Gestión de Productos</a>
        <a href="/autoservicios/pages/user/tables/empleados.php">Gestión de Empleados</a>
        <a href="/autoservicios/pages/user/tables/clientes.php">Gestión de Clientes</a>
        <a href="/autoservicios/pages/user/tables/categorias.php">Gestión de Categorías</a>
        <a href="/autoservicios/pages/user/tables/ventas.php">Gestión de Ventas</a>
        <a href="/autoservicios/pages/user/tables/detalles.php">Gestión de Detalles de Ventas</a>
    <?php endif; ?>
    <?php if ($rol === 'guest'): ?>
        <a href="/autoservicios/pages/guest/main.php">Página Principal</a>
        <a href="/autoservicios/pages/guest/tables/productos.php">Visualizar Productos</a>
        <a href="/autoservicios/pages/guest/tables/empleados.php">Visualizar Empleados</a>
        <a href="/autoservicios/pages/guest/tables/clientes.php">Visualizar Clientes</a>
        <a href="/autoservicios/pages/guest/tables/categorias.php">Visualizar Categorías</a>
        <a href="/autoservicios/pages/guest/tables/ventas.php">Visualizar Ventas</a>
        <a href="/autoservicios/pages/guest/tables/detalles.php">Visualizar Detalles de Ventas</a>
    <?php endif; ?>
    </div>
    <p>PAPUSERVICIOS</p>
    <!-- Botón de Cerrar sesión -->
    <a href="/autoservicios/logout.php" class="logout-button">Cerrar sesión</button></a>
  </header>

  <script>
    // JavaScript para mostrar/ocultar el menú al hacer clic en el icono
    const menuIcon = document.getElementById("menu-icon");
    const menu = document.getElementById("menu");

    menuIcon.addEventListener("click", () => {
      // Toggle entre mostrar u ocultar el menú
      if (menu.style.display === "block") {
        menu.style.display = "none";
      } else {
        menu.style.display = "block";
      }
    });
  </script>
</body>
</html>

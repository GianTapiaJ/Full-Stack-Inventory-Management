<?php
session_start();

// Verificar si el usuario ya está logueado
if (isset($_SESSION['usuario_id'])) {
    header("Location: /index.php");  // Redirigir al índice si ya está logueado
    exit();
}

// Variables para los mensajes de error
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "autoservicios";  // Nombre de tu base de datos

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $rol = $_POST['rol']; // Nuevo campo para el rol

    // Consultar la base de datos para verificar el usuario, el hash de la contraseña y el rol
    $sql = "SELECT id, user, hash, rol FROM usuarios WHERE user = ? AND rol = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $rol); // Protección contra inyecciones SQL
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró el usuario
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verificar si la contraseña ingresada coincide con el hash de la base de datos
        if (md5($clave) == $row['hash']) {
            // Establecer variables de sesión
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['usuario_nombre'] = $row['user'];
            $_SESSION['usuario_rol'] = $row['rol']; // Guardar el rol en la sesión

            header("Location: /autoservicios/index.php");  // Redirigir al panel de admin
            
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado o no tiene permisos para este rol.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .contenedor {
            background-color: white;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;   
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="contenedor">
        <h2>Iniciar sesión</h2>

        <?php if ($error != ""): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" required>
            <br><br>

            <label for="clave">Contraseña:</label>
            <input type="password" name="clave" id="clave" required>
            <br><br>

            <label for="rol">Rol:</label>
            <select name="rol" id="rol" required>
                <option value="user">Usuario</option>
                <option value="admin">Administrador</option>
                <option value="guest">Invitado</option>
            </select>
            <br><br>

            <button type="submit">Iniciar sesión</button>
        </form>
    </div>

</body>
</html>
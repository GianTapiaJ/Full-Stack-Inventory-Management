<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Footer al fondo</title>
  <style>
    /* Aseguramos que el body ocupe el 100% del alto de la pantalla */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    /* Contenedor principal con padding en la parte inferior */
    .content {
      padding: 20px;
      padding-bottom: 80px; /* Deja suficiente espacio para que el footer no se solape */
    }

    /* Estilo del footer */
    footer {
      background-color: #333;
      color: white;
      text-align: center;
      padding: 20px 0;
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="content">

  </div>

  <footer>
    <p>Créditos: Santillán Hernández Fabricio Sabdi y Tapia Jasso Gian Carlo</p>
  </footer>
</body>
</html>

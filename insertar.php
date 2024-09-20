<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de la página</title>
    <link rel="stylesheet" href="styles.css"> <!-- Archivo CSS externo -->
</head>
<body>
<form action="altas.php" method="post" enctype="multipart/form-data">
    <label for="codcard">Código de tarjeta:</label>
    <input type="text" name="codcard" id="codcard" required>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>

    <label for="descri">Descripción:</label>
    <textarea name="descri" id="descri" required></textarea>

    <label for="image">Selecciona una imagen:</label>
    <input type="file" name="image" id="image" accept="image/*" required>

    <input type="submit" value="Subir">
</form>

<div>
    <h3>Nombre del producto</h3>
    <p>Descripción del producto</p>
    <img src="uploads/imagen.jpg" alt="Nombre del producto" width="300"/>
</div>

    <script src="scripts.js"></script> <!-- Archivo JavaScript externo -->
</body>
</html>
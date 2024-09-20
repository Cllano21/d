<?php
include("conexion.php");

// Verificar si las variables POST y FILES existen
$codcard = isset($_POST["codcard"]) ? $_POST["codcard"] : '';
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
$des = isset($_POST["descri"]) ? $_POST["descri"] : '';

// Verificar si la imagen fue subida correctamente
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $imageName = $_FILES['image']['name'];  // Obtener el nombre del archivo de imagen
    $imageTmpName = $_FILES['image']['tmp_name'];
    $uploadDir = "uploads/";  // Carpeta donde se guardarán las imágenes
    $uploadFile = $uploadDir . basename($imageName);

    // Mover la imagen a la carpeta de destino
    if (move_uploaded_file($imageTmpName, $uploadFile)) {
        // SQL para insertar los datos en la base de datos
        $query = "INSERT INTO CARGO (codcard, nombre, descripcion, image_path) VALUES (?, ?, ?, ?)";
        $params = array($codcard, $nombre, $des, $uploadFile);

        // Preparar y ejecutar la consulta
        $res = sqlsrv_prepare($conn, $query, $params);

        // Verificar si la consulta fue exitosa
        if (sqlsrv_execute($res)) {
            echo "Datos insertados correctamente";
        } else {
            echo "Error al insertar datos";
            // Mostrar errores de SQL Server si los hay
            if (($errors = sqlsrv_errors()) != null) {
                foreach ($errors as $error) {
                    echo "SQLSTATE: ".$error['SQLSTATE']."<br />";
                    echo "Code: ".$error['code']."<br />";
                    echo "Message: ".$error['message']."<br />";
                }
            }
        }
    } else {
        echo "Error al mover el archivo.";
    }
} else {
    echo "No se ha seleccionado ninguna imagen o ha ocurrido un error.";
}
?>

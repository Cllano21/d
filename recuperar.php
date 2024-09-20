<?php

include("conexion.php");

$query = "SELECT codcard, nombre, descripcion, image_path FROM CARGO";
$result = sqlsrv_query($conn, $query);

// Verifica si la consulta devuelve resultados
if ($result === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Mostrar cada fila de resultado
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    // Mostrar la imagen y el resto de los datos
    echo "<div>";
    echo "<h3>" . htmlspecialchars($row['nombre']) . "</h3>";
    echo "<p>" . htmlspecialchars($row['descripcion']) . "</p>";
    echo "<img src='" . htmlspecialchars($row['image_path']) . "' alt='" . htmlspecialchars($row['nombre']) . "' width='300'/>";
    echo "</div>";
}
?>

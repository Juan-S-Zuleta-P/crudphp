<?php
include("conexion_db.php");

if (isset($_POST['bt_guardar_lineaproducto'])) {
    // Captura los valores usando mysqli_real_escape_string para evitar inyección SQL
    $productLine = mysqli_real_escape_string($conn, $_POST['productLine']);
    $textDescription = mysqli_real_escape_string($conn, $_POST['textDescription']);
    $htmlDescription = mysqli_real_escape_string($conn, $_POST['htmlDescription']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);

    // Preparar la sentencia SQL con una sentencia preparada
    $query = "INSERT INTO productlines (productLine, textDescription, htmlDescription, image) VALUES (?, ?, ?, ?)";

    // Inicializar la sentencia preparada
    $stmt = mysqli_prepare($conn, $query);

    // Vincular los parámetros
    mysqli_stmt_bind_param($stmt, "ssss", $productLine, $textDescription, $htmlDescription, $image);

    // Ejecutar la sentencia preparada
    mysqli_stmt_execute($stmt);

    // Cerrar la sentencia preparada
    mysqli_stmt_close($stmt);

    // Con este comando retorna a la página principal y muestra los datos actualizados de la nueva tarea
    header("Location: index.php");
}
?>
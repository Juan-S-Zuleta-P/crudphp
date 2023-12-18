<?php
include('conexion_db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Preparar la sentencia SQL con una consulta preparada
    $query = "DELETE FROM productlines WHERE productLine = ?";
    $stmt = mysqli_prepare($conn, $query);

    // Vincular el parámetro
    mysqli_stmt_bind_param($stmt, "s", $id);

    // Ejecutar la sentencia preparada
    mysqli_stmt_execute($stmt);

    // Cerrar la sentencia preparada
    mysqli_stmt_close($stmt);

    header("Location: index.php");
    exit(); // Salir después de redirigir para evitar ejecución de código adicional
}
?>
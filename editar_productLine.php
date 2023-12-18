<?php
include('conexion_db.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos actuales del registro para prellenar el formulario de edición
    $query = "SELECT * FROM productlines WHERE productLine = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $fila = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($stmt);

    if (!$fila) {
        die("Registro no encontrado");
    }
}

if(isset($_POST['bt_editar_lineaproducto'])) {
    // Capturar los datos enviados por el formulario
    $productLine = $_POST['productLine'];
    $textDescription = $_POST['textDescription'];
    $htmlDescription = $_POST['htmlDescription'];

    // Preparar la sentencia SQL para la actualización
    $query = "UPDATE productlines SET textDescription = ?, htmlDescription = ? WHERE productLine = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss", $textDescription, $htmlDescription, $productLine);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classicmodels CRUD con PHP y MySQL - Editar</title>
    
</head>
<body>

    <h2>Editar Linea de Producto</h2>

    <form action="" method="POST">
        <label for="productLine">Linea del Producto:</label><br>
        <input type="text" id="productLine" name="productLine" value="<?php echo $fila['productLine']; ?>" readonly><br>

        <label for="textDescription">Descripcion:</label><br>
        <textarea name="textDescription" id="textDescription" cols="30" rows="2"><?php echo $fila['textDescription']; ?></textarea><br>

        <label for="htmlDescription">Descripcion:</label><br>
        <textarea name="htmlDescription" id="htmlDescription" cols="30" rows="2"><?php echo $fila['htmlDescription']; ?></textarea><br>

        <button name="bt_editar_lineaproducto" type="submit" value="Editar Linea de Producto">Guardar Edición</button>
    </form>

</body>
</html>
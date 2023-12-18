<?php
// Antes que todo hay que incluir la conexión para que esté disponible en la página
include('conexion_db.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classicmodels CRUD con PHP y MySQL</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-9a7or1qAxhqYNLON5U1WQzGdT0GZyEtI6QlD2sb9XxYP92uUj1aCI7z6j74cxHC3+9i9uO6O8J/LU5MI7I5i/g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <form action="guardar_productline.php" method="POST" onsubmit="return validarFormulario()">
        <label for="productLine">Linea del Producto:</label><br>
        <input type="text" id="productLine" name="productLine" required><br>

        <label for="textDescription">Descripcion:</label><br>
        <textarea name="textDescription" id="textDescription" cols="30" rows="2" required></textarea><br>

        <label for="htmlDescription">Descripcion:</label><br>
        <textarea name="htmlDescription" id="htmlDescription" cols="30" rows="2" required></textarea><br>

        <button name="bt_guardar_lineaproducto" type="submit" value="Guardar lienaProduct">Guardar Linea del Producto</button>
    </form>

    <table border="1" cellpadding="2">
        <thead>
            <tr>
                <th>Linea del Producto</th>
                <th>Descripción</th>
                <th>Text</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM productlines";
            $resultado = mysqli_query($conn, $query);
            while ($fila = mysqli_fetch_array($resultado)) {
            ?>
                <tr>
                    <td><?php echo $fila['productLine'] ?></td>
                    <td><?php echo $fila['textDescription'] ?></td>
                    <td><?php echo $fila['htmlDescription'] ?></td>
                    <td><?php echo $fila['image'] ?></td>
                    <td>
    <a class="icon-link" href="editar_productLine.php?id=<?php echo $fila['productLine'] ?>">
        <i class="fas fa-edit"></i> Editar
    </a>
    <a class="icon-link" href="eliminar_productLine.php?id=<?php echo $fila['productLine'] ?>">
        <i class="fas fa-trash-alt"></i> Eliminar
    </a>
</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script>
        function validarFormulario() {
            // Obtener valores de los campos
            var productLine = document.getElementById("productLine").value;
            var textDescription = document.getElementById("textDescription").value;
            var htmlDescription = document.getElementById("htmlDescription").value;

            // Validar que los campos no estén vacíos
            if (productLine.trim() === '' || textDescription.trim() === '' || htmlDescription.trim() === '') {
                alert("Por favor, llena todos los campos antes de enviar el formulario.");
                return false; // Evitar que se envíe el formulario si hay campos vacíos
            }

            return true; // Permitir el envío del formulario si todos los campos están llenos
        }
    </script>

</body>

</html>
<?php 
    include "../../clases/Auth.php";

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $Auth = new Auth();

    if ($Auth->registrar($usuario, $password)) {
        header("location:../../login.php");
    } else {
        echo "No se pudo registrar";
    }

?>
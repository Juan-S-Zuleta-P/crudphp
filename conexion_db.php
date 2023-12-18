<?php
$conn = mysqli_connect(
'localhost',
'root',
'root',
'classicmodels'
);

$conexion= new mysqli('localhost','root','root','login');

if(isset($conexion)){
    echo 'La BD login está conectada';
    }

if(isset($conn)){
echo 'La BD classicmodels está conectada';
}

?>
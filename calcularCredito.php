<?php
session_start();
$user = $_SESSION["username"];
//conexion a la Base de datos (Servidor,usuario,password)
$conn = mysqli_connect('localhost','root','','perros');
if (!$conn) {
    die("Error de conexion: " . mysqli_connect_error());
}

$sql = "select * from perros where nombreDueno='$user'";

$result = mysqli_query($conn, $sql);
//cuantos reultados hay en la busqueda
$num_resultados = mysqli_num_rows($result);


require "PagConsultarPerro.php";
?>
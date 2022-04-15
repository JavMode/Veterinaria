<?php
session_start();
//conexion a la Base de datos (Servidor,usuario,password)
$conn = mysqli_connect('localhost','root','','sesiones');
if (!$conn) {
    die("Error de conexion: " . mysqli_connect_error());
}
//(nombre de la base de datos, $enlace) mysql_select_db("RelocaDB",$link);
//capturando datos
$nombre = $_POST["txtUsuario"];
$password = $_POST["txtPassword"];

if(isset($_POST["botonRegistrar"])){
    $passEncriptado = password_hash($password,PASSWORD_DEFAULT);
    $queryregistrar = "insert into login (user,password) values ('$nombre','$passEncriptado')";
    if(mysqli_query($conn,$queryregistrar)){
        echo "<script>alert('Registrado');</script>";
    }else{
        echo "error";
    }
}

require "PaginaIniciarSesion.php";
?>
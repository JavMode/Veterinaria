<?php
//conexion a la Base de datos (Servidor,usuario,password)
session_start();
/*if(!isset($_SESSION["username"])){
    header("Location: index.php");
}*/
$conn = mysqli_connect('localhost','root','','sesiones');
if (!$conn) {
die("Error de conexion: " . mysqli_connect_error());
}
//(nombre de la base de datos, $enlace) mysql_select_db("RelocaDB",$link);
//capturando datos
$user = $_POST["txtUsuario"];
$password = $_POST["txtPassword"];

if(isset($_POST["botonLogin"])){
    $queryusuario = mysqli_query($conn,"select * from login where user = '$user'");
    $nr = mysqli_num_rows($queryusuario);
    $buscarpass = mysqli_fetch_array($queryusuario);
    if(($nr == 1) && (password_verify($password,$buscarpass["password"]))){
        $_SESSION["username"]=$user;
        echo "<script>alert('Bienvenido:$user');</script>";
    }else{
        echo "<script>alert('error');window.location='index.php'</script>";
    }
}

require "PagConsultarPerro.php";
?>
<?php
//conexion a la Base de datos (Servidor,usuario,password)
$conn = mysqli_connect('localhost','root','','admin');
if (!$conn) {
die("Error de conexion: " . mysqli_connect_error());
}
//(nombre de la base de datos, $enlace) mysql_select_db("RelocaDB",$link);
//capturando datos
$user = $_POST["txtUsuario"];
$password = $_POST["txtPassword"];

if(isset($_POST["botonLogin"])){
    $queryusuario = mysqli_query($conn,"select * from admin where user = '$user' and password = '$password'");
    $nr = mysqli_num_rows($queryusuario);
    if($nr == 1){
        $_SESSION["admin"]="admin";
        echo "<script>alert('Bienvenido: $user');</script>";
    }else{
        echo "<script>alert('error');window.location='index.html'</script>";
    }
}

require "PaginaVeterinaria.php";
?>
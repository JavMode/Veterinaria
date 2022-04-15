<?php
//conexion a la Base de datos (Servidor,usuario,password)
$conn = mysqli_connect('localhost','root','','perros');
if (!$conn) {
    die("Error de conexion: " . mysqli_connect_error());
}
//(nombre de la base de datos, $enlace) mysql_select_db("RelocaDB",$link);
//capturando datos
$v2 = $_REQUEST['nombrePerro'];
if($v2 == "all"){
    $sql = "select * from perros";
}else{
    $sql = "select * from perros where nombrePerro like '".$v2."'";
}

$result = mysqli_query($conn, $sql);
//cuantos reultados hay en la busqueda
$num_resultados = mysqli_num_rows($result);

require "PaginaVeterinaria.php";
?>
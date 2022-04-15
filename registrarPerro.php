<?php
//conexion a la Base de datos (Servidor,usuario,password)
$conn = mysqli_connect('localhost','root','','perros');
if (!$conn) {
    die("Error de conexion: " . mysqli_connect_error());
}
//(nombre de la base de datos, $enlace) mysql_select_db("RelocaDB",$link);
//capturando datos
    $nombreDueno = $_POST['nombreDueno'];
    $nombrePerro = $_POST['nombrePerro'];
    $day = $_POST['day'];
    $sintoma = $_POST['sintoma'];
    $sangre = $_POST['sangre'];
    $medicina = $_POST['medicina'];
    if(!is_uploaded_file($_FILES['foto']['tmp_name'])){
        $photo=NULL;
    }else{
        $revisar =getimagesize($_FILES['foto']['tmp_name']);
        if($revisar != null){
            $image = $_FILES['foto']['tmp_name'];
            $photo = addslashes(file_get_contents($image));
        }else{
            $photo=NULL;
        }
    }
//conuslta SQL
if(isset($_POST["RegistrarPerro"])){
        $queryregistrar = "insert into perros (nombreDueno,nombrePerro,day,sintoma,sangre,medicina,imagen) values ('$nombreDueno','$nombrePerro','$day','$sintoma','$sangre','$medicina','$photo')";
        if(mysqli_query($conn,$queryregistrar)){
            echo "<script>alert('Registrado');</script>";
        }else{
            echo "error";
        }
}

require "PaginaVeterinaria.php";
?>

<?php
    if(!isset($_SESSION["username"])){
        header("Location: index.php");
    }
    $user = $_SESSION["username"];
    $GLOBALS['precioSintomasTotal']=0;
    $GLOBALS['precioSangreTotal']=0;
    $GLOBALS['precioMedicinaTotal']=0;
    $GLOBALS['precioImagenTotal']=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria de Perros</title>
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Trocchi&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="imagenInicio">
            <center><img  src="imagenes/logo.jpg"></center>
        </div>
        <nav>
            <ul>
            <li><a href="index.php">Inicio</a></li>
                <li><a href="#servicios">Consultar</a></li>
                <li><a href="logout.php" style="background-color: white;color:#1D3291;">Cerrar Sesión</a></li>
                <li><a>Bienvenido <?php echo $user?></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div>
            <center><img src="imagenes/imagen.jpg"></center>
        </div>
        <div class="barra">
            <p>Servicios médico-veterinarios</p>
            <p>con gran calidez humana</p>
        </div>
        <div class="servicios" id="servicios">
            <h1>Servicios</h1>
        </div>
        <div class="resultadocss"> 
        <br>
        <p style="text-align:center;font-size:30px; color:cadetblue">Consulte el estado de su perro:</p>
        <br>
        <div style="background-image: url('imagenes/fondo.jpg');" class="consultar"> 
        <br>
        <form style="margin: auto; width: 220px;" action="ConsultarPerro.php" method="GET">
            <Input class="controls" Type = Text name = "nombrePerro" placeholder="Ingresar nombre de Perro" style="width:250px;">
            <Input class="btn" Type = Submit value = "Buscar">
        </form>
        <?php
            if(isset($_GET['nombrePerro'])) { ?>
                <table class="resultadosAdmin">
                    <tr>
                        <th class="resultadosTituloAdmin">Dueño</th>
                        <th class="resultadosTituloAdmin">Perro</th>
                        <th class="resultadosTituloAdmin">Día de consulta</th>
                        <th class="resultadosTituloAdmin">Síntomas</th>
                        <th class="resultadosTituloAdmin">Sangre</th>
                        <th class="resultadosTituloAdmin">Medicina</th>
                        <th class="resultadosTituloAdmin">RayosX</th>
                    </tr>
                <?php
                for ($i=0; $i <$num_resultados; $i++) {
                    $row = mysqli_fetch_array($result); ?>
                    <tr>
                        <td class="resultadosContenidoAdmin">
                            <?php echo $row["nombreDueno"]; ?>
                        </td>
                        <td class="resultadosContenidoAdmin">
                            <?php echo $row["nombrePerro"]; ?>
                        </td>
                        <td class="resultadosContenidoAdmin">
                            <?php echo $row["day"]; ?>
                        </td>
                        <td class="resultadosContenidoAdmin">
                            <?php echo $row["sintoma"]; ?>
                        </td>
                        <td class="resultadosContenidoAdmin">
                            <?php echo $row["sangre"]; ?>
                        </td>
                        <td class="resultadosContenidoAdmin">
                            <?php echo $row["medicina"]; ?>
                        </td>
                        <td class="resultadosContenidoAdmin">
                            <?php echo "<img src='data:image/jpeg;base64,".base64_encode($row["imagen"])."'/>" ?>
                        </td>
                    </tr>
                <?php } ?>
                </table>
            <?php }  ?>
        <br>
        </div>
        </div>
        <div class="sistemaPago">
            <form style="margin: auto; width: 220px;" action="calcularCredito.php" method="GET">
                <Input class="btn" Type = Submit value = "Calcular Crédito" name="botonCredito">
            </form>
            <?php
            if(isset($_GET['botonCredito'])) { ?>
                <table class="resultadosAdmin">
                    <tr>
                        <th class="resultadosTituloAdmin">Perro</th>
                        <th class="resultadosTituloAdmin">Día de consulta</th>
                        <th class="resultadosTituloAdmin">Síntomas</th>
                        <th class="resultadosTituloAdmin">Sangre</th>
                        <th class="resultadosTituloAdmin">Medicina</th>
                        <th class="resultadosTituloAdmin">RayosX</th>
                    </tr>
                <?php
                for ($i=0; $i <$num_resultados; $i++) {
                    $row = mysqli_fetch_array($result); ?>
                    <tr>
                        <td class="resultadosContenidoAdmin">
                            <?php echo $row["nombrePerro"]; ?>
                        </td>
                        <td class="resultadosContenidoAdmin">
                            <?php echo $row["day"]; ?>
                        </td>
                        <td class="resultadosContenidoAdmin">
                            <?php echo $row["sintoma"]; ?>
                        </td>
                        <td class="resultadosContenidoAdmin">
                            <?php echo $row["sangre"]; ?>
                        </td>
                        <td class="resultadosContenidoAdmin">
                            <?php echo $row["medicina"]; ?>
                        </td>
                        <td class="resultadosContenidoAdmin">
                            <?php echo "<img src='data:image/jpeg;base64,".base64_encode($row["imagen"])."'/>" ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="resultadosContenidoAdmin"> 
                        </td>
                        <td class="resultadosContenidoAdmin">
                            <?php echo "Precio individual de la consulta"?>
                        </td>
                        <td class="resultadosContenidoAdmin">
                            <?php if($row["sintoma"]!=NULL){
                                $precioSintoma=10;
                                $GLOBALS['precioSintomasTotal']+=$precioSintoma;
                                echo "$".$precioSintoma;
                            }?>
                        </td>
                        <td class="resultadosContenidoAdmin">
                            <?php if($row["sangre"]!=NULL){
                                $precioSangre=40;
                                $GLOBALS['precioSangreTotal']+=$precioSangre;
                                echo "$".$precioSangre;
                            }?>
                        </td>
                        <td class="resultadosContenidoAdmin">
                            <?php if($row["medicina"]!=NULL){
                                $precioMedicina=50;
                                $GLOBALS['precioMedicinaTotal']+=$precioMedicina;
                                echo "$".$precioMedicina;
                            }?>
                        </td>
                        <td class="resultadosContenidoAdmin">
                            <?php if($row["imagen"]!=NULL){
                                $precioRayosX=100;
                                $GLOBALS['precioImagenTotal']+=$precioRayosX;
                                echo "$".$precioRayosX;
                            }?>
                        </td>
                    </tr>
                <?php } ?>
                </table>
            <?php }  ?>
        </div>
        <div class="precioTotal">
            <?php echo "El total a pagar sería: ". ($GLOBALS['precioImagenTotal']+$GLOBALS['precioSintomasTotal']+$GLOBALS['precioSangreTotal']+$GLOBALS['precioMedicinaTotal']); ?>
        </div>
    </main>
    <footer>
        <div class="footer" id="footer"> 
            <div class="box_footer">
                <h2>Contacto</h2>
                <a href="https://www.facebook.com/javier.wanzhu"><i class="fab fa-facebook-square"></i>Javier Wan Zhu</a>
                <a href="https://twitter.com/WanJavier"><i class="fab fa-twitter-square"></i>@WanJavier</a>
                <a href="https://www.instagram.com/javwan18/"><i class="fab fa-instagram-square"></i>@javwan18</a>
            </div>
        </div>
    </footer>
</body>
</html>
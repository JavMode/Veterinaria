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
                <li><a href="paginaAdmin.php" style="background-color: white;color:#1D3291;">Iniciar Sesión</a></li> 
            </ul>
        </nav>
    </header>
    <div class="contenedorIniciarSesion" style="width:100%; heigth:200px;">
        <div class="iniciarSesion">
            <h1>Iniciar Sesión</h1>
            <form method="POST" action="iniciarSesionAdmin.php">
                <input type="text" name="txtUsuario" placeholder="Ingresar usuario" required>
                <input type="password" name="txtPassword" placeholder="Ingresar contraseña" required>
                <input type="submit" value="Iniciar sesión" name="botonLogin" class="btnLogin">
            </form>
        </div>
    </div>
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
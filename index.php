<?php 
include('./php/conexion.php');
session_start();
error_reporting(0);
    // Verificar si el usuario ya ha iniciado sesión
if( $_SESSION['rol'] == 2){
    header("location: ./php/user.php ");
}else if( $_SESSION['rol'] == 1){
    header("location: ./php/user.php ");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./asset/css/index.css">

    <title>inventario</title>
</head>
<body>
    <header>
        <h1>sistema de inventario</h1>
    </header>
    <main>
        <h2>iniciar sesión</h2>
    <form action="" method="post">
        <div>
        <label for="">Nombre</label>
        <input type="text" name= "user" >
        </div>
        <div>
        <label for="">Contraseña</label>
        <input type="password" name="clave">
        
        </div>
        <input type="submit" name="acceder" value="acceder" >
    </form>
    <?php 
    include('./php/acceso.php');
    
    ?>
    </main>
   
<footer>2023 ADSO</footer>
</body>
</html>
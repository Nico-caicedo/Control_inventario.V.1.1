<?php 
session_start();

$name = $_SESSION['nombre'];

// Verificar si el usuario ha iniciado sesión correctamente
if (!isset($_SESSION['nombre']) ) {
    // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header("location: ../index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width" />
  <title>Control de Inventario de Aulas</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <link rel="stylesheet" href="../asset/css/user.css">
  <link rel="shortcut icon" href="../asset/img/icon.png" type="image/x-icon">

</head>

<body>
  <div>

  </div>
  <nav class="container_boton">
    <h1 id="big">Sistema De asignación de Ambientes</h1>
    <h2 id="small">SAA</h1>

    <ul id="menu">
      <li><a href="" class="select">inicio</a></li>

      <li> <a href="agregar_aula.php" class="no_selec">Aulas</a></li>
      <li><a href="agregar_elemento.php">elementos</a></li>
      <?php 
      
      if( $_SESSION['rol'] == 0){
        echo "<li><a href='usuario.php'>usuarios</a>";
    }

      ?>
      
      <li> <a href="inventario.php" class="no_selec">Inventario</a></li>
      <li> <a href="cerrar.php" class="no_selec">cerrar sesión</a></li>



    </ul>

    <img class="burger" src="../asset/img/menu.svg" alt="">
  </nav>



  <main>
    <div class="content">
      <p class="text">Un sistema que permite la gestion de inventario en las aulas que esten disponible
        permitiendo al usuario, ver los elementos de cada ambiente, modificar u eliminar estos elementos e
        incluso la
        opción de crear nuevas aulas
      </p>
      <img class="inventario_img" src="../asset/img/inventario.svg" alt="">

    </div>

  </main>


</body>
<footer>
  <p >ADSO 2023</p>
</footer>
</html>
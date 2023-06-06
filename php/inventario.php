<?php
session_start();

$name = $_SESSION['nombre'];

// Verificar si el usuario ha iniciado sesión correctamente
if (!isset($_SESSION['nombre'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header("location: ../index.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/agregar_aula.css">
    <link rel="stylesheet" href="../asset/css/inventario.css">
    <title>Crear Aula</title>
</head>

<body>
<nav class="container_boton">
    <h1 id="big">Sistema De asignación de Ambientes</h1>
    <h2 id="small">SAA</h1>

    <ul id="menu">
      <li><a href="user.php" class="no_selec">inicio</a></li>

      <li> <a href="agregar_aula.php" class="no_selec">Aulas</a></li>
      <li><a href="agregar_elemento.php">elementos</a></li>
      <?php 
      
      if( $_SESSION['rol'] == 0){
        echo "<li><a href='usuario.php'>usuarios</a>";
    }

      ?>
      
      <li> <a href="inventario.php" class="select">Inventario</a></li>
      <li> <a href="cerrar.php" class="no_selec">cerrar sesión</a></li>



    </ul>

    <img class="burger" src="../asset/img/menu.svg" alt="">
  </nav>

    <main>
        <div class="header">
            <h1>inventario</h1>
            <div class="botones">
                <button id="boton-seccion-1" data-target="seccion-1">Ver Ambiente</button>
                <button id="boton-seccion-2" data-target="seccion-2">Ver elementos en ambiente</button>

            </div>
        </div>
        <?php

        if ($_SESSION['rol'] == 2) {
            echo " <style>
            #ocultar{
                display:none;
            }
        </style>";
        }


        ?>



        <div id="seccion-1">
            <div>
                <h1>Ambientes</h1>
                <div class="list-aula">
                    <table>
                        <thead>

                            <th>Nombre de aula</th>
                            <th>código</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody class="body_table" id="show-a">


                        </tbody>
                    </table>

                </div>
            </div>

        </div>

        <div id="seccion-2">
            <div>
                <select id="select-ambiente">
                    <option value="">Seleccionar ambiente</option>
                    
                    <!-- otras opciones -->
                </select>
                <!-- Creamos una tabla para mostrar los datos -->
                <table id="tabla_inventario">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Aula</th>
                            <th>Categoría</th>
                            <th>Marca</th>
                            <th>Elemento</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>


    </main>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="../asset/js/add.js"></script>
    <script src="../asset/js/show_sec.js"></script>
    <script src="../asset/js/add_e.js"></script>
    <script src="../asset/js/estado.js"></script>
</body>

</html>
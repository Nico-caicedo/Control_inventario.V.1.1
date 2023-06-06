<?php
include('conexion.php');

if(isset($_POST['id'])){
$id = $_POST['id'];

    $query = "DELETE FROM elementos where id_elemento = '$id'";
    $result = mysqli_query($conn, $query);
    if($result){
        echo"elemento eliminado";
    }
}
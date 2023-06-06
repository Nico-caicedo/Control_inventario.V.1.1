<?php  
include('conexion.php');
if(isset($_POST['crear'])){
    $name = $_POST['name'];
    $marca= $_POST['marca'];
    $code= $_POST['cod'];
    $categoria = $_POST['categoria'];
    $estado = 1 ;

    $query = "INSERT INTO elementos(nombre_elemento, marca, code, categoria, estado) VALUES ('$name','$marca', '$code', '$categoria','$estado')";
     $result = mysqli_query($conn, $query);

     if($result){
        echo"elemnto creado";
     }else{
        echo "error al crear elemento";    
     }
    
}



?>
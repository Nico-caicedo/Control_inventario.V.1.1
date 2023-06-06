<?php  
include('conexion.php');
if(isset($_POST['crear'])){
    $name = $_POST['name'];
    $cod= $_POST['cod'];

    $query = "INSERT INTO aulas(nombre, cod) VALUES ('$name', '$cod')";
     $result = mysqli_query($conn, $query);

     if($result){
        echo"aula creada";
     }else{
        echo "error al crear aula";    
     }
    
}



?>
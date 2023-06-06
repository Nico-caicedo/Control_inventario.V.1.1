<?php 


include('conexion.php');

if(isset($_POST['id'])){

    $id = $_POST['id'];

    $query = "SELECT * FROM elementos WHERE id_elementos = '$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        $json = array();
        while($row = mysqli_fetch_array($result)){

            $json[] = array(
                'name' => $row['nombre'],
                'cod' => $row['cod'],
                'id' => $row['id_aula'],
            );

            $jsonstring = json_encode($json[0]);
            echo $jsonstring;
        }
    }
    
};


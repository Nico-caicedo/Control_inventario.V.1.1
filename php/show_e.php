<?php 


include('conexion.php');
$estado = 1;

$query = "SELECT * FROM elementos where estado = $estado";
$result = mysqli_query($conn, $query);

if($result){

    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'name' => $row['nombre_elemento'],
            'cod' => $row['code'],
            'id' => $row['id_elemento']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}



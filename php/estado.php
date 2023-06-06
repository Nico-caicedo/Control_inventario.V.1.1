

<?php
include('conexion.php'); // incluir archivo de conexión a la base de datos


    $idAmbiente = $_POST['idAmbiente'];

    $sql = "SELECT inventario.id, aulas.nombre AS nombre_aula, categoria.nombre AS nombre_categoria, marca.nombre AS nombre_marca, elementos.nombre_elemento AS nombre_elemento, inventario.estado
    FROM inventario
    INNER JOIN aulas ON inventario.id_aula = aulas.id_aula
    INNER JOIN categoria ON inventario.id_categoria = categoria.id
    INNER JOIN marca ON inventario.id_marca = marca.id
    INNER JOIN elementos ON inventario.id_elemento = elementos.id_elemento
    WHERE inventario.id_aula = $idAmbiente";

// realizar la consulta


$result = mysqli_query($conn, $sql); // ejecutar consulta

if($result){
echo " esta funcionado";
}else{
echo "no esta funcionado";
}



// almacenar resultados en un array
$inventario = array();
while ($row = mysqli_fetch_assoc($result)) {
$inventario[] = $row;
}


mysqli_free_result($result); // liberar memoria
mysqli_close($conn); // cerrar conexión a la base de datos

header('Content-Type: application/json'); // especificar tipo de contenido como JSON

echo json_encode($inventario); // enviar resultados como JSON


   

?>


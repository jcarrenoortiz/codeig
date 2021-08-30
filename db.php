<?php

/*class Mysql{
    private $host='localhost';
    private $user='root';
    private $password='';
    private $dbname ='';

     onstructor($host,$user,$password,$dbname){

        $this.$host=$host;

    }
}*/

@$db = new mysqli('localhost','root','','prueba');

if($db->connect_errno != null){
    echo "Error número $db->connect_errno conectando a la base de datos.<br>Mensaje: $db->connect_error.";
    exit();
}

//Cambo de base de datos
//$db->select_db('nombre_base_de_datos');

$db->set_charset('utf8');
$query = "SELECT * FROM pagos";
$sql = $db->query($query);

$nRows = $sql->num_rows;/* Filas*/
echo $nRows;
$nColumns = $sql->field_count; /* Columnas */
echo $nColumns;
$fila='';


if( $db->affected_rows > 0 ){
    while($col = $sql->fetch_array()){
       for($i=0; $i<$nColumns; $i++){
          $fila = $fila." | ".$col[$i];
        //echo $row[0]."-".$row[1]."-".$row[2]."<br/>";
        }
        echo "<br/>";
        echo $fila;
        $fila='';
        
    }
}else{
    echo "No hay registros.";
}
$db->commit();

$db->close();

$db = null;


$sql->free();


?>
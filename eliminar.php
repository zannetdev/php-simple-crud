<?php 
require_once('conexion.php');
$cnx = getCnx();
$uid = $_GET['id_coche'];
$x = mysqli_query($cnx, "DELETE FROM coche WHERE id_coche = '{$uid}'");
if($x){
    header('Location: ./index.php?v=1');
}
?>
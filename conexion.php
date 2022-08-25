<?php 
    function getCnx(){
        $cnx = mysqli_connect("localhost", "root", "", "db");
        return $cnx ? $cnx : die("Problemas en la conexión");
    }
    function closeCnx(mysqli $cnx){
        mysqli_close($cnx);
    }
?>
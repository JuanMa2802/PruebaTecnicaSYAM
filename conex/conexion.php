<?php

function Conectar(){
    $host = "localhost";
    $user = "root";
    $pass = "";

    $db_nombre = "db_syam";

    $con = mysqli_connect($host, $user, $pass);

    mysqli_select_db($con, $db_nombre);

    return $con;

}


?>
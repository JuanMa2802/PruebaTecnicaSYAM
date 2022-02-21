<?php

include("../conex/conexion.php");
$con = Conectar();

$Nombre = $_POST['nombre']; // Formulario de Orden
$Fecha = $_POST['fecha']; // Formulario de Orden
$Subtotal = $_POST['precio_subtotal']; // Formulario de Orden
$Iva = $_POST['iva']; // Formulario de Orden
$Total = $_POST['precio_total']; // Formulario de Orden

$articulo = $_POST['articulo_text']; // Formulario de Detalles de Orden

$idOrden = 1;


$sql = "INSERT INTO orden VALUES('','$Nombre', '$Fecha', '$Subtotal', '$Iva', '$Total')";

$query = mysqli_query($con, $sql);

$idOrden = mysqli_insert_id($con);

    foreach($_POST['articulo_text'] as $id_articulo){

        mysqli_query($con,"INSERT INTO detalles_orden (Id,Id_Orden, Id_articulo) VALUES('', $idOrden, '$id_articulo')");
    }



if($query){
    echo "
    <script> 
    alert('Compra registrada correctamente');
    window.location= '../menu.php';
    </script>";
}else{

}


?>
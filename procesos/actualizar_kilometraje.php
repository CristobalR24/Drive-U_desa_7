<?php 
include('../conexion/conexion.php');


if(isset($_POST['vehiculo_v']) & isset($_POST['kilometraje_v']) & isset($_POST['viaje_v'])){
    $km=$_POST['kilometraje_v'];
    $id=$_POST['vehiculo_v'];
    $id_v=$_POST['viaje_v'];

    $sqlUpdate = $con->exec("UPDATE vehiculos SET kilometraje='$km' WHERE id_vehiculo=$id");
    $sqlUpdate = $con->exec("UPDATE viajes SET estado=2 WHERE id_viaje=$id_v"); //viaje realizado

    header("Location: ../secciones/viajespendientes.php?msg=Kilometraje Actualizado&id_viaje=".$id_v);
    exit();
    
}

?>
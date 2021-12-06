<?php
//echo __DIR__;
include("../conexion/conexion.php");
$id_usuario=$_SESSION['id'];
$resultado=$con->query("SELECT * FROM usuarios WHERE id_usuario='$id_usuario'");
$datos_usuario=$resultado->fetch(PDO::FETCH_OBJ);
?>
<?php
include('../conexion/conexion.php');

echo $id_s= $_POST["id_sol"];

header("Location: ../secciones/aceptar_solicitud.php?id=".$id_s);
exit();
?>
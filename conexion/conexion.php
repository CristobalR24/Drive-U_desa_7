<?php
include("configuracion.php");

try {
    $con = new PDO("mysql:host=".HOST_NAME.";dbname=".DATABASE,USER_NAME,PASS);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Conexión exitosa <br>";
} catch (PDOException $e) {
    echo "Problema de conexión : " . $e->getMessage();
}

?>
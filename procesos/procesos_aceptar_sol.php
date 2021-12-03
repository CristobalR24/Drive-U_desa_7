<?php
include('../conexion/conexion.php');

if(isset($_POST['btnSeleccionado'])) {
    elegir();}

if(isset($_POST['rechazar'])) {
    rechazar();}

if(isset($_POST['aceptar'])) {
    aceptar();}

function elegir(){
echo $id_s= $_POST["id_sol"];

header("Location: ../secciones/aceptar_solicitud.php?id=".$id_s);
exit();
}

function rechazar(){
    global $con;
  echo "<br> ".$_POST["id_sol"]."<br><br>";
  $id=$_POST["id_sol"];

    if(!isset($_POST["razon"]))
        echo $razon = "";
    else
        echo $razon = implode(", ",$_POST["razon"]);

    $sqlUpdate = $con->exec("UPDATE solicitud SET estado=3,razon='$razon' WHERE id_solicitud=".$id);
    header("Location: ../secciones/aceptar_solicitud.php?msg=Solicitud rechazada");
    exit();

}

function aceptar(){
    global $con;
    $id_sol=$_POST['id_sol'];
    $hora=$_POST['hora'];
    $cantidad=$_POST['cantidad'];
    $vehiculo=$_POST['acepto_vehiculo'];
    $chofer=$_POST['acepto_chofer'];

    $evaluacion=$con->query('SELECT capacidad FROM vehiculos WHERE id_vehiculo='.$vehiculo);
        while($eva=$evaluacion->fetch(PDO::FETCH_OBJ)){
            $capa=$eva->capacidad;
        }

    if($cantidad>$capa)
        { header("Location: ../secciones/aceptar_solicitud.php?msg=capacidad de vehiculo excedida");
          exit();
        }
    
 
    if($hora>17) //a partir de las 6 p.m. (18 horas) se pide salvoconducto
        { header("Location: ../secciones/aceptar_solicitud.php?msg=Necesita salvoconducto");
          exit();
        }

    $evaluacion=$con->query('SELECT * FROM solicitud WHERE id_solicitud='.$id_sol);
        while($eva=$evaluacion->fetch(PDO::FETCH_OBJ)){
            $fecha=$eva->dia_viaje;
            $destino=$eva->final_destino;
        }
    
        $insertar = $con->prepare("INSERT INTO viajes(fecha,destino,vehiculo,cantidad_personas,id_chofer,estado) VALUES(?,?,?,?,?,1)");

        try {
            $insertar->execute([$fecha, $destino, $vehiculo, $cantidad,$chofer]);

            $sqlUpdate = $con->exec("UPDATE solicitud SET estado=2 WHERE id_solicitud=".$id_sol);

            $msg="Solicitud aprobada";
        } catch (PDOException $e) {
            $msg="Error al insertar: ".$e->getMessage();
        }
       
        header("Location: ../secciones/aceptar_solicitud.php?msg=".$msg);
        exit();

}




?>
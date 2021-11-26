<?php
include('../conexion/conexion.php');

if(isset($_POST['btnActualizar'])) {
    actualizar();}

if(isset($_POST['btnAgregar'])) {
    agregar();}

if(isset($_POST['btnEliminar'])) {
    eliminar();}

if(isset($_POST['btnBuscar'])) {
    buscar();}
    

function actualizar(){
    global $con;

    $ID=$_POST['m_id'];
    $kilometraje=$_POST['m_kilometraje'];
    $estado=$_POST['m_estado']; //agarra el value
    
    $sqlUpdate = $con->exec("UPDATE vehiculos SET kilometraje='$kilometraje', estado='$estado' WHERE id_vehiculo=".$ID);

    header("Location: ../secciones/estado_vehiculos.php");
    exit();
}

function agregar(){
    include("../clases/vehiculo.php");
    global $con;

    echo $placa = $_POST['m_placa'];
    echo $modelo = $_POST['n_modelo'];
    echo $marca = $_POST['m_marca'];
    echo $capacidad = $_POST['m_capacidad'];
    echo $kilometraje=$_POST['m_kilometraje'];
    echo $estado=$_POST['m_estado']; //agarra el value

    $datos = new Vehiculo($estado, $modelo, $capacidad, $placa, $marca, $kilometraje);

    $insertar = $con->prepare("INSERT INTO vehiculos(estado,modelo,capacidad,placa,marca,kilometraje) VALUES(:estado,:modelo,:capacidad,:placa,:marca,:kilometraje)");

    try {
        $insertar->execute((array)$datos);
        $msg="Vehiculo registrado";
    } catch (PDOException $e) {
        if($e->errorInfo[1] == 1062){
            $msg="Esta matricula ya esta registrado";
        }
        else
            $msg="Error al registrar: ".$e->getMessage();
    }
   
    header("Location: ../secciones/estado_vehiculos.php?msg=".$msg);
    exit();
}

function eliminar(){
    global $con;

    $ID = $_POST['m_id'];

    $sqlUpdate = $con->exec("DELETE FROM vehiculos WHERE id_vehiculo='".$ID."'");

    header("Location: ../secciones/estado_vehiculos.php");
    exit();
}

function buscar(){
    global $con;
    echo $criterio=$_POST['filtro'];
    echo $busqueda=$_POST['busqueda'];

    switch ($criterio) {
        case 0:
            $sql="SELECT v.id_vehiculo,m.modelo, placa,marca,estado,kilometraje,capacidad FROM vehiculos v INNER JOIN modelo m on v.modelo=m.id_modelo";
            break;
        case 1:
            $sql="SELECT v.id_vehiculo,m.modelo, placa,marca,estado,kilometraje,capacidad FROM vehiculos v INNER JOIN modelo m on v.modelo=m.id_modelo WHERE placa='".$busqueda."'";
            break;
        case 2:
            $sql="SELECT v.id_vehiculo,m.modelo, placa,marca,estado,kilometraje,capacidad FROM vehiculos v INNER JOIN modelo m on v.modelo=m.id_modelo WHERE m.modelo='".$busqueda."'";
            break;
        case 3:
            if(strcasecmp($busqueda, "disponible") == 0)
                $busqueda="1";
            else if(strcasecmp($busqueda, "no disponible") == 0)
                $busqueda="2";
            else if((strcasecmp($busqueda, "en mantenimiento") == 0) || (strcasecmp($busqueda, "mantenimiento") == 0))
                $busqueda="3";

            $sql="SELECT v.id_vehiculo,m.modelo, placa,marca,estado,kilometraje,capacidad FROM vehiculos v INNER JOIN modelo m on v.modelo=m.id_modelo WHERE estado='".$busqueda."'";
            break;
        case 4:
            $sql="SELECT v.id_vehiculo,m.modelo, placa,marca,estado,kilometraje,capacidad FROM vehiculos v INNER JOIN modelo m on v.modelo=m.id_modelo WHERE marca='".$busqueda."'";
            break;

    }

    header("Location: ../secciones/estado_vehiculos.php?sql=".$sql);
    exit();
}
?>
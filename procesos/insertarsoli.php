<?php
include('../conexion/conexion.php');
require('../clases/solicitud.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Drive-U -Estado de Solicitud</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
<link rel="stylesheet" type="text/css" href="../css/estilo_tabla_solicitud.css" />
</head>
<header>
   <div class="logo"><img src="../imagenes/logo_utp.png" width="120px">
    <span class="utp">Universidad Tecnológica de Panamá</span>
  </div> 
   <span class="titulo">Drive-U</span></header>
<body>
    <?php
    if(!empty($_POST))
    {
        $fecha = $_POST['fecha'];
        $correo = $_POST['correo'];
        $cantidad = $_POST['cantidad'];
        $destino = $_POST['Destino'];
        $Final = $_POST['Final'];
        $telefono = $_POST['Telefono'];
        $modelo = $_POST['modelo'];
        $estado = 1;
        $id = $_POST['id_solicitante'];;
        $razon = " ";
    
    }
    else{ ?>
  <div class="centrear" >
     <H1><?php echo "No se ha recibido en formulario";?><H1>
  </div>    
   <?php }
    $resultado = $con->query("SELECT * from solicitud where correo_electronico ='$correo' AND  estado = 1");
    $datos = $resultado->fetch(PDO::FETCH_OBJ);
    if($datos)
    {
    ?>
    <div class="centrear">
    <H1> <?php echo ("Su solicitud se esta procesando");?><H1>
    </div>
    <?php }else
    {
     $logica = new Solicitud($id,$destino,$estado,$razon,$telefono,$fecha,$cantidad,$correo,$modelo,$Final);
    try{
          $stmt=$con->prepare("INSERT INTO solicitud(id_usuario,inicio_destino,estado,razon,telefono,dia_viaje,cantidad_personas,correo_electronico,modelo_vehiculo,final_destino) VALUES (:id_solicitante,:inicio_destino,:estado,:razon,:telefono,:diaviaje,:cantida_personas,:correo_electronico,:id_vehiculo,:final_destino)");
          $stmt->execute((array)$logica);
          $id = $con->lastInsertId();
          $to = $correo;
          $subject = "Solicitud de Viaje";
          $message = "Gracias por enviar su solicitud adjuntamos el id de su solicitud para revisar el estado del mismo  ".$id;
          if (mail($to,$subject,$message))
          {
        ?>   <div class="centrear">
              <H1> <?php echo("Se envio con exito el correo"); ?> <H1>
            </div>
    <?php }else{
        ?>
           <div class="centrear">
           <H1> <?php echo ("Error al enviar el correo"); ?> <H1>
           </div>
  <?php } ?>
         <div class="centrear">
         <H1> <?php echo ("Solicitud procesada con exito"); ?> <H1>
         </div>
    <?php }catch(PDOException $e){
        ?>
        <div class="centrear">
         <H1> <?php echo ("No se pudo insertar la solicitud".$e); ?> <H1>
         </div>
    <?php }
    
    }?>

</body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer>
     <br>
	 ©2021. Drive-U.
     Universidad Tecnológica de Panamá
     <BR>
     Confeccionado por Angel Carrillo, Wencers Castillo, Elianys González, Karla Quiel, Cristobal Rodriguez y Luis Saldaña. 
     <br><br>
 	</footer>
</body>
</html>
 
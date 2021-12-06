<?php
$correo = $_POST['correo'];
$cadena = 'Salvoconducto';


include('../procesos/verificarSesion.php');
if(isset($_SESSION['sw'])){
  include("../procesos/consultarUser.php");
}
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
$versal = $con->query("SELECT * FROM salvoconducto WHERE correo_electronico='$correo' and estado=1");
$salva = $versal->fetch(PDO::FETCH_OBJ);
$verificar = $con->query("Select * from solicitud WHERE correo_electronico='$correo' and estado= 3 and razon like '%$cadena%'");
$ver = $verificar->fetch(PDO::FETCH_OBJ);
$resultado = $con->query("Select b.nombre,b.id_usuario,a.inicio_destino,b.cedula,a.cantidad_personas,a.modelo_vehiculo,a.correo_electronico,a.final_destino,a.telefono from solicitud a inner join usuarios b on b.id_usuario = a.id_usuario WHERE a.correo_electronico like'$correo' and a.razon like '%$cadena%' and a.id_usuario = $datos_usuario->id_usuario");
if($ver == true){
    if($salva ==  false){
      while($datos_user=$resultado->fetch(PDO::FETCH_OBJ)){
         $nombre = $datos_user->nombre;
         $id_usuario = $datos_user->id_usuario;
         $inicio_destino = $datos_user->inicio_destino;
         $cedula = $datos_user->cedula;
         $cantidad_personas = $datos_user->cantidad_personas;
         $modelo = $datos_user->modelo_vehiculo;
         $correo = $datos_user->correo_electronico;
         $final = $datos_user->final_destino;
         $telefono = $datos_user->telefono;
     }
     $estado = 1;
     try{
         $data = ['nombre'=>$nombre,'id_usuario'=>$id_usuario,'inicio_destino'=>$inicio_destino,'cedula'=>$cedula,'cantidad_personas'=>$cantidad_personas,'modelo_vehiculo'=>$modelo,'correo'=>$correo,'final_destino'=>$final,'telefono'=>$telefono,'estado'=>$estado];
         $sql = "INSERT INTO salvoconducto(nombre_solicitante,id_solicitante,destino,cedula,cantidad_personas,tipo_vehiculo,correo_electronico,final_destino,telefono,estado) VALUES (:nombre,:id_usuario,:inicio_destino,:cedula,:cantidad_personas,:modelo_vehiculo,:correo,:final_destino,:telefono,:estado)";
         $stmt = $con->prepare($sql);
         $stmt->execute($data);
         ?>
         <div class="centrear">
             <H1> <?php echo("Se inserto con exito"); ?> <H1>
            </div>
         <?php
         $to = $correo;
         $subject = "Solicitud de Salvoconducto";
         $message = "Gracias por solicitar su salvoconducto acerquese al departamento de Vehiculos de la UTP para mas informacion";
         if (mail($to,$subject,$message))
         {   ?>
             <div class="centrear">
             <H1> <?php echo("Se envio con exito el correo"); ?> <H1>
            </div>
     <?php }else{
         ?><div class="centrear">
           <H1><?php echo ("Error al enviar el correo"); ?> <H1>
             </div>
        <?php }     
     }catch(PDOException $e){
     ?>
    <div class="centrear">  
     <H1> <?php echo("Error en la insercion".$e); ?> 
     <H1>
     <div>
    <?php } 
 }else if($salva == true ){
     ?>
     <div class="centrear">
     <H1> <?php echo("Su solicitud esta siendo procesada"); ?> <H1> 
     </div>
 <?php }   
 } else if($ver == false ){
     ?>
     <div class="centrear">
    <H1> <?php echo("Debe esperar a que su solictud sea revisada"); ?> <H1>
 </div>
  <?php
  }
 ?>
?>
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
 
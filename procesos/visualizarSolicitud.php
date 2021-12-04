<?php
include('../conexion/conexion.php');

$id_solicitud  = $_POST['estado'];
$consulta = $con->query('SELECT id_solicitud,correo_electronico,estado,razon,telefono,dia_viaje FROM solicitud where id_solicitud ='.$id_solicitud);
$co = $con->query('SELECT * From solicitud where id_solicitud ='.$id_solicitud);
$details = $co->fetch(PDO::FETCH_OBJ); 
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
   
   <nav>
    <ul>
		  <li><a href="../index.php">Inicio</a></li>
      <li><a href="../secciones/preguntas_frecuentes.php">Preguntas frecuentes</a></li>
			<li><a href="#">Servicios</a>
        <div class="submenu">
          <ul><a href="../secciones/crear_solicitud.php">Crear solicitud</a></ul>
          <ul><a href="../secciones/estado_solicitud.php">Estado de solicitud</a></ul>
        </div>
      </li>

      <li><a href="#">Opciones de administrador</a>
        <div class="submenu">
          <ul><a href="../secciones/crear_usuario.php">Registrar usuario</a></ul>
          <ul><a href="../secciones/actualizar_elim_usuario.php">Modificar usuarios</a></ul>
          <ul><a href="../secciones/estado_vehiculos.php">Lista de vehiculos</a></ul>
          <ul><a href="../secciones/aceptar_solicitud.php">Procesar solicitudes</a></ul>
        </div>
      </li>

      <li><a href="#">Opciones de conductor</a>
        <div class="submenu">
          <ul><a href="../secciones/viajespendientes.php">Viajes pendientes</a></ul>
          <ul><a href="../secciones/viajesRealizados.php">Viajes realizados</a></ul>
        </div>
      </li>
      <!-- tambien sera opcion de salir --> 
			<li class="derecha"><a href="login.php">Iniciar sesión <span class="material-icons pequeno">home</span> </a></li>	
  	</ul>
   </nav>

<?php if($details){ ?>
<br>
<br>
<br>
<table>
<thead>
<tr>
<th>ID_Solicitud</th>
<th>Correo Electronico</th>
<th>Estado</th>
<th>Razon</th>
<th>Telefono</th>
<th>dia_viaje</th>
</tr>
</thead>
<tbody>
    <?php
while($detallesoli=$consulta->fetch(PDO::FETCH_OBJ)){
    
    ?>

<tr>
<td><?php echo $detallesoli->id_solicitud;?></td>
<td><?php echo $detallesoli->correo_electronico;?></td>
<td><?php if($detallesoli->estado==1){
    echo 'Pendiente';}
    else if ($detallesoli->estado==2){
    echo 'Aceptado';
    }
    else 
      {echo 'Rechazado';}
    ?></td>
<td><?php echo $detallesoli->razon;?></td>
<td><?php echo $detallesoli->telefono;?></td>
<td><?php echo $detallesoli->dia_viaje;?></td>
<?php }?>
</tr>
</tbody>
</table>
<h1 class="subtitulo">Desea solicitar un salvoconducto</h1>
    <form action="salvoconducto.php" method="POST">
      <fieldset>
        <div class="entradas">
         <div class="centrear"> Ingrese su correo </div>
          <input type="email" name="correo" required>
          <br>
          <br>
          <div class="btn1">
            <input class="enviar" type="submit" value="Enviar Solicitud" >
          </div>
          <br>
          <div class="btn2">
            <input  class ="cancelar" type="reset" name="Cancelar" value="Cancelar">
          </div>
      </fieldset>
     </form>
  <?php }
   else{ ?>

    <div class="centrear">
   <H1><?php echo ("Numero de Solicitud Invalida"); ?> <H1>
   </div>
  <?php }  
  ?>
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
 
<?php
include('../procesos/verificarSesion.php');
if(isset($_SESSION['sw'])){
  include("../procesos/consultarUser.php");

  if($datos_usuario->tipo!=3) //solo chofer
    header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Viajes Pendientes</title>
  <meta name="viewport" content="width=device-width">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../css/estilo_viajespendientes.css">
  <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
</head>
<body>
  <header>
    <div class="logo"><img src="../imagenes/logo_utp.png" width="120px">
      <span class="utp">Universidad Tecnológica de Panamá</span>
    </div>
    <?php if(isset($_SESSION['sw'])) {?>
      <div class="bienvenido">Bienvenido: <?php echo $datos_usuario->nombre?></div>
    <?php } ?>
    <span class="titulo">Drive-<span class="letra_u">U</span></span>
  </header>
  <nav>
  <ul>
		  <li><a href="../index.php">Inicio</a></li>
      <li><a href="preguntas_frecuentes.php">Preguntas frecuentes</a></li>

      <?php if(isset($_SESSION['sw'])) 
              if($datos_usuario->tipo==1){?>
        <li><a href="#">Servicios</a>
          <div class="submenu">
            <ul><a href="crear_solicitud.php">Crear solicitud</a></ul>
            <ul><a href="estado_solicitud.php">Estado de solicitud</a></ul>
          </div>
        </li>
      <?php } ?>

      <?php if(isset($_SESSION['sw']))
              if($datos_usuario->tipo==2){?>
        <li><a href="#">Opciones de administrador</a>
          <div class="submenu">
            <ul><a href="crear_usuario.php">Registrar usuario</a></ul>
            <ul><a href="actualizar_elim_usuario.php">Modificar usuarios</a></ul>
            <ul><a href="estado_vehiculos.php">Lista de vehiculos</a></ul>
            <ul><a href="aceptar_solicitud.php">Procesar solicitudes</a></ul>
          </div>
        </li>
      <?php } ?>

      <?php if(isset($_SESSION['sw'])) 
              if($datos_usuario->tipo==3){?>
      <li><a href="#">Opciones de conductor</a>
        <div class="submenu">
          <ul><a href="viajespendientes.php">Viajes pendientes</a></ul>
          <ul><a href="viajesRealizados.php">Viajes realizados</a></ul>
        </div>
      </li>
      <?php } ?>
			
      <!-- tambien sera opcion de salir --> 
      
			<li class="derecha">
        <?php if(!isset($_SESSION['sw'])) { ?>
          <a href="login.php">Iniciar sesión <span class="material-icons pequeno">home</span></a>
        <?php }
        else{ ?>
          <a href="../procesos/cerrarSesion.php">Cerrar sesión <span class="material-icons pequeno">logout</span></a>
       <?php } ?>
      </li>	
      
  	</ul>
   </nav>

  <?php $i=0;
  if ($con){
    $consulta = $con->query("SELECT v.fecha, v.destino, v.estado, v.id_viaje, vh.marca FROM viajes v 
    INNER JOIN vehiculos vh ON v.vehiculo = vh.id_vehiculo WHERE v.estado=1 AND v.id_chofer=".$datos_usuario->id_usuario);

    while ($row = $consulta->fetch()) {
      $i++;
      $fecha = $row['fecha'];
      $destino = $row['destino'];
      $vehiculo = $row['marca'];
      $estado = $row['estado'];
      $id_viaje = $row['id_viaje'];



      if ($estado == '1')
      {

      
      ?>

      
      <ul class="pull-right">
          <li class="survey-item">
            <span class="survey-name">DESTINO: <?php echo $destino; ?></span>     
            </br>
            <span class="survey-country grid-only">VEHICULO: <?php echo $vehiculo; ?></span>   
            </br>
            <span class="survey-country list-only">FECHA: <?php echo $fecha; ?></span> 
            </br>
            <span class="survey-country list-only">ID Viaje: <?php echo $id_viaje; ?></span> 
            </br>
            </br>
            <span class="survey-stage">
              <a href="informedeviaje.php?id_viaje=<?php echo $id_viaje ?>"><button class="btn-1">Ver informe</button></a>
            </span> 
          </li>   
        </ul>
      <?php
      }
    }
    if($i==0){?> 
      <BR><BR>
      <div class="nada">No tiene viajes pendientes<div>
      <img src="../imagenes/vacio.png" class="nada_icon">
    <?php }      
    
  }
  ?>


  
  <BR><BR><BR><BR>
  <footer>
    <br>
    ©2021. Drive-U.
    Universidad Tecnológica de Panamá
    <BR>
    Confeccionado por Angel Carrillo, Wencers Castillo, Elianys González, Karla Quiel, Cristobal Rodriguez y Luis Saldaña. 
    <br><br>
  </footer>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="js/script.js"></script>
</body>
</html>

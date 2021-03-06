<?php
include('../procesos/verificarSesion.php');
if(isset($_SESSION['sw'])){
  include("../procesos/consultarUser.php");

  if($datos_usuario->tipo!=3) //solo chofer
    header("location: ../index.php");
}
$consulta = $con->query('SELECT * FROM viajes WHERE id_chofer='.$datos_usuario->id_usuario.' AND estado=2');
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Drive-U - Viajes realizados</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="../css/estilo_ViajesRealizados.css">
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
    <BR><BR>
<!-- partial:index.partial.html -->
<div class="posicion">
  <span class="toggler active" data-toggle="grid"><span class="entypo-layout"></span></span>
  <span class="toggler" data-toggle="list"><span class="entypo-list"></span></span>
</div>


<ul class="surveys grid">
 
  <?php
    $j=0;
    while($i = $consulta->fetch(PDO::FETCH_OBJ)){
      $j++; ?>
     <a href="#"> 
      <li class="survey-item">
        <span class="survey-name"> ID Viaje: <?php echo $i->id_viaje; ?></span> <br>         
        <span class="survey-name"> Fecha: <?php echo $i->fecha; ?> </span>
        <span class="survey-name"> Destino: <?php echo $i->destino; ?> </span><br>
      <div class="pull-right">  
        <span class="survey-name">Vehículo: <?php echo $i->vehiculo; ?> </span>
        <span class="survey-name"> Cantidad de personas: <?php echo $i->cantidad_personas; ?> </span>
        <span class="survey-name"> ID Chofer <?php echo $i->id_chofer; ?> </span><br>
        <span class="survey-name"> Estado: <?php echo $i->estado; ?> </span>  </div>
     </li>  
    <?php  } 
    if($j==0){?> 
      <div class="nada">No hay nada que mostrar<div>
      <img src="../imagenes/vacio.png" class="nada_icon">
    <?php }
    ?>         
    

</ul>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
<br><br>
<button type="button" class="btn" onclick="location.href='../index.php';">Regresar</button>

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

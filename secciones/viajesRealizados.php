<?php 
    include("conexion/conexion.php");
    $consulta = $con->query('SELECT * FROM viajes');
   // var_dump($consulta); 
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Drive-U - Viajes realizados</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="estilo/estilo_ViajesRealizados.css">

</head>
<body>
  <header>
    <div class="logo"><img src="imagenes/logo_utp.png" width="120px"></div> 
    <span class="titulo">Drive-U</span></header>
    
    <nav>
     <ul>
       <li><a href="#">Inicio</a></li>
       <li><a href="#">Nosotros</a></li>
       <li><a href="#">Trámites</a>
         <div class="submenu">
           <ul><a href="#">Viajes realizados</a></ul>
           <ul><a href="#">Viajes pendientes</a></ul>
           <ul><a href="#">Informe de viajes</a></ul>
         </div>
       </li>
       
       <li><a href="#">Preguntas frecuentes</a></li>
       <li><a href="#">Contáctenos</a></li>
       <li class="derecha"><a href="#">Cerrar sesión <span class="material-icons pequeno">home</span> </a></li>	
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
    while($i = $consulta->fetch(PDO::FETCH_OBJ)){ ?>
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
    <?php  } ?>         
    </a>

</ul>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
<br><br>
<button type="button" class="btn">Regresar</button>

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

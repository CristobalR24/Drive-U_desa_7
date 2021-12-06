<?php
session_start();
if(isset($_SESSION['sw'])){
  //include("procesos/consultarUser.php");
  include("conexion/conexion.php");
    $id_usuario=$_SESSION['id'];
    $resultado=$con->query("SELECT * FROM usuarios WHERE id_usuario='$id_usuario'");
    $datos_usuario=$resultado->fetch(PDO::FETCH_OBJ);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Drive-U - Inicio</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
  <link rel="stylesheet" type="text/css" href="css/estilo_inicio.css" />
</head>
<body>
   <header>
   <div class="logo"><img src="imagenes/logo_utp.png" width="120px">
    <span class="utp">Universidad Tecnológica de Panamá</span>
  </div> 
   <span class="titulo">Drive-U</span></header>
   
   <nav>
    <ul>
		  <li><a href="index.php">Inicio</a></li>
      <li><a href="secciones/preguntas_frecuentes.php">Preguntas frecuentes</a></li>

      <?php if(isset($_SESSION['sw'])) 
              if($datos_usuario->tipo==1){?>
        <li><a href="#">Servicios</a>
          <div class="submenu">
            <ul><a href="secciones/crear_solicitud.php">Crear solicitud</a></ul>
            <ul><a href="secciones/estado_solicitud.php">Estado de solicitud</a></ul>
          </div>
        </li>
      <?php } ?>

      <?php if(isset($_SESSION['sw']))
              if($datos_usuario->tipo==2){?>
        <li><a href="#">Opciones de administrador</a>
          <div class="submenu">
            <ul><a href="secciones/crear_usuario.php">Registrar usuario</a></ul>
            <ul><a href="secciones/actualizar_elim_usuario.php">Modificar usuarios</a></ul>
            <ul><a href="secciones/estado_vehiculos.php">Lista de vehiculos</a></ul>
            <ul><a href="secciones/aceptar_solicitud.php">Procesar solicitudes</a></ul>
          </div>
        </li>
      <?php } ?>

      <?php if(isset($_SESSION['sw'])) 
              if($datos_usuario->tipo==3){?>
      <li><a href="#">Opciones de conductor</a>
        <div class="submenu">
          <ul><a href="secciones/viajespendientes.php">Viajes pendientes</a></ul>
          <ul><a href="secciones/viajesRealizados.php">Viajes realizados</a></ul>
        </div>
      </li>
      <?php } ?>
			
      <!-- tambien sera opcion de salir --> 
			<li class="derecha">
        <?php if(!isset($_SESSION['sw'])) { ?>
          <a href="secciones/login.php">Iniciar sesión <span class="material-icons pequeno">home</span></a>
        <?php }
        else{ ?>
          <a href="procesos/cerrarSesion.php">Cerrar sesión <span class="material-icons pequeno">home</span></a>
       <?php } ?>
      </li>	
  	</ul>
   </nav>
   <br><br>
  <div class="fling-minislide">
  <img src="imagenes/Buses.jpg" alt="Slide 3" />
  <img src="imagenes/Camioneta.jpg" alt="Slide 2"  />
  <img src="imagenes/Gira.jpg" alt="Slide 1" />
  </div>

   <br>

    <div class="contenedor_noticias">
       <div class="noticias"> 
         <img src="imagenes/Buses_colon.jpg" class="imagenes"  />
         <a href="https://utp.ac.pa/autoridades-de-la-utp-entregan-autobus-al-centro-regional-de-colon" class="titulos_noticias"> Autoridades de la UTP entregan autobús al Centro Regional de Colón </a> 
         <p> Con una inversión de más de 160 mil dólares, la Universidad Tecnológica 
             de Panamá (UTP), adquirió un autobús de 44 pasajeros, para el Centro 
             Regional de Colón. <a href="https://utp.ac.pa/autoridades-de-la-utp-entregan-autobus-al-centro-regional-de-colon" class="titulos_noticias">Ver más</a> </p> 
       </div>

       <div class="noticias"> 
         <img src="imagenes/Buses_noche.jpg" class="imagenes"  />
         <a href="https://utp.ac.pa/estudiantes-de-la-utp-cuentan-con-buses-para-su-traslado-durante-horas-nocturnas" class="titulos_noticias"> Estudiantes de la UTP cuentan con buses para su traslado durante horas nocturnas </a> 
         <p> Estudiantes del turno nocturno de la Universidad Tecnológica de Panamá (UTP), cuentan, desde el 19 de marzo de 2018, con 
             el servicio de autobuses para trasladarse, desde el Campus Central, Dr. Víctor Levi Sasso, a la Estación del Metro. <a href="https://utp.ac.pa/estudiantes-de-la-utp-cuentan-con-buses-para-su-traslado-durante-horas-nocturnas" class="titulos_noticias">Ver más</a></p>
       </div>

       <div class="noticias"> 
         <img src="imagenes/Buses_chiriqui.jpg" class="imagenes"  />
         <a href="https://utp.ac.pa/utp-chiriqui-cuenta-con-un-nuevo-autobus" class="titulos_noticias"> UTP Chiriquí cuenta con un nuevo autobús </a> 
         <p> Las giras académicas, culturales y deportivas del Centro Regional de la Universidad Tecnológica de 
             Panamá (UTP), en Chiriquí, se podrán realizar con mayor efectividad, ya que cuenta con un nuevo autobús 
             que formará parte de su flota vehicular. 
             <a href="https://utp.ac.pa/utp-chiriqui-cuenta-con-un-nuevo-autobus" class="titulos_noticias">Ver más</a> </p>
       </div>

       <div class="noticias"> 
         <img src="imagenes/Buses_cocle.jpg" class="imagenes" />
         <a href="https://utp.ac.pa/rector-entrega-autobus-al-centro-regional-de-cocle" class="titulos_noticias"> Rector entrega autobús al Centro Regional de Coclé </a> 
         <p>En presencias de estudiante, docentes y administrativos, el Rector de la Universidad Tecnológica de Panamá 
            (UTP), Ing. Héctor M. Montemayor Á., realizó la entrega de un autobús al Centro Regional de Coclé.
            <a href="https://utp.ac.pa/rector-entrega-autobus-al-centro-regional-de-cocle" class="titulos_noticias">Ver más</a> </p>
       </div>
    </div>

   <BR>
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


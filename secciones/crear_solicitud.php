<?php
include('../procesos/verificarSesion.php');
if(isset($_SESSION['sw'])){
  include("../procesos/consultarUser.php");

  if($datos_usuario->tipo!=1) //solo colaborador
    header("location: ../index.php");

}

$consultar = $con->query('Select * from modelo');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Drive-U - Crear Solicitud</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
  <link rel="stylesheet" type="text/css" href="../css/estilo_crearsoli.css" />
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

   <body>
    <br>
    <br>
    <h1 class="subtitulo">Crear Solicitud</h1>
    <form action="../procesos/insertarsoli.php" method="POST">
      <fieldset>
<div class="entradas">
        <div class ="two-col">

        <div class="col1">
    <label for="field2">Fecha y hora del Viaje</label>
    <input type="datetime-local"  name="fecha" required>
      </div>
      <div class="col2">
    <label for="field2">Telefono</label>
    <input type="text" name="Telefono" required pattern="[0-9]{1,8}" title="Ingrese un numero de telefono valido">
      </div>
    <div class="col3">
    <label for="field2">Correo Electronico</label>
    <input type="email" name="correo" required> 
      </div>
      <div class="col2">
        <label for="field2">Inicio Destino</label>
        <input type="text" name="Destino" required> 
        </div>
        
        <div class="col3">
    <label for="field2">Final del Destino</label>
    <input type="text" name="Final" required required> 
      </div>
       <div class="col3">
       <label for="fiedl1">Cantidad de personas</label>
        <input type="number" name="cantidad" min="1" max="60">
      </div> 
     <div class="col2">
    <label for="field2">Modelo del Vehiculo</label>
    <div class="select">
      <select name="modelo" required>
       <?php while($detalleuser=$consultar->fetch(PDO::FETCH_OBJ) ){
         ?>
      <option value="<?php echo $detalleuser->id_modelo;?>"><?php echo $detalleuser->modelo;?></option>
        <?php } ?>
        </select>
     </div>
      </div>
    </div>
    <br>
    <input type="hidden" name="id_solicitante" value="<?php echo $datos_usuario->id_usuario;?>">
    </div>
    <div class="botones">
      <div class="btn1">
        <input class="enviar" type="submit" value="Enviar Solicitud" >
      </div>
      <div class="btn2">
        <input  class ="cancelar" type="reset" name="Cancelar" value="Cancelar">
      </div>
  </div>
      </fieldset>
     </form>
   </body>
   <BR><BR>
   <BR><BR><BR><BR><BR><BR>		
   <BR><BR><BR>
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

<?php
include('../procesos/verificarSesion.php');

if(isset($_SESSION['sw'])){
  include("../procesos/consultarUser.php");
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Informe de Viaje</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../css/estilo_informedeviaje.css">
  <link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
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
  <br><br>

  <?php
  
  $id_viaje=($_GET['id_viaje']);

  if ($con){
    $consulta = $con->query("SELECT u.nombre, u.cedula, v.vehiculo, m.modelo, h.placa, v.id_viaje, h.kilometraje FROM viajes v 
    INNER JOIN usuarios u ON v.id_chofer=u.id_usuario 
    INNER JOIN vehiculos h ON v.vehiculo=h.id_vehiculo
    INNER JOIN modelo m ON h.modelo=m.id_modelo
    WHERE id_viaje = v.id_viaje");
   
   while ($row = $consulta->fetch()) {
      $nombre = $row['nombre'];
      $cedula = $row['cedula'];
      $placa = $row['placa'];
      $tipodeauto = $row['modelo'];
      $kilometraje = $row['kilometraje'];
      $id_viaje1 = $row['id_viaje'];
      $id_vehiculo = $row['vehiculo'];

     if ($id_viaje == $id_viaje1)
     {

     
      ?>
    
      <div class="container">
        
      <form action="../procesos/actualizar_kilometraje.php" method="POST">
        <div class="row">
          <h1>Informe de Viaje</h1>
          <h4>Chofer</h4>
          <div class="input-group input-group-icon">
          <input type="text" readonly placeholder="<?php echo $nombre; ?>"/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="input-group input-group-icon">
          <input type="text" readonly placeholder="<?php echo $cedula; ?>"/>
          <div class="input-icon"><i class="fa fa-user"></i></div>
        </div>
        <div class="col-half">
          <h4>ID Viaje</h4>
          <div class="input-group input-group-icon">
            <input type="text" readonly placeholder="<?php echo $id_viaje1; ?>"/>
            <div class="input-icon"><i class="fa fa-key"></i></div>
          </div>
        </div>
        <div class="row">
          <div class="col-half">
            <h4>__________Auto____________Kilometraje____________Placa_________</h4>
            <div class="input-group">
              <div class="col-third">
                <input type="text" readonly placeholder="<?php echo $tipodeauto; ?>"/>
              </div>
      
              <div class="col-third">
                <input name="kilometraje_v" type="text" placeholder="<?php echo $kilometraje; ?>"/>
              </div>
              <div class="col-third">
                <input type="text" readonly placeholder="<?php echo $placa; ?>"/>
              </div>
            </div>
         </div>
        </div>
       
        <div class="col-half">
          <div class="input-group"></div>
        </div>
        </div>
      
      </div>
      </br> 
      <a href="viajespendientes.php"><button type="button" class="btn-1">Regresar</button></a>
        <input type="hidden" name="viaje_v" value="<?php echo $id_viaje1; ?>">
        <input type="hidden" name="vehiculo_v" value="<?php echo $id_vehiculo; ?>">
        <button type="submit" class="btn-1">Enviar</button>
      </form>
    </div>
      <?php
      }
    }
  }
  ?>

 
  <BR><BR><BR>
  <footer>
  <br>
  ©2021. Drive-U.
  Universidad Tecnológica de Panamá
  <BR>
  Confeccionado por Angel Carrillo, Wencers Castillo, Elianys González, Karla Quiel, Cristobal Rodriguez y Luis Saldaña. 
  <br><br>
  </footer>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
</body>
</html>

<?php
include('../procesos/verificarSesion.php');
if(isset($_SESSION['sw'])){
  include("../procesos/consultarUser.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Drive-U - Vehiculos</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
  <link rel="stylesheet" type="text/css" href="../css/estilo_aceptar_solicitud.css" />
</head>
<body>
  
<script src="../js/funciones_procesar_sol.js"></script>
  
<!-- TODO ESTO ABARCA EL MODAL       -->
      <div id="modalRechazo" class="modal">
        <div class="contenido_modal">
            <span id="cerrar1" class="cerrar">&times;</span>
            
            <form action="../procesos/procesos_aceptar_sol.php" method="POST"> 
            <br>
              <span class="titulo_modal">Rechazar solicitud</span>
                <br>
              <input type="checkbox" id="razon1" name="razon[]" value="Requiere salvoconducto">
              <label for="razon1">Requiere salvoconducto</label>
                <br>
              <input type="checkbox" id="razon2" name="razon[]" value="No hay vehiculos disponibles">
              <label for="razon2">No hay vehiculos disponibles</label>
                <br>
              <input type="checkbox" id="razon3" name="razon[]" value="No hay conductores disponibles">
              <label for="razon3">No hay conductores disponibles</label>
                <br><br>
              Otras razones: <br>
              <textarea class="texto_m" type="text" id="razon4" name="razon[]"></textarea>
              <input type="hidden" name="id_sol" value="<?php echo $_GET["id"];?>">
                <br><br>
              <div style=" text-align: center;">
                <input class="boton_m rechazar_m" name="rechazar" id="rechazar" type="submit" value="Rechazar solicitud"/>
              </div>
              </form>
        </div>
      </div>
<!-- ---------  -->

<!-- TODO ESTO ABARCA EL MODAL       -->
<div id="modalApruebo" class="modal">
        <div class="contenido_modal">
            <span id="cerrar2" class="cerrar">&times;</span>
            
            <form action="../procesos/procesos_aceptar_sol.php" method="POST">
              <br><br>
              <span class="titulo_modal">Aprobar solicitud</span>
                <br><br>
             <!-- DATETIME values are always stored in 24h format --> 
              <?php
                if (isset($_GET["id"])){
                $data=$con->query('SELECT dia_viaje, modelo_vehiculo, cantidad_personas FROM solicitud WHERE id_solicitud='.$_GET["id"]);
                    while($datos=$data->fetch(PDO::FETCH_OBJ))
                    {
                      $a_modelo=$datos->modelo_vehiculo;
                      $a_cantidad=$datos->cantidad_personas;
                      $a_hora= $datos->dia_viaje;
                      $dt = DateTime::createFromFormat("Y-m-d H:i:s", $a_hora);
                      $a_hora= $dt->format('H');
                    }
                    ?>
                <div style="text-align: left; margin-left:5rem;">
                <label for="acepto_vehiculo">Vehiculo: </label>
                <select name="acepto_vehiculo" id="acepto_vehiculo">
                <?php
          //consulta anidada
      
                $data=$con->query('SELECT v.id_vehiculo, v.placa, m.modelo, v.marca FROM vehiculos v INNER JOIN modelo m ON v.modelo=m.id_modelo WHERE v.modelo='.$a_modelo.' AND id_vehiculo NOT IN (SELECT vehiculo FROM viajes WHERE estado=1)');
                  while($datos=$data->fetch(PDO::FETCH_OBJ))
                  {
                  ?> 
                  <option value="<?php echo $datos->id_vehiculo;?>"><?php echo $datos->modelo." ".$datos->placa." ".$datos->marca;?></option>
                  <?php } ?>
                </select>
              <div id="vehiculo_msg" style="color: brown;">No hay vehiculos disponibles</div>
                <br><br>
              <label for="acepto_chofer">Chofer designado: </label>
                <select name="acepto_chofer" id="acepto_chofer">

              <?php
              // consulta anidada
              $data=$con->query('SELECT * FROM usuarios WHERE tipo=3 AND id_usuario NOT IN (SELECT id_chofer FROM viajes WHERE estado=1)');
                          while($datos=$data->fetch(PDO::FETCH_OBJ))
                          {
                         ?> 
                         <option value="<?php echo $datos->id_usuario;?>"><?php echo $datos->nombre;?></option>
                         <?php } ?>
                </select>
                <div id="chof_msg" style="color: brown;">No hay choferes disponibles</div>
                <input type="hidden" name="hora" id="hora" value="<?php echo $a_hora; ?>">
                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo $a_cantidad; ?>">
                <input type="hidden" name="id_sol" value="<?php echo $_GET["id"];?>">
              </div>
              <?php } ?>
              <br><br><br><br>
              <div style="text-align: center;">
                <input class="boton_m aceptar_m" name="aceptar" id="aceptar" type="submit" value="Evaluar"/>
              </div>
            </form>
        </div>
      </div>
<!-- ---------  -->
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
    <div class="gran_area">

        <div class="hijo_1">
            <div class="hijo_2">
                <span class="titulo_l">Listado de solicitudes</span>

                    <br>
                    <div class="lista">
                    <ul>
                        <?php  $consultarSolicitudes=$con->query('SELECT * FROM solicitud WHERE estado=1');
                          while($solicitud=$consultarSolicitudes->fetch(PDO::FETCH_OBJ)){?>
                            <form action="../procesos/procesos_aceptar_sol.php" method="POST">
                              <input name="id_sol" id="id_sol" type="hidden" value="<?php echo $solicitud->id_solicitud;?>"/>
                              <li><button name="btnSeleccionado" value="btnSeleccionado" type="submit" class="solicitud_l">
                                <?php $fecha=$solicitud->dia_viaje;
                                      $dt = DateTime::createFromFormat("Y-m-d H:i:s", $fecha);
                                      $midate = $dt->format('d-m-Y');
                                      echo $midate;?>
                              </button></li>
                            </form>
                        
                        <?php } ?>
                    </ul>
                    </div>

            </div>
            <div class="hijo_2">
              <span class="titulo_l"> Solicitud: </span>
              <div class="solicitud_i">
                  <?php if(isset($_GET["id"])){
                    $consultarDetalles=$con->query('SELECT s.*, u.nombre, m.modelo FROM solicitud s INNER JOIN usuarios u ON s.id_usuario=u.id_usuario
                    INNER JOIN modelo m ON s.modelo_vehiculo=m.id_modelo WHERE s.id_solicitud='.$_GET["id"]);
                    while($detalles=$consultarDetalles->fetch(PDO::FETCH_OBJ)){ ?>

                      Solicitante: <?php echo $detalles->nombre;?>
                      <br><br>
                      Correo: <?php echo $detalles->correo_electronico;?>
                      <br>
                      Telefono: <?php echo $detalles->telefono;?>
                      <br><br>
                      Inicio: <?php echo $detalles->inicio_destino;?>
                      <br>
                      Destino: <?php echo $detalles->final_destino;?>
                      <br><br>
                      fecha: <?php echo $detalles->dia_viaje;?>
                      <br><br>
                      Cantidad de personas: <?php echo $detalles->cantidad_personas;?>
                      <br><br>
                      Vehiculo requerido: <?php echo $detalles->modelo;?>
                    
                  <?php } } ?>
              </div>
              <br><br>    
              <div class="area_boton">
              <?php if(isset($_GET["id"])){?>

                  <button value="btnRechazo" id="btnRechazo" class="boton rechazar">Rechazar</button><button value="btnApruebo" id="btnApruebo" class="boton aceptar">Aceptar</button>
              <?php } ?>

              <?php if(isset($_GET["msg"])){
                if($_GET["msg"]!="Solicitud rechazada"){?>
                  <span class="mensaje normal"><?php echo $_GET["msg"];?></span>
              <?php } else{ ?>
                  <span class="mensaje error"><?php echo $_GET["msg"];?></span>
                <?php } } ?>
              </div>
            </div>
        </div>
    </div>
  
     
  <br><br><br>
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

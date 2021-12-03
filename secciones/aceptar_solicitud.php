<?php
include("../conexion/conexion.php");

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
  <script type="text/javascript" defer>
    window.onload = function(){
           var modal1=document.getElementById('modalRechazo');
           var modal2=document.getElementById('modalApruebo');

           var activador1=document.getElementById('btnRechazo');
           var activador2=document.getElementById('btnApruebo');
           var cerrar1=document.getElementById('cerrar1');
           var cerrar2=document.getElementById('cerrar2');

           console.log(document.getElementById('modalRechazo'));

           activador1.addEventListener('click',abrirModal1);
           cerrar1.addEventListener('click',cerrarModal1);

           activador2.addEventListener('click',abrirModal2);
           cerrar2.addEventListener('click',cerrarModal2);

           if(document.getElementById('acepto_chofer').options.length == 0 || document.getElementById('acepto_vehiculo').options.length == 0)
            document.getElementById('aceptar').disabled=true;
           else
            document.getElementById('aceptar').disabled=false;

            if(document.getElementById('acepto_chofer').options.length == 0)
              document.getElementById('chof_msg').style.display = "inline";
            else
              document.getElementById('chof_msg').style.display = "none";

            if(document.getElementById('acepto_vehiculo').options.length == 0)
              document.getElementById('vehiculo_msg').style.display = "inline";
            else
              document.getElementById('vehiculo_msg').style.display = "none";


           function abrirModal1(){
               modal1.style.display='block';
           }
           function cerrarModal1(){
               modal1.style.display='none';
           }
           function abrirModal2(){
               modal2.style.display='block';
           }
           function cerrarModal2(){
               modal2.style.display='none';
           }
          }
  </script>
<!-- TODO ESTO ABARCA EL MODAL       -->
      <div id="modalRechazo" class="modal">
        <div class="contenido_modal">
            <span id="cerrar1" class="cerrar">&times;</span>
            
            <form action="../procesos/procesos_aceptar_sol.php" method="POST"> 
            <br><br>
              Rechazar solicitud
              <br><br>
              <input type="checkbox" id="razon1" name="razon[]" value="Requiere salvoconducto">
              <label for="razon1">Requiere salvoconducto</label>
              <br>
              <input type="checkbox" id="razon2" name="razon[]" value="No hay vehiculos disponibles">
              <label for="razon2">No hay vehiculos disponibles</label>
              <br>
              <input type="checkbox" id="razon3" name="razon[]" value="No hay conductores disponibles">
              <label for="razon3">No hay conductores disponibles</label>
              <br>
              <label for="razon4">Otras razones: </label>
              <input type="text" id="razon4" name="razon[]">
              <input type="hidden" name="id_sol" value="<?php echo $_GET["id"];?>">
              <br>
              <input name="rechazar" id="rechazar" type="submit" value="Rechazar solicitud"/>
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
              Aprobar solicitud
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
              <select name="acepto_vehiculo" id="acepto_vehiculo">
              <?php
          //consulta anidada
             $data=$con->query('SELECT * FROM vehiculos WHERE modelo='.$a_modelo.' AND id_vehiculo NOT IN (SELECT vehiculo FROM viajes WHERE estado=1)');
                          while($datos=$data->fetch(PDO::FETCH_OBJ))
                          {
                         ?> 
                         <option value="<?php echo $datos->id_vehiculo;?>"><?php echo $datos->placa;?></option>
                         <?php } ?>
              </select>
              <div id="vehiculo_msg" style="color: brown;">No hay vehiculos disponibles</div>
              <br><br>
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

              <?php } ?>
              <br><br>
              <input name="aceptar" id="aceptar" type="submit" value="Evaluar"/>
            </form>
        </div>
      </div>
<!-- ---------  -->
   <header>
   <div class="logo"><img src="../imagenes/logo_utp.png" width="120px">
    <span class="utp">Universidad Tecnológica de Panamá</span>
  </div> 
   <span class="titulo">Drive-U</span></header>
   
   <nav>
    <ul>
		  <li><a href="../index.php">Inicio</a></li>
      <li><a href="preguntas_frecuentes.php">Preguntas frecuentes</a></li>
			<li><a href="#">Servicios</a>
        <div class="submenu">
          <ul><a href="crear_solicitud.php">Crear solicitud</a></ul>
          <ul><a href="estado_solicitud.php">Estado de solicitud</a></ul>
        </div>
      </li>

      <li><a href="#">Opciones de administrador</a>
        <div class="submenu">
          <ul><a href="crear_usuario.php">Registrar usuario</a></ul>
          <ul><a href="actualizar_elim_usuario.php">Modificar usuarios</a></ul>
          <ul><a href="estado_vehiculos.php">Lista de vehiculos</a></ul>
          <ul><a href="aceptar_solicitud.php">Procesar solicitudes</a></ul>
        </div>
      </li>

      <li><a href="#">Opciones de conductor</a>
        <div class="submenu">
          <ul><a href="viajespendientes.php">Viajes pendientes</a></ul>
          <ul><a href="viajesRealizados.php">Viajes realizados</a></ul>
        </div>
      </li>
      <!-- tambien sera opcion de salir --> 
			<li class="derecha"><a href="login.php">Iniciar sesión <span class="material-icons pequeno">home</span> </a></li>	
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

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
                        <?php for ($i = 1; $i <= 20; $i++) {?>
                        <li class="solicitud_l">Solicitud: 20-10-2021</li>
                        <li class="solicitud_l">Solicitud: 03-11-2021</li>	
                        <?php } ?>
                    </ul>
                    </div>

            </div>
            <div class="hijo_2">
              <span class="titulo_l"> Solicitud: </span>
              <div class="solicitud_i">x</div>
                <br><br>    
                <div class="area_boton">
                  <button class="boton rechazar">Rechazar</button><button class="boton aceptar">Aceptar</button>
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

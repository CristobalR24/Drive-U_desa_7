<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Drive-U - Inicio</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
  <link rel="stylesheet" href="../css/estilo_preguntas.css">
</head>
<body>
   <header>
   <div class="logo"><img src="../imagenes/logo_utp.png" width="120px">
    <span class="utp">Universidad Tecnológica de Panamá</span>
  </div> 

   <span class="titulo">Drive-U</span>
  </header>
   
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

   <BR>

    <h2>Inicio > Preguntas frecuentes</h2><BR>

      <div id="preguntas">
      <ul>
        <li>
          <input type="checkbox" checked>
          <h2>¿Cómo se hace un proceso de solicitud?</h2>
          <p>Para realizar una solicitud lo primero es llamar al número 270-6841, llenar los datos que se requieren de la solicitud por parte 
            del colaborador, y esperar a que se le envíe correo de para su aprobación. </p>
        </li>

        <li>
          <input type="checkbox" checked>
          <h2>¿Cuándo se requiere un salvo conducto?</h2>
          <p>Se solicita cuando se requiera utilizar un vehículo de la universidad 
            fuera de la hora laboral.</p>
        </li>

        <li>
          <input type="checkbox" checked>
          <h2>¿Qué tipos de vehículos cuenta la universidad?</h2>
          <p> Contamos con vehículos como: sedanes, buses, costers, camionetas. </p>
        </li>

        <li>
          <input type="checkbox" checked>
          <h2>¿Cuál es su horario de atención?</h2>
          <p> De lunes a sábados de 7:00 a.m - 3:00 p.m.</p>
        </li>
        
        <li>
          <input type="checkbox" checked>
          <h2>¿Qué cada tiempo se le hace mantenimiento a los vehículos de la universidad?</h2>
          <p> Se le hacen cada 5,000 km de distancia.</p>
        </li>

        <li>
          <input type="checkbox" checked>
          <h2>¿Por qué una solicitud es rechazada? </h2>
          <p> Existen varias razones, los cuales pueden ser: mantenimiento del vehículo, reservaciones llenas, solicitudes fuera del horario 
              laboral, vehículo fuera de servicio temporalmente, entre otros que serán mencionados por el colaborador al momento de
              ingresar los datos al sistema. </p>
        </li>

        <li>
          <input type="checkbox" checked>
          <h2>¿Cuáles son los centros regionales a los que pueden llegar los vehículos de la universidad?</h2>
          <p> Están: Azuero, Bocas del Toro, Chiriquí, Coclé, Colón, Panamá Oeste, Veraguas. </p>
        </li>

        <li>
          <input type="checkbox" checked>
          <h2>¿Cuál es el número telefónico en caso de emergencias?</h2>
          <p>  Ante cualquier emergencia, primero debes notificar a las autoridades al 911 e inmediatamente después 
               comunicarte con la universidad llamando al 270-6841, para dar los datos de la ubicación del incidente. </p>
        </li>
      </ul>
    </div>

   <BR><BR><BR><BR>
   
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
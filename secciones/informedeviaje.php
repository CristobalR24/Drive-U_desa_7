<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Informe de Viaje</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../css/estilo_informedeviaje.css">
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
  <br><br>
  <div class="container">
    <form>
      <div class="row">
        <h1>Informe de Viaje</h1>
        <h4>Chofer</h4>
        <div class="input-group input-group-icon">
        <input type="text" readonly placeholder="Nombre"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="input-group input-group-icon">
        <input type="text" readonly placeholder="Cédula"/>
        <div class="input-icon"><i class="fa fa-user"></i></div>
      </div>
      <div class="row">
        <div class="col-half">
          <h4>Auto</h4>
          <div class="input-group">
            <div class="col-third">
              <input type="text" placeholder="Tipo"/>
            </div>
            <div class="col-third">
              <input type="text" placeholder="Kilometraje"/>
            </div>
            <div class="col-third">
              <input type="text" placeholder="Placa"/>
            </div>
          </div>
       </div>
      </div>
      <div class="col-half">
        <div class="input-group input-group-icon">
          <input type="text" readonly placeholder="ID De solicitud"/>
          <div class="input-icon"><i class="fa fa-key"></i></div>
        </div>
      </div>
      <div class="col-half">
        <div class="input-group"></div>
      </div>
      </div>
    </form>
    </div>
    </br> 
    <a href="viajespendientes.php"><button class="btn-1">Regresar</button></a>
    <a href="#"><button class="btn-1">Enviar</button></a>
  </div>
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

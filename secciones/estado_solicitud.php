<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Drive-U -Estado de Solicitud</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
  <link rel="stylesheet" type="text/css" href="../css/estilo_estadosoli.css" />
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

   <body>
    <br>
    <br>
    <h1 class="subtitulo">Estado de Solicitud</h1>
    <form action="estado_solicitud.html" method="POST">
      <fieldset>
        <div class="entradas">
          Ingrese el ID de su Solicitud
          <input type="text" name="estado" required>
          <br>
          <br>


     
          <div class="btn1">
            <input class="enviar" type="submit" value="Enviar Solicitud" >
          </div>
          <br>
          <div class="btn2">
            <input  class ="cancelar" type="reset" name="Cancelar" value="Cancelar">
          </div>

      </fieldset>
     </form>

     <br>
     <br>
     <br>
     <h1 class="subtitulo">Desea solicitar un salvo conducto</h1>
    <form action="estado_solicitud.html" method="POST">
      <fieldset>
        <div class="entradas">
          <div class="soli">
            <input class="enviar" type="submit" value="Si" >
          </div>
          <div class="soli">
          <input  class ="cancelar" type="reset" name="Cancelar2" value="No">
          </div>
        </div>
      </fieldset>
     </form>

   </body>
   <BR><BR>
   <BR><BR>
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

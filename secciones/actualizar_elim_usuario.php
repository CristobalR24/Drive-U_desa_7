<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Drive-U - Inicio</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="../css/estilo_actualizar_elim_usuario.css" />

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

   <BR><BR>
   <BR><BR>
   <BR><BR>
  <div id="center">
    <table class="tabla">
        <thead>
            <tr>
                <th> Nombre </th>
                <th> Cedula </th>
                <th> Departamento</th>
                <th>Accion</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
                <td>Nombre apellido</td>
                <td>x-xxx-xxxx</td>
                <td class="center_depa">FISC</td>
                <td>
                    <div id="cent">
                    <button id="elim">Eliminar</button>
                    <button id= "act">Actualizar</button>
                     </div>

                </td>

            </tr>
        </tbody>
    </table>
</div>
   <br>
   <br>
   <br>
   		
   <BR><BR><BR><BR><BR><BR>		
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

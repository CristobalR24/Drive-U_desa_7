<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Drive-U - Vehiculos</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
  <link rel="stylesheet" type="text/css" href="../css/estilo_estado_v.css" />
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
      <div class="contenedor_p">

          <div class="Titulo_vehiculo"> Estado de vehiculos </div>
          
          <div class="Tabla">
            <br>
            <input type="search" name="busqueda" class="buscador" placeholder=" ">
            <button type="button" class="buscar"><span class="material-icons pequeno">search</span></button>
            <br><br>
            <div class="contenedor_table">
              <table class="tablap">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th colspan=2>Tipo de vehículo</th>
                      <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                  <?php for ($i = 1; $i <= 20; $i++) {?>
                  <tr>
                    <td>1</td>
                    <td colspan=2>Sedan</td>
                    <td>Disponible</td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
         
          <div class="Filtros">
            <br><br><br>
            <label for="filtro">Filtrar por:</label>
            <select name="filtro" id="filtro">
              <option value="ID">número de ID</option>
              <option value="Vehiculo">Tipo de vehiculo</option>
              <option value="Disponible">Disponibilidad</option>
              <option value="audi">Audi</option>
            </select>
          </div>
        <br><br>
      </div>
      
    </div>
  

    <!--
   
  -->
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

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
		  <li><a href="../index.html">Inicio</a></li>
			<li><a href="#">Nosotros</a></li>
			<li><a href="#">Servicios</a>
        <div class="submenu">
          <ul><a href="#">Hotcall con la putinga 16</a></ul>
          <ul><a href="#"> Corriente</a></ul>
        </div>
      </li>
      <li><a href="#">Administrador</a>
        <div class="submenu">
          <ul><a href="estado_vehiculos.php">Examinar disponibilidad de vehiculos</a></ul>
          <ul><a href="aceptar_solicitud.php">Procesar solicitudes</a></ul>
        </div>
      </li>
      
			<li><a href="#">Preguntas frecuentes</a></li>
      <li><a href="#">Contáctenos</a></li>
			<li class="derecha"><a href="#">Iniciar sesión <span class="material-icons pequeno">home</span> </a></li>	
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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Drive-U - Inicio</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
    <link rel="stylesheet" type="text/css" href="../css/estilo_registro.css" />
    <script  type="text/javascript" src="../js/funciones_registro.js"> </script>

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
    
        <div class="login_div">
            <div class="margin">
                <form  id="form_registro" action="crear_usuario.php" method="POST">
                    <h1 class="titulo_h1">
                        Registrar Usuario
                    </h1>
                    <span class="texto">Nombre</span> 
                   <br>
                   <input name="nombre"  id="input_user" class="estilo" placeholder="Nombre y Apellido" maxlength="20" onkeyup="validar_nombre();" required>
                    <br>
                    <br>
                   <span class="texto">Cedula</span> 
                   <br>
                   <input name="cedula" id="input_cedula" type="Text" class="estilo" placeholder="Cedula" maxlength="30" required>
                   <br>
                   <br>
                   <span class="texto">Departamento</span>
                   <br>
                    <select name="facultad" class="depa" onchange="t()">
                        <option class="opt" value="6" selected="selected">FISC</option>
                        <option class="opt" value="4">FII</option>
                        <option class="opt" value="3">FIE</option>
                        <option class="opt" value="5">FIM</option>
                        <option class="opt" value="1">FCT</option>
                        <option class="opt" value="2">FIC</option>
                    </select>

                    <br>
                    <br>

                    <span class="texto">Tipo Usuario </span>
                    <br>
                    <select name="tipo" class="depa" onchange="t()">
                        <option class="opt" value="1" selected="selected">Colaborador UTP</option>
                        <option class="opt" value="2">Administrador</option>
                        <option class="opt" value="3">Chofer</option>
                    </select>
                   <br>
                   <br>
                   <span class="texto">Email</span>
                   <br>
                 <input id="email" class="estilo" type="email" placeholder="Email" required name="email">
                    <br>
                   <span class="texto">Contraseña</span>
                   <br>
                 <input id="pass1" class="estilo" type="password" placeholder="Contraseña" maxlength="18" required onkeyup="validar_pass();"  >
                    <br>
                    <br>
                    <span class="texto">Confirma tu contraseña</span>
                    <br>
                 <input name="pass" id="pass2" class="estilo" type="password" placeholder="Contraseña" maxlength="18" required onkeyup="validar_pass();"  >
                    <br>

                </form>
                <br>
                <Button name="envio" type="submit" id="reg" class="glow-on-hover" value="submit" form="form_registro" >
                    Registrarse
                </Button>

                  <?php
                      include('../procesos/proceso_registro_usuario.php');
                      $reg = new registrar_usuario();
                        if(isset($_POST['envio']))
                        {
                          try
                          {
                            $registro= $reg->registrar();
                                  
                          }
                          catch(PDOExceptio $ex)
                          {
                  
                          }
                        }

                      ?>

            </div>

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

  
   

</body>
</html>

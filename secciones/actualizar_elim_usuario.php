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
	<title>Drive-U - Inicio</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="../css/estilo_actualizar_elim_usuario.css" />
  <script  type="text/javascript" src="../js/funcion_actualizar.js"> </script>
</head>
<body>
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

  <div id="center">
    <table class="tabla" id="tabla">
        <thead>
            <tr>
                 <th> ID </th>
                <th> Nombre </th>
                <th> Departamento</th>
                <th> Cedula </th>
                <th> tipo</th>
                <th>Accion</th>
            </tr>
        </thead>
        
        <tbody>

                <?php
                      include("../procesos/proceso_actualizar_usuario.php");
                      error_reporting(0);
                      //$consulta=$con->query("SELECT usuarios.id_usuario,usuarios.nombre,facultad.nombre,usuarios.cedula,tipo_usuario.nombre  FROM usuarios JOIN tipo_usuario on tipo_usuario.id_tipo = usuarios.tipo join facultad on facultad.id_facultad=usuarios.facultad");
                      $consulta=$con->query("SELECT us.id_usuario,us.nombre,fc.nombre as 'a',us.cedula,tu.nombre as 'b'
                      from usuarios us
                      inner join facultad fc on us.facultad=fc.id_facultad
                      INNER JOIN tipo_usuario tu on tu.id_tipo=us.tipo");
                      $datos= new actualizar_usuarios();
                      $t= $datos->obtener_user();
                      $tam= count($t);
                      $conter =0;
                      $consulta->setFetchMode(PDO::FETCH_ASSOC);
                      $consulta->execute();
  
                      while($row=$consulta->fetch())
                      {       ?>
              

                <tr>
                <td> <?php echo $t[$conter++]; ?></td>
                <td> <?php echo $t[$conter++]; ?></td>
                <td class="center_depa"> <?php echo $t[$conter++]; ?></td>
                <td> <?php echo $t[$conter++]; ?></td>
                <td> <?php echo $t[$conter++]; ?></td>
                <td>
                    <div id="cent">
                    <!--<button id="elim" onclick="obtener()">Eliminar</button>-->
                    <button id= "act"onclick="obtener()">Editar</button>
                     </div>

                </td>

            </tr>
        </tbody>
        <?php } ?>
    </table>
</div>

<script type="text/javascript">

  function obtener()
  {
                                    var table = document.getElementById('tabla');
                                  
                                    var totalRowCount = table.rows.length;
                                    var cel=0;
                                    try
                                    {
                                        for(var i = 0; i < totalRowCount; i++)
                                         {
                                          table.rows[i].onclick = function()
                                          {
                                            document.getElementById("id").value = this.cells[cel++].innerText;
                                            document.getElementById("usuario").value = this.cells[cel++].innerText;
                                            cel++
                                            document.getElementById("cedula").value = this.cells[cel++].innerText;
                                            cel++
                                            document.getElementById('forf').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                              };
                                          }
                                    }
                                    catch(error)
                                    {
                                        alert(error);
                                    }
                                   
                                 }
  </script>
  
 <div class="form_actualizar" id="forf" > 
    <form id="form_act" name="formulario" method="POST" action="actualizar_elim_usuario.php">

                                
<span class="txt_form">ID</span>
<br>
<input class ="inputs" name="id" readonly id="id" placeholder="ID">
<br>
<span class="txt_form">Nombre</span>
<br>
<input name="usuario" class ="inputs" id="usuario" onkeyup="validar_nombre();" placeholder="Nombre Y Apellido">
<br>
<span class="txt_form">Cedula</span>

<br>

<input class ="inputs" readonly id="cedula" placeholder="Cedula">
<br>

<span class="txt_form">Facultad</span>
<br>
<select name="facultad" class="depa" onchange="t()">
                        <option class="opt" value="1" selected="selected">FISC</option>
                        <option class="opt" value="2">FII</option>
                        <option class="opt" value="3">FIE</option>
                        <option class="opt" value="4">FIM</option>
                        <option class="opt" value="5">FCT</option>
                    </select>

                    <br>
<span class="txt_form">Tipo</span>
<br>
<select name="tipo" class="depa" onchange="t()">
                        <option class="opt" value="1" selected="selected">Colaborador UTP</option>
                        <option class="opt" value="2">Administrador</option>
                        <option class="opt" value="3">Chofer</option>
                    </select>
</form>
<br>
<Button name="eliminar" type="submit" id="elm" class="glow-on-hover" value="submit" form="form_act" onclick="r()" >
       Eliminar
</Button>
<Button name="actualizar" type="submit" id="actu" class="glow-on-hover1" value="submit" form="form_act" onclick="r()" >
                    Actualizar
                </Button>

 </div>

 <?php

  if(isset($_POST['eliminar']))
  {
    try
    {
      $datos->eliminar();
     
    }
    catch(PDOException $ex)
    {

    }
  }

  elseif(isset($_POST['actualizar']))
  {
    try
    {
      $datos->actualizar_user();
    }
    catch(PDOException $ex)

    {

    }
  }

 // echo "<meta http-equiv='refresh' content='0'>";
 ?>
  <script type="text/javascript">

function r() {
  document.getElementById('center').scrollIntoView({ behavior: 'smooth', block: 'center' });
}

</script>
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

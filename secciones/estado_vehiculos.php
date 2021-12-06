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
	<title>Drive-U - Vehiculos</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
  <link rel="stylesheet" type="text/css" href="../css/estilo_estado_v.css" />

  <script src="../js/funciones_lista_vehiculos.js"></script>
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
   
    <div class="gran_area">
      <div class="contenedor_p">

          <div class="Titulo_vehiculo"> Estado de vehiculos </div>
          
          <div class="Tabla">
            <form action="../procesos/procesos_vehiculos.php" method="POST">
              <br>
              <label for="filtro">Filtrar por:</label>
              <select name="filtro" id="filtro" onchange="Filtrar()">
                <option value="x" disabled selected>...</option>
                <option value="0">Mostrar Todos</option>
                <option value="1">Matricula</option>
                <option value="2">Tipo de vehiculo</option>
                <option value="3">Disponibilidad</option>
                <option value="4">Marca</option>
              </select>
              <input type="search" name="busqueda" id="busqueda" class="buscador" placeholder=" ">
              <button type="submit" name="btnBuscar" id="bntBuscar" value="1" class="buscar"><span class="material-icons pequeno">search</span></button>
            </form>
            <br><br>
            <span class="mensaje"><?php if(isset($_GET["msg"])){echo $_GET["msg"];}?></span>
            <div class="contenedor_table">
              <table class="tablap" id="tablap">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Placa</th>
                      <th colspan=2>Tipo de vehículo</th>
                      <th>Marca</th>
                      <th>Capacidad</th>
                      <th>Estado</th>
                      <th>Kilometraje</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                  if(isset($_GET["sql"])){
                      $sql=$_GET["sql"];
                  }
                  else{
                    $sql='SELECT v.id_vehiculo,m.modelo, placa,marca,estado,kilometraje,capacidad FROM vehiculos v INNER JOIN modelo m on v.modelo=m.id_modelo';
                  }

                  $consultarVehiculos=$con->query($sql);
                  while($carro=$consultarVehiculos->fetch(PDO::FETCH_OBJ)){?>
                  <tr>
                    <td><?php echo $carro->id_vehiculo;?></td>
                    <td colspan=2><?php echo $carro->placa;?></td>
                    <td><?php echo $carro->modelo?></td>
                    <td><?php echo $carro->marca?></td>
                    <td><?php echo $carro->capacidad?></td>

                    <td><?php 
                    if($carro->estado == 1)
                    echo "Disponible";
                    else if($carro->estado==2)
                    echo "No disponible";
                    else
                    echo "En mantenimiento";
                    ?>
                    </td>

                    <td><?php echo $carro->kilometraje?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
         
          <div class="Campos">
            <h2>Datos del vehiculo</h2>
            

            <form action="../procesos/procesos_vehiculos.php" method="POST">
              
              <input type="hidden" name ="m_id" id="m_id" placeholder="id" >
              <label for="m_placa">Placa: </label>
              <input type="text" name="m_placa" id="m_placa" placeholder="placa" readonly required>
              <br><br>

              <!-- Modelo se mostrara como un texto en editar y como select en agregar-->
              <label id="tm_modelo" for="m_modelo">Modelo: </label>
              <input type="text" id="m_modelo" placeholder="modelo" readonly>

              <label id="tn_modelo" name="tn_modelo" for="n_modelo" style="display: none;">Modelo: </label>
              <select name="n_modelo" id="n_modelo" style="display: none;"> <!-- onchange= cuando seleccionemos algo-->
                  <option value="" disabled selected>----</option> <!--el usuario no podra utilizar esta opcion-->
                  <option value="1">Sedan</option>
                  <option value="2">Pickup</option>
                  <option value="3">Sub Urban</option>
                  <option value="4">Bus</option>
              </select>
              <br><br>

              <!---->

              <label for="m_marca">Marca: </label>
              <input type="text" name="m_marca" id="m_marca" placeholder="marca" readonly required>
              <br><br>

              <label for="m_capacidad">Capacidad: </label>
              <input type="text" name="m_capacidad" id="m_capacidad" placeholder="capacidad" readonly required>
              <br><br>

              <label for="m_kilometraje">Kilometraje: </label>
              <input type="text" id="m_kilometraje" name="m_kilometraje" placeholder="kilometraje" required readonly>
              <br><br>

              <label for="m_estado">Estado: </label>
              <select name="m_estado" id="m_estado" required disabled> <!-- onchange= cuando seleccionemos algo-->
                  <option value="" disabled selected>----</option> <!--el usuario no podra utilizar esta opcion-->
                  <option value="1">Disponible</option>
                  <option value="2">No disponible</option>
                  <option value="3">En mantenimiento</option>
              </select>

              <br><br>
              <div class="opciones">
                <input class="elimina" type="submit" id="btnEliminar" name="btnEliminar" value="Eliminar" disabled/>

                <input class="actualiza" type="submit" id="btnActualizar" name="btnActualizar" value="Actualizar" disabled/>
                
                <br><br>
                <input class="nuevo" type="button" id="btnNuevo" name="btnNuevo" value="Añadir un nuevo vehiculo" onclick="agregar()"/>

                <input class="nuevo" type="submit" id="btnAgregar" name="btnAgregar" value="Agregar" style="display:none;"/>
              </div>
          </form>
                  </div>
          </div>
        <br><br>

      </div>
      
    </div>
  
  <br><br><br><br><br><br><br><br><br>
   <footer>
     <br>
	 ©2021. Drive-U.
     Universidad Tecnológica de Panamá
     <br>
     Confeccionado por Angel Carrillo, Wencers Castillo, Elianys González, Karla Quiel, Cristobal Rodriguez y Luis Saldaña. 
     <br><br>
 	</footer>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Drive-U - Inicio</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
   <link rel="stylesheet" type="text/css" href="../css/estilo_login.css" />
</head>
<body>
   <header>
   <div class="logo"><img src="../imagenes/logo_utp.png" width="120px">
    <span class="utp">Universidad Tecnológica de Panamá</span>
  </div> 
   <span class="titulo">Drive-<span class="letra_u">U</span></span></header>
   
   <nav>
    <ul>
        <li><a href="../index.php">Inicio</a></li>
   </ul>
   </nav>

   <BR><BR>
   <BR><BR>
   
  
     <form action="../procesos/procesar_login.php" method="POST">
      <fieldset>
         <h1>Inicio de sesión</h1>
         
         <BR>
         <span class="sub">Correo: </span><input type="email" name=correo required placeholder="direccion@email.com">
         <BR>
         <span class="sub">Contraseña: </span><input type="password" name=password required placeholder="*********">

         <BR><BR>
         <button class="envio" type="submit">Acceder</button>
         <BR><BR>

         <?php if(isset($_GET['msg'])) { ?>
            <?php echo $_GET['msg'];?>
         <?php } ?>
         
      </fieldset>

     </form>

   <br><br><br><br>

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

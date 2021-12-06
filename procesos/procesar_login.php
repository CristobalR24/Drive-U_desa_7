<?php session_start(); // se debe colocar siempre al principio de todo
include("../conexion/conexion.php");

if(isset ($_POST['correo']) && isset($_POST['password'])){
    $email=$_POST['correo'];
    $pass=md5($_POST['password']);

    $consulta=$con->query("SELECT id_usuario,tipo FROM usuarios WHERE email='$email' and password = '$pass'");
    $consulta->setFetchMode(PDO::FETCH_ASSOC);
    $consulta->execute();
    $row=$consulta->fetch();

    if($consulta->rowCount()>0){
     
        $_SESSION['sw']=true; //variables de sesión !! obtengo todos los datos del usuario cuando inicia sesion
        $_SESSION['id']=$row['id_usuario'];
        
        header("Location: ../index.php");
        exit;
    }
    else{
        header("Location: ../secciones/login.php?msg=Usuario o contraseña incorrectos, intente nuevamente");
        exit();
    }

}
else
echo "no entro"
?>
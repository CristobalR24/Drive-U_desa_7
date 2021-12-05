<? session_start(); // se debe colocar siempre al principio de todo
include("../conexion/conexion.php");

if(isset ($_POST['correo']) && isset($_POST['password'])){
    $email=$_POST['correo'];
    $pass=md5($_POST['password']);

    $consulta=$con->query("SELECT id_usuario FROM usuarios WHERE email='$email' and password = '$pass'");
    $consulta->setFetchMode(PDO::FETCH_ASSOC);
    $consulta->execute();
    $row=$consulta->fetch();

    if($consulta->rowCount()>0){
     
        $_SESSION['sw']=true; //variables de sesión !! obtengo todos los datos del usuario cuando inicia sesion
        $_SESSION['id']=$row['id'];
       

        header("Location: ../segmentos/panel.php");
        exit;
    }
    else{
        header("Location: ../index.php?msg=Usuario o contraseña incorrectos, intente nuevamente");
        exit();
    }

}
else
echo "no entro"
?>
<?php
//include('../conexion/conexion.php');
class registrar_usuario
{
    function registrar($con)
    {
        //global $con;
        try
        { 
                $nombre=$_POST['nombre'];
                $cedula=$_POST['cedula'];
                $facultad=$_POST['facultad'];
                $tipo=$_POST['tipo'];
                $email=$_POST['email'];
                $pass=md5($_POST['pass']);

                $data=['nombre'=>$nombre,"facultad"=>$facultad,"cedula"=>$cedula,"email"=>$email,"password"=>$pass,"tipo"=>$tipo];
                $sql="insert into usuarios(nombre,facultad,cedula,email,password,tipo) values (:nombre,:facultad,:cedula, :email,:password,:tipo);";
                $stmt=$con->prepare($sql);
                if($stmt->execute($data) )
                {
                    echo "<br><br><span class='mensaje normal'>Usuario registrado</span>";
                }
                
        }
        catch(PDOException $ex)
        {
            if($ex->errorInfo[1] == 1062){
                echo "<br><br><span class='mensaje error'>Este correo ya esta registrado</span>";
            }
            else
                echo "<br><br><span class='mensaje error'>Error al registrar: ".$ex->getMessage()."</span>";
        }
    }

    function existe_cedula($ced,$con){
        global $con;
        try{
            $stmt = $con->prepare('SELECT * FROM usuarios WHERE cedula=?');
            $stmt->bindParam(1, $ced, PDO::PARAM_STR);
            $stmt->execute();
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!$fila)
                {return false;}
            else
                {return true;} 
        }
        catch(PDOException $ex){
            echo $ex->getMessage();
            return false;
        }
            
    }
}

?>
<?php

class registrar_usuario
{
    function registrar()
    {
        include('../conexion/conexion.php');
        try
        {
                $nombre=$_POST['nombre'];
                $cedula=$_POST['cedula'];
                $facultad=$_POST['facultad'];
                $tipo=$_POST['tipo'];
                $email=$_POST['email'];
                $pass=md5($_POST['pass']);

                //echo $facultad;
                $data=['nombre'=>$nombre,"facultad"=>$facultad,"cedula"=>$cedula,"email"=>$email,"password"=>$pass,"tipo"=>$tipo];
                $sql="insert into usuarios(nombre,facultad,cedula,email,password,tipo) values (:nombre,:facultad,:cedula, :email,:password,:tipo);";
                $stmt=$con->prepare($sql);
                if($stmt->execute($data) )
                {
                    //echo "exito";
                }
                
        }
        catch(PDOExceptio $ex)
        {

        }
    }
}

?>
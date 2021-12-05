<?php

    class actualizar_usuarios
    {   
        function obtener_user()
        { require('../conexion/conexion.php');
            error_reporting(0);
           try{
            $f;
           $consulta; 
           //$consulta=$con->query("SELECT usuarios.id_usuario,usuarios.nombre,facultad.nombre,usuarios.cedula,tipo_usuario.nombre FROM usuarios JOIN tipo_usuario on tipo_usuario.id_tipo = usuarios.tipo join facultad on facultad.id_facultad=usuarios.facultad");
          $consulta=$con->query("SELECT us.id_usuario,us.nombre,fc.nombre as 'a',us.cedula,tu.nombre as 'b'
          from usuarios us
          inner join facultad fc on us.facultad=fc.id_facultad
          INNER JOIN tipo_usuario tu on tu.id_tipo=us.tipo
          order by us.tipo desc");
           
            $id;
            $nombre;
            $facultad;
            $cedula;
            $tipo;
         $consulta->setFetchMode(PDO::FETCH_ASSOC);
         $consulta->execute();
         $row;
         $retorno = array();

            if($consulta->rowCount()>0)
            {
                while($row=$consulta->fetchAll())
                {
                    $cantidad=count($row);
                    for($i=0;$i<$cantidad;$i++)
                    {
                        $r=implode(',',$row[$i]);
                        list($id,$nombre,$facultad,$cedula,$tipo)=explode(',',$r);
                        array_push($retorno,$id,$nombre,$facultad,$cedula,$tipo);
                        //print_r($retorno);
                    }
                }
            }
            
            


           } 
           catch(Exception $ex)
           {

           }
          // print_r($retorno);
           return $retorno;
        }


        function eliminar()
        {
            require('../conexion/conexion.php');
            try{
                $id=$_POST['id'];
                $data=['id'=>$id];
                $sql="delete from usuarios where usuarios.id_usuario=:id";
                $stmt=$con->prepare($sql);
                if($stmt->execute($data) )
                {
                   // echo "<script type=text/javascript> location.reload(); </script>";
                   echo "<meta http-equiv='refresh' content='0'>";
                
                }
            }

            catch(Exception $ex)
            {
             echo $ex;
            }
        }


        function actualizar_user()
        {require('../conexion/conexion.php');
            $id=$_POST['id'];
            $nombre=$_POST['usuario'];
            $facultad=$_POST['facultad'];
            $tipo=$_POST['tipo'];
            $data=['id'=>$id,'nombre'=>$nombre,'facultad'=>$facultad,'tipo'=>$tipo];
            $sql="update usuarios set nombre=:nombre,facultad=:facultad,tipo=:tipo where id_usuario=:id";
            
            $stmt=$con->prepare($sql);
            if($stmt->execute($data) )
            {
               // echo "<script type=text/javascript> location.reload(); </script>";
               echo "<meta http-equiv='refresh' content='0'>";
            
            }
        }
    }

?>
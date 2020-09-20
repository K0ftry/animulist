<?php
session_start();
include 'conexion.php';

    $id = $_POST['id'];
    $valor = $_POST['submit'];
    

    if($valor == 1 OR $valor == 2 OR $valor == 3){
        
            $sentencia=$conexion->prepare("UPDATE animes SET lista_id=? WHERE id=?");
            $sentencia->bind_param('si',$valor,$id);
            $sentencia->execute();

            if($sentencia->execute()){
                echo "<script>
                        alert('Lista actualizada');
                        window.location= 'dashboard.php'
            </script>";
            }else{
                echo "<script>
                        alert('Error al actualizar');
                        window.location= 'dashboard.php'
            </script>";
            }
            
    }else{

    $consulta=$conexion->prepare("DELETE FROM `animes` WHERE id=?");
    $consulta->bind_param('i',$id);
    
    if($consulta->execute()){
        echo "<script>
                alert('Eliminado de tu lista');
                window.location= 'dashboard.php'
    </script>";
    }else{
        echo "<script>
                alert('Error al eliminar');
                window.location= 'dashboard.php'
    </script>";
    }
    }

    

   mysqli_close($conexion);


?>
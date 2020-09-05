<?php
include 'conexion.php';

if(isset($_POST['alias'],$_POST['correo'],$_POST['password']) and $_POST['alias']!="" and $_POST['correo']!="" and $_POST['password']!=""){
 
    $usu_alias=$_POST['alias'];
    $usu_correo=$_POST['correo'];
    $usu_password=$_POST['password'];   
}



$consulta="insert into usuarios
            (id, alias, correo, password)
            VALUES
            (DEFAULT, '".$usu_alias."','".$usu_correo."', '".$usu_password."')";

mysqli_query($conexion,$consulta) or die ("Problemas al insertar".mysqli_error($conexion));
mysqli_close($conexion);

?>
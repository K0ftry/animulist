<?php
include 'conexion.php';
$usu_alias=$_POST['alias'];
$usu_correo=$_POST['correo'];
$usu_password=$_POST['password'];

$consulta="insert into usuarios values('".$usu_alias."','".$usu_correo."','".$usu_password."')";
mysqli_query($conexion,$consulta) or die ("Problemas al insertar".mysqli_error($conexion));
mysqli_close($conexion);

?>
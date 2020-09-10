<?php
include 'conexion.php';
$usu_email=$_POST['email'];
$usu_password=$_POST['password'];

$sentencia=$conexion->prepare("SELECT * FROM usuarios WHERE correo=? AND password=?");
$sentencia->bind_param('ss',$usu_email,$usu_password);
$sentencia->execute();

$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()) {
    session_start(); 
    $_SESSION['correo'] = $usu_email; 
    header('Location: dashboard.html');  
}else{
  print 'Error al iniciar sesión';
}
$sentencia->close();
$conexion->close();
?>
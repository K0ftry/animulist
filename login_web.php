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
    $_SESSION['usuario_info'] = array(
      'id'=>$fila['id'],
      'correo'=>$fila['correo'],
      'alias'=>$fila['alias']
  );
    header('Location: home.php');  
}else{
  print 'Error al iniciar sesión';
}
$sentencia->close();
$conexion->close();
?>
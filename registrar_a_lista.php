<?php
session_start();
include 'conexion.php';

if(isset($_POST['submit'],$_POST['title'],$_POST['imagen']) and $_POST['submit']!="" and $_POST['title']!="" and $_POST['imagen']!=""){
    $lista_id = $_POST['submit'];
    $titulo = $_POST['title']; 
    $id = $_SESSION['usuario_info']['id'];
    $imagen = $_POST['imagen'];  

    $consulta="insert into animes
            (id, nombre_anime, lista_id, usuario_id, imagen_url)
            VALUES
            (DEFAULT, '".$titulo."','".$lista_id."', '".$id."','".$imagen."')";

mysqli_query($conexion,$consulta) or die ("Problemas al insertar".mysqli_error($conexion));
mysqli_close($conexion);

echo "<script>
                alert('Agregado a tu lista');
                window.location= 'dashboard.php'
    </script>";
}else{
    echo "<script>
                alert('Error al agregar');
                window.location= 'dashboard.php'
    </script>";
}



?>
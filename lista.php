<?php
    include 'conexion.php';
    session_start();
    $id = $_SESSION['usuario_info']['id'];
    $id_lista1 = 1;
    $id_lista2 = 2;
    $id_lista3 = 3;

    $sentencia1 = $conexion->prepare("SELECT nombre_anime,imagen_url FROM animes WHERE lista_id = ? AND usuario_id = ?
    ORDER BY nombre_anime ASC");

    $sentencia1->bind_param('ii',$id_lista1,$id);

    $sentencia1->execute();

    $resultado1 = $sentencia1->get_result();

    $fila1 = $resultado1->fetch_all();
    

    $sentencia2 = $conexion->prepare("SELECT nombre_anime,imagen_url FROM animes WHERE lista_id = ? AND usuario_id = ?
    ORDER BY nombre_anime ASC");

    $sentencia2->bind_param('ii',$id_lista2,$id);

    $sentencia2->execute();

    $resultado2 = $sentencia2->get_result();

    $fila2 = $resultado2->fetch_all();

    $sentencia3 = $conexion->prepare("SELECT nombre_anime,imagen_url FROM animes WHERE lista_id = ? AND usuario_id = ?
    ORDER BY nombre_anime ASC");

    $sentencia3->bind_param('ii',$id_lista3,$id);

    $sentencia3->execute();

    $resultado3 = $sentencia3->get_result();

    $fila3 = $resultado3->fetch_all();

    $conexion->close();
    
    header('Location: dashboard.php');

    

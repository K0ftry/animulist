<?php
    include 'conexion.php';

    $sql_pendientes = "SELECT nombre_anime,imagen_url FROM animes WHERE lista_id = '1'
    ORDER BY nombre_anime ASC";

    $sql_viendo = "SELECT nombre_anime,imagen_url FROM animes WHERE lista_id = '2'
    ORDER BY nombre_anime ASC";

    $sql_vistos = "SELECT nombre_anime,imagen_url FROM animes WHERE lista_id = '3'
        ORDER BY nombre_anime ASC";

    

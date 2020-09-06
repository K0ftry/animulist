<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

    <title>AnimuList</title>
  </head>
  <body>
    <!--******Aquí inicia el código******-->
    <?php
        $nombre_anime = $_POST['nombre_anime'];
        $json = file_get_contents("https://api.jikan.moe/v3/search/anime?q=$nombre_anime");
        
        $array = json_decode($json, true);
        $results = $array['results'];
    ?>

    <div class="container">
         <!--Inicia el navbar-->
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">AnimuList</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                      <ul class="navbar-nav">
                        <li class="nav-item active"> 
                          <a class="nav-link" href="login.html"><i class="far fa-user"> Iniciar Sesión</i> <span class="sr-only">(current)</span></a>
                        </li>
                        <li>
                          <form action="#" method="POST" enctype="multipart/form-data" class="form-inline my-2 my-lg-0">
                            <input name="nombre_anime" class="form-control mr-sm-2" type="search" placeholder="Buscar anime" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                          </form>
                        </li>
                      </ul>
                    </div>
                  </nav>
                </div>
            </div>
                  <!--Termina el navbar-->
                  <div class="row">
                      <div class="col">
                          <h2 class="text-center">Waifu del día</h2>
                      </div>
                  </div>
                  <!--Card-->
                  <div class="row">
                  <?php 
                    for($i=0 ; $i<sizeof($results) ; $i++){
                         $titulo = $results[$i]['title'];
                         $imagen = $results[$i]['image_url'];
                  ?>
                      <div class="col-6 mb-3">
                        <div class="card h-100">
                            <img src="<?php print $imagen; ?>" style="height: 190px;" alt="">
                            <div class="card-body">
                              <blockquote class="blockquote mb-0">
                                <p>
                                   <?php print $titulo; ?> 
                                </p>
                              </blockquote>
                            </div>
                          </div>
                      </div>
                      <?php } ?>
                  </div>
                  
                  <!--Card--> 
    </div>
    <!--******Aquí termina el código******-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
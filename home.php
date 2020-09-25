<?php
session_start();

if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info']))
    header('Location: index.php');
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/icon.png" />

    <title>KofeLab</title>
  </head>
  <body style="background-color: #000033;">
    <!--******Aquí inicia el código******-->
    <div class="container">
         <!--Inicia el navbar-->
         <div class="row">
            <div class="col pl-0 pr-0">
                <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000066;">
                    <a class="navbar-brand text-white font-weight-bold" href="home.php" style="text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">KofeLab</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="background-color: #000033;">
                      <ul class="navbar-nav">
                        
                        <li>
                          <form action="resultado_loged.php" method="POST" enctype="multipart/form-data" class="form-inline my-2 my-lg-0">
                            <input name="nombre_anime" class="form-control mr-sm-2" type="search" placeholder="Buscar anime" aria-label="Search">
                            <div>
                              <button class="btn btn-outline-light my-2 my-sm-0 ml-1" type="submit">Buscar</button>
                              <a class="btn btn-primary" href="lista.php">Mi lista</a>
                            </div>
                            
                            
                          </form>
                            
                        </li>
                        
                        <li class="nav-item active"> 
                          <a class="nav-link text-white" style="display: inline-block;" href="#"><?php print $_SESSION['usuario_info']['alias']." - link establecido"; ?><span class="sr-only">(current)</span></a>
                          <a class="pl-5" href="salir.php">Desconectar</a>
                        </li>
                        <li>
                          
                        </li>
                      </ul>
                    </div>
                  </nav>
                </div>
            </div>
                  <!--Termina el navbar-->
                  <div class="row">
                      <div class="col" style="background-color: #000033;">
                          <h2 class="text-center text-white">Bienvenido onii-chan</h2>
                      </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-3">
                       <div class="spinner-border text-primary" role="status">
                          <span class="sr-only">Loading...</span>
                       </div>
                    </div>
                    <div class="col-3">
                    <div class="spinner-border text-warning" role="status">
                          <span class="sr-only">Loading...</span>
                       </div>
                    </div>
                    <div class="col-3">
                    <div class="spinner-border text-danger" role="status">
                          <span class="sr-only">Loading...</span>
                       </div>
                    </div>
                    <div class="col-3">
                    <div class="spinner-border text-success" role="status">
                          <span class="sr-only">Loading...</span>
                       </div>
                    </div>
                  </div>

                  <!-- Carousel -->
                  <div id="carouselExampleSlidesOnly" class="carousel slide mt-2 mb-2" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active" style="height: 200px; width: 100%">
                          <img src="img/rem.png" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item" style="height: 200px; width: 100%">
                        <img src="img/megumin.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item" style="height: 200px; width: 100%">
                        <img src="img/alice.jpg" class="d-block w-100" alt="...">
                      </div>
                    </div>
                  </div>
                  <!-- Carousel -->
                  
                  <div class="row">
                    <div class="col-3">
                       <div class="spinner-grow text-primary" role="status">
                          <span class="sr-only">Loading...</span>
                       </div>
                    </div>
                    <div class="col-3">
                    <div class="spinner-grow text-warning" role="status">
                          <span class="sr-only">Loading...</span>
                       </div>
                    </div>
                    <div class="col-3">
                    <div class="spinner-grow text-danger" role="status">
                          <span class="sr-only">Loading...</span>
                       </div>
                    </div>
                    <div class="col-3">
                    <div class="spinner-grow text-success" role="status">
                          <span class="sr-only">Loading...</span>
                       </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <img src="img/yui.png" alt="" class="d-block w-100">
                    </div>
                    
                  </div>

                  
    </div>
    <!--******Aquí termina el código******-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
<?php
session_start();

if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info']))
    header('Location: login.php');
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

    <title>AnimuList</title>
  </head>
  <body>
    <!--******Aquí inicia el código******-->
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
                          <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
                        </li>
                        <li>
                          <a href="salir.php">Desconectar</a>
                        </li>
                        <li>
                          <form action="resultado_loged.php" method="POST" enctype="multipart/form-data" class="form-inline my-2 my-lg-0">
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
                          <h2 class="text-center">Mis listas</h2>
                      </div>
                  </div>
                  <!--Collapse-->
                  <div class="row">
                      <div class="col">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                              <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Animes pendientes
                                  </button>
                                </h2>
                              </div>
                          
                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                  <!--table-->
                                  <table class="table table-striped table-dark">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Imagen</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Acción</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        include 'conexion.php';
                                        $id = $_SESSION['usuario_info']['id'];
                                        $id_lista1 = 1;

                                        $sentencia1 = $conexion->prepare("SELECT nombre_anime,imagen_url FROM animes WHERE lista_id = ? AND usuario_id = ?
                                        ORDER BY nombre_anime ASC");

                                        $sentencia1->bind_param('ii',$id_lista1,$id);

                                        $sentencia1->execute();

                                        $resultado1 = $sentencia1->get_result();

                                        $fila1 = $resultado1->fetch_all();
                                        
                                        $cantidad1 = sizeof($fila1);
                                        if($cantidad1 > 0){
                                          $c1=0;
                                          for($x1 =0; $x1 < $cantidad1; $x1++){
                                            $c1++;
                                            $item1 = $fila1[$x1];
                                      ?>
                                      <tr>
                                        <th scope="row"><?php print $c1 ?></th>
                                        <td>Mark</td>
                                        <td><?php print $item1[0] ?></td>
                                        <td>
                                        <form action="acciones.php" method="POST" enctype="multipart/form-data">
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Acciones
                                          </button>
                                          <div class="dropdown-menu">
                                            <ul>
                                              <li class="mb-1"> <button name="submit" value="1" type="submit" class="btn btn-outline-danger btn-sm">Pendiente</button></li>
                                              <li class="mb-1"> <button name="submit" value="2" type="submit" class="btn btn-outline-warning btn-sm">Viendo</button></li>
                                              <li class="mb-1"> <button name="submit" value="3" type="submit" class="btn btn-outline-success btn-sm">Visto</button></li>
                                              <li class="mb-1"> <button name="submit" value="3" type="submit" class="btn btn-outline-success btn-sm">Eliminar</button></li>
                                            </ul>
                                          </div>
                                        </div>
                                        </form>
                                        </td>
                                      </tr>
                                            <?php }}else{
                                              ?>

                                              <tr>
                                                <td colspan="6">NO HAY REGISTROS</td>
                                              </tr>
                            
                                                <?php }
                                                $sentencia1->close();
                                                $conexion->close();
                                                ?>
                                    </tbody>
                                  </table>
                                  <!--table-->

                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Viendo actualmente
                                  </button>
                                </h2>
                              </div>
                              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Animes vistos
                                  </button>
                                </h2>
                              </div>
                              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
                  <!--Collapse--> 
    </div>
    <!--******Aquí termina el código******-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
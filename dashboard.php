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
    <link rel="shortcut icon" href="img/icon.png" />

    <title>KofeLab</title>
  </head>
  <body>
    <!--******Aquí inicia el código******-->
    <div class="container">
         <!--Inicia el navbar-->
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #6DEB59;">
                    <a class="navbar-brand text-white font-weight-bold" href="home.php" style="text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">KofeLab</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="background-color: #A7F55D;">
                      <ul class="navbar-nav">
                        
                        <li>
                          <form action="resultado_loged.php" method="POST" enctype="multipart/form-data" class="form-inline my-2 my-lg-0">
                            <input name="nombre_anime" class="form-control mr-sm-2" type="search" placeholder="Buscar anime" aria-label="Search">
                            <div>
                              <button class="btn btn-outline-dark my-2 my-sm-0 ml-1" type="submit">Buscar</button>
                              <a class="btn btn-primary" href="lista.php">Mi lista</a>
                            </div>
                            
                            
                          </form>
                            
                        </li>
                        
                        <li class="nav-item active"> 
                          <a class="nav-link" style="display: inline-block;" href="#"><?php print $_SESSION['usuario_info']['alias']." - link establecido"; ?><span class="sr-only">(current)</span></a>
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
                      <div class="col">
                          <h2 class="text-center">Mis listas</h2>
                      </div>
                  </div>
                  <!--Collapse-->
                  <div class="row">
                      <div class="col">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                              <div class="card-header" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);" id="headingOne">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Animes pendientes
                                  </button>
                                </h2>
                              </div>
                          
                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body" style="padding-bottom: 100px;">
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

                                        $sentencia1 = $conexion->prepare("SELECT id,nombre_anime,imagen_url FROM animes WHERE lista_id = ? AND usuario_id = ?
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
                                        <th class="p-0" scope="row"><?php print $c1 ?></th>
                                        <td class="p-0"><img style="height: 50px; width: 50px" src="<?php print $item1[2] ?>" alt=""></td>
                                        <td class="p-0"><?php print $item1[1] ?></td>
                                        <td class="p-0">
                                        <form action="acciones.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php print $item1[0] ?>">

                                        <div class="btn-group">
                                          <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Acciones
                                          </button>
                                          <div class="dropdown-menu">
                                            <ul>
                                              <li class="mb-1"> <button name="submit" value="2" type="submit" class="btn btn-outline-warning btn-sm">Viendo</button></li>
                                              <li class="mb-1"> <button name="submit" value="3" type="submit" class="btn btn-outline-success btn-sm">Visto</button></li>
                                              <li class="mb-1"> <button name="submit" value="4" type="submit" class="btn btn-dark btn-sm">Eliminar</button></li>
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
                              <div class="card-header" style="background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);" id="headingTwo" style="z-index: 0;">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Viendo actualmente
                                  </button>
                                </h2>
                              </div>
                              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                
                                <div class="card-body" style="padding-bottom: 100px;">
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
                                        $id_lista2 = 2;

                                        $sentencia2 = $conexion->prepare("SELECT id,nombre_anime,imagen_url FROM animes WHERE lista_id = ? AND usuario_id = ?
                                        ORDER BY nombre_anime ASC");

                                        $sentencia2->bind_param('ii',$id_lista2,$id);

                                        $sentencia2->execute();

                                        $resultado2 = $sentencia2->get_result();

                                        $fila2 = $resultado2->fetch_all();
                                        
                                        $cantidad2 = sizeof($fila2);
                                        if($cantidad2 > 0){
                                          $c2=0;
                                          for($x2 =0; $x2 < $cantidad2; $x2++){
                                            $c2++;
                                            $item2 = $fila2[$x2];
                                      ?>
                                      <tr>
                                        <th class="p-0" scope="row"><?php print $c2 ?></th>
                                        <td class="p-0"><img style="height: 50px; width: 50px" src="<?php print $item2[2] ?>" alt=""></td>
                                        <td class="p-0"><?php print $item2[1] ?></td>
                                        <td class="p-0">
                                        <form action="acciones.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php print $item2[0] ?>">

                                        <div class="btn-group">
                                          <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Acciones
                                          </button>
                                          <div class="dropdown-menu">
                                            <ul>
                                            <li class="mb-1"> <button name="submit" value="1" type="submit" class="btn btn-outline-danger btn-sm">Pendiente</button></li>
                                              <li class="mb-1"> <button name="submit" value="3" type="submit" class="btn btn-outline-success btn-sm">Visto</button></li>
                                              <li class="mb-1"> <button name="submit" value="4" type="submit" class="btn btn-dark btn-sm">Eliminar</button></li>
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
                                                $sentencia2->close();
                                                $conexion->close();
                                                ?>
                                    </tbody>
                                  </table>
                                  <!--table-->

                                
                                </div>
                              </div>
                            </div>
                            <div class="card">
                              <div class="card-header" style="background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 50%, rgba(252,176,69,1) 100%);" id="headingThree">
                                <h2 class="mb-0">
                                  <button class="btn btn-link btn-block text-left collapsed text-white" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Animes vistos
                                  </button>
                                </h2>
                              </div>
                              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                              <div class="card-body" style="padding-bottom: 100px;">
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
                                        $id_lista3 = 3;

                                        $sentencia3 = $conexion->prepare("SELECT id,nombre_anime,imagen_url FROM animes WHERE lista_id = ? AND usuario_id = ?
                                        ORDER BY nombre_anime ASC");

                                        $sentencia3->bind_param('ii',$id_lista3,$id);

                                        $sentencia3->execute();

                                        $resultado3 = $sentencia3->get_result();

                                        $fila3 = $resultado3->fetch_all();
                                        
                                        $cantidad3 = sizeof($fila3);
                                        if($cantidad3 > 0){
                                          $c3=0;
                                          for($x3 =0; $x3 < $cantidad3; $x3++){
                                            $c3++;
                                            $item3 = $fila3[$x3];
                                      ?>
                                      <tr>
                                        <th class="p-0" scope="row"><?php print $c3 ?></th>
                                        <td class="p-0"><img style="height: 50px; width: 50px" src="<?php print $item3[2] ?>" alt=""></td>
                                        <td class="p-0"><?php print $item3[1] ?></td>
                                        <td class="p-0">
                                        <form action="acciones.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php print $item3[0] ?>">

                                        <div class="btn-group">
                                          <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Acciones
                                          </button>
                                          <div class="dropdown-menu">
                                            <ul>
                                            <li class="mb-1"> <button name="submit" value="1" type="submit" class="btn btn-outline-danger btn-sm">Pendiente</button></li>
                                              <li class="mb-1"> <button name="submit" value="2" type="submit" class="btn btn-outline-warning btn-sm">Viendo</button></li>
                                              <li class="mb-1"> <button name="submit" value="4" type="submit" class="btn btn-dark btn-sm">Eliminar</button></li>
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
                                                $sentencia3->close();
                                                $conexion->close();
                                                ?>
                                    </tbody>
                                  </table>
                                  <!--table-->

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
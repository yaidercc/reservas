<?php
include 'php/conexion.php';
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresará a login.php
if (!isset($_SESSION['cedula'])) {
     header('Location: login.php');
     exit();
}

?>

<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap CSS -->
     <script src="librerias/jquery-3.5.1.slim.min.js"></script>
     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/2efdabf6ca.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="Css/normalice.css" crossorigin="anonymous">
     <link rel="stylesheet" href="Css/Estilos.css" crossorigin="anonymous">
     <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>

     <title>Listado reservaciones</title>
</head>

<body>
     <header>
          <nav class="navegacion-reservas">
               <div class="menu-burger">
                    <a href="#">
                         <ion-icon name="menu"></ion-icon>
                    </a>
               </div>
               <div class="logo">
                    <img id="logo-air" src="img/logo_airplan.png" height="100px" width="100px">
               </div>
               <div class="enlaces">
                    <a href="reservas.php">
                         <ion-icon name="calendar"></ion-icon><span>reservar</span>
                    </a>
                    <!--imprimir datos de los usuarios que tengan que ver con el filtro-->
                    <?php
                    if ($_SESSION['tipo_usuario'] == 1) {
                         echo "<a href='reportes.php?opc=10' class='miga'>
                              <ion-icon name='receipt'></ion-icon><span>reportes</span>
                         </a>";
                         echo "<a href='gestion_usuarios.php?opc=10'>
                         <ion-icon name='people'></ion-icon><span>gestion de usuarios</span>
                         </a>";
                    }
                    ?>
                    <a href="php/salir.php">
                         <ion-icon name="power"></ion-icon><span> salir</span>
                    </a>
               </div>
          </nav>
     </header>
     <!--buscar por datos del usuario
     <form action="buscar_usuario.php" method="GET">
          <input type="text" placeholder="buscar" id="busqueda" name="busqueda" class="form-control">
          <input type="submit" value="buscar" class="btn_buscar btn-primary">
     </form>-->
     <div class="container-general">
          <!--filtrar por fecha-->
          <h1 class="titulo">listado de reservaciones</h1>
          <form action="filtrar_registros.php" id="busquedas" method="GET">
               <div class="descargas">
                    <!--<div class="descarga pdf">
                         <a href="#"><i class="fas fa-file-pdf"></i><span> pdf</span></a>
                    </div>-->
                    
               </div>
               <div class="conj">
                    <input type="date" id="inicial" name="inicial" class="form-control">
                    <input type="date" id="final" name="final" class="form-control">
                    <input type="submit" value="buscar" class="btn_buscar btn-primary">
               </div>

          </form>
          <table id="reservaciones" class="table table-striped table-hover">
               <thead class="table">
                    <tr>
                         <th scope="col">nombres</th>
                         <th scope="col">apellidos</th>
                         <th scope="col">modulo reservado</th>
                         <th scope="col">fecha de reserva</th>
                         <th scope="col">hora de inicio</th>
                         <th scope="col">hora de fin</th>
                    </tr>
               </thead>
               <tbody>
                    <?php
                    /* cuenta la cantidad de tuplas que tienen relacion con la consulta
                    $cantidades = mysqli_query($conexion, "SELECT COUNT(*) as cantidad FROM `empleados` e INNER JOIN `reservas` r ON r.id_fk=e.id ORDER BY e.Nombres");
                    //covierte en un array los datos que trajo de la bd
                    $resultados = mysqli_fetch_array($cantidades);
                    // mete la cantidad registros en una variable
                    $total_registros = $resultados['cantidad'];
                    //cantidad de registros que se van a mostrar en la tabla
                    $por_pagina =  $_REQUEST['opc'];
                    //verifica que pagina ha sido seleccionada o en que pagina esta
                    if (empty($_GET['pagina'])) {
                         // si no hay nada pone la primera pagina
                         $pagina = 1;
                    } else {
                         //si hay algo obtiene el valor
                         $pagina = $_GET['pagina'];
                    }
                    //operacion para ver desde que numero de los registros de la bd, debe traer
                    $desde = ($pagina - 1) * $por_pagina;
                    //operacion para ver hasta que numero de los registros de la bd, debe traer
                    $total = ceil($total_registros / $por_pagina);*/
                    //consultar los registros que tengan que ver con la consulta
                    $consultar = mysqli_query($conexion, "SELECT * FROM `empleados` e INNER JOIN `reservas` r ON r.id_fk=e.id ORDER BY r.cod_modulo_fk ASC ");
                    //verifica el numero de tuplas que se hayan encontrado
                    $cantidades = mysqli_num_rows($consultar);
                    if ($cantidades > 0) { ?>
                         <?php
                         while ($row = mysqli_fetch_array($consultar)) { ?>
                              <tr>
                                   <td><?php echo $row['Nombres'] ?></td>
                                   <td><?php echo $row['Apellidos'] ?></td>
                                   <td><?php echo $row['cod_modulo_fk'] ?></td>
                                   <td><?php echo $row['fecha_reserva'] ?></td>
                                   <td><?php echo $row['hora_inicio'] ?></td>
                                   <td><?php echo $row['hora_final'] ?></td>
                              </tr>
                         <?php
                         }
                         ?>
                    <?php
                    }
                    ?>
               </tbody>
          </table>
     </div>
     <script src="librerias/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
     <!--librerias boostrap 4-->
     <script src="bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

     <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
     
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
     <script src="js/Funciones.js"></script>
</body>

</html>
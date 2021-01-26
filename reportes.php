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
     <script src="librerias/fontawesome.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="Css/normalice.css" crossorigin="anonymous">
     <link rel="stylesheet" href="Css/Estilos.css" crossorigin="anonymous">
     <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>

     <title>Listado reservaciones</title>
</head>

<body>
<?php include "nav.php";?>

     <div class="container-general">
          <!--filtrar por fecha-->
          <h1 class="titulo">listado de reservaciones</h1>
          <form action="filtrar_registros.php" id="busquedas" method="GET">
               <div class="descargas">
                 
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
                    //consulta de reservas
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
     <!--libreria jquery-->
     <script src="librerias/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
     <!--librerias boostrap 4-->
     <script src="bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
     <!--librerias datatables-->
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
     <!--librerias para botones de excel y pdf-->
    <script type="text/javascript" src="datatables/jszip.min.js"></script>
    <script type="text/javascript" src="datatables/pdfmake.min.js"></script>
    <script type="text/javascript" src="datatables/vfs_fonts.js"></script>
    <script type="text/javascript" src="datatables/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="datatables/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="datatables/buttons.html5.min.js"></script>
     <script src="js/Funciones.js"></script>
</body>

</html>
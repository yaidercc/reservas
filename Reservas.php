<?php
include 'php/conexion.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <!-- jQuery and JS bundle w/ Popper.js -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
     <script src="https://kit.fontawesome.com/2efdabf6ca.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="Css/normalice.css" crossorigin="anonymous">
     <link rel="stylesheet" href="Css/Estilos.css" crossorigin="anonymous">
     <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>

     <title>Reservar</title>
</head>

<body>
     <nav class="section-3">
          <ul>
               <h1>Airplan</h1>
               <li> <a href="#" id="salir">
                         <ion-icon name="person"></ion-icon><span><?php echo $_SESSION['primer_nombre']; ?></span>
                    </a></li>
               <li><a href="#">
                         <ion-icon name="calendar"></ion-icon> <span>mis reservas</span>
                    </a></li>
               <li> <a href="#" id="salir">
                         <ion-icon name="power"></ion-icon><span>salir</span>
                    </a></li>

          </ul>
     </nav>
     <div class="form-container">
          <form action="#" id="form_reservar">
               <h1>Reservar</h1>
               <div class="container-inputs">
                    <div class="form-group">
                         <label class="col-lg-6 control-label"><span class="text-title">tus nombres</span><span class="text-danger"></span></label>
                         <input type="text" class="form-control" value="<?php echo $_SESSION['primer_nombre'], $_SESSION['segundo_nombre'] ?>" readonly>
                    </div>
                    <div class="form-group">
                         <label class="col-lg-6 control-label"><span class="text-title">tus apellidos</span><span class="text-danger"></span></label>
                         <input type="text" class="form-control" value="<?php echo $_SESSION['primer_apellido'], $_SESSION['segundo_apellido'] ?>" readonly>
                    </div>


                    <div class="form group">
                         <label class="col-lg-6 control-label"><span class="text-title">fecha de reserva</span><span class="text-danger">*</span></label>
                         <input type="date" name="fecha" value="09/12/2020" class="form-control">
                    </div>

                    <div class="form group">
                         <label class="hinicio col-lg-6 control-label"><span class="text-title">hora inicio</span><span class="text-danger">*</span></label>
                         <input type="time" name="Hinicio" value="8:55 am" class="horin form-control">
                    </div>

                    <div class="form group">
                         <label class="col-lg-6 control-label"><span class="text-title">hora final</span><span class="text-danger">*</span></label>
                         <input type="time" name="Hfinal"value="9:55 am"  class="hfinal form-control">
                    </div>

                    <div class="form group">
                         <label class="col-lg-6 control-label"><span class="text-title">Modulo</span><span class="text-danger"></span></label>
                         <input type="text" id="modulo" name="modulo" class="form-control" readonly >
                    </div>

                    <!--<div class="form group">
                         <input type="submit" class="btn-primary" value="Elejir Modulo">
                         <span>Modulo: </span>
                    </div>-->
               </div>
               <input type="submit" class="btn-primary" value="Reservar">

          </form>
     </div>

     <div class="overlay-modules">
          <div class="popup">
               <div class="radio-modulo">
                    <h1>Modulos</h1>
                    <?php
                    include "php/conexion.php";
                    $Consulta_modulos = mysqli_query($conexion, "SELECT * FROM modulos");
                    while ($row = mysqli_fetch_array($Consulta_modulos)) { ?>
                         <?php
                         $Consulta_reservas = mysqli_query($conexion, "SELECT * FROM reservas WHERE cod_modulo_fk=$row[cod_modulo]");
                         $datos = $Consulta_reservas->fetch_assoc();
                         if ($datos > 0 && $datos['estado'] == "ocupado") { ?>
                              <input type="radio" name="modulo" disabled>
                              <span class="is-valid"><?php echo "modulo", $row['cod_modulo'] ?></span>
                              <label><span class="fas fa-check-circle"></span><span>ocupado</span></label>
                         <?php
                         } else { ?>

                              <span class="is-valid"><?php echo "modulo ", $row['cod_modulo'] ?>
                                   <input type="radio" class="modul" value="<?php echo $row['cod_modulo'] ?>">
                              </span>
                              <label><span class="fas fa-check-circle"></span><span>Disponible</span></label>
                         <?php
                         } ?>
                    <?php
                    }
                    ?>


               </div>
               <input type="submit" class="btn-primary" id="select-modulo" value="Elejir" disabled>
          </div>

     </div>
     <script src="js/Funciones.js"></script>
     <script src="librerias/sweetalert2.all.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</body>

</html>
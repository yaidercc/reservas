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
          <form action="#" method="POST">
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
                         <input type="time" name="Hfinal" value="9:55 am" class="hfinal form-control">
                    </div>

                    <div class="form group">
                         <label class="col-lg-6 control-label"><span class="text-title">Modulo</span><span class="text-danger"></span></label>
                         <input type="text" id="modulo" name="modulo" class="form-control" readonly>
                    </div>

                    <!--<div class="form group">
                         <input type="submit" class="btn-primary" value="Elejir Modulo">
                         <span>Modulo: </span>
                    </div>-->
               </div>
               <input type="button" class="btn-primary" name="person" value="Reservar" id="">
               <input type="button" class="btn-primary" value="elejir" id="elejir">
          </form>
     </div>

     <div id="overlay" class="overlay-modulos ">
          <div class="popup " id="popup">
               <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"> <i class="fas fa-times"></i></a>
               <h1>modulos disponibles</h1>
               <form action="#" id="buscar-modulos">
                    <div class="header">
                         <div class="form-group">
                              <label class="col-lg-6 control-label"><span class="text-title">fecha de reserva</span><span class="text-danger">*</span></label>
                              <input type="date" name="fecha" value="09/12/2020" class="fecha form-control" required>
                         </div>
                         <div class="form-group">
                              <label class="hinicio col-lg-6 control-label"><span class="text-title">hora inicio</span><span class="text-danger">*</span></label>
                              <input type="time" id="hora_in" name="Hinicio" class="horin form-control" required>
                         </div>

                         <div class="form-group">
                              <label class="col-lg-6 control-label"><span class="text-title">hora final</span><span class="text-danger">*</span></label>
                              <input type="time" id="hora_fin" name="Hfinal" class="hfinal form-control" required>
                         </div>
                         <div class="form-group">
                              <label class="col-lg-6 control-label"><span class="text-title">Modulo</span><span class="text-danger"></span></label>
                              <input type="text" id="num_modulo" name="modulo" class="form-control">
                         </div>
                         <a href="#" id="select-modulo">elejir</a>



                    </div>
                    <input type="submit" value="aceptar" id="aceptar" class="btn-primary" disabled>
                    <div class="container">
                         <!--CARGAN LOS MODULOS-->
                    </div>
               </form>



          </div>

     </div>
     <script src="js/jquery-v1.min.js"></script>
     <script src="js/Funciones.js"></script>
     <script src="librerias/sweetalert2.all.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</body>

</html>
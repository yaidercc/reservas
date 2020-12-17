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

                    <a href="#">
                         <ion-icon name="calendar"></ion-icon><span>mis reservas</span>
                    </a>
                    <a href="php/logout.php" id="salir">
                         <ion-icon name="power"></ion-icon><span>salir</span>
                    </a>
               </div>
          </nav>
     </header>
     <div class="form-container">
          <form action="#" id="form-reservar">
               <h1>Reservar</h1>
               <div class="container-inputs">
                    <div class="form-group">
                         <label class="col-lg-6 control-label"><span class="text-title">tus nombres</span><span class="text-danger"></span></label>
                         <input type="text" class="form-control" value="<?php echo $_SESSION['primer_nombre'], $_SESSION['segundo_nombre'] ?>" readonly>
                    </div>
                    <div class="form-group">
                         <label class="col-lg-6 control-label"><span class="text-title">tus apellidos</span><span class="text-danger"></span></label>
                         <input type="text" class="name form-control" value="<?php echo $_SESSION['primer_apellido'], $_SESSION['segundo_apellido'] ?>" readonly>
                    </div>


                    <div class="form group">
                         <label class="col-lg-6 control-label"><span class="text-title">fecha de reserva</span><span class="text-danger">*</span></label>
                         <input type="date" name="fecha" value="09/12/2020" class="form-control">
                    </div>
                    <div class="horarios">

                         <div class="form group">
                              <label class="control-label"><span class="text-title">hora inicio</span><span class="text-danger">*</span></label>
                              <input type="time" name="Hinicio" value="8:55 am" class="horin horas form-control">
                         </div>

                         <div class="form group">
                              <label class="control-label"><span class="text-title">hora final</span><span class="text-danger">*</span></label>
                              <input type="time" name="Hfinal" value="" class="hfinal horas form-control">
                         </div>
                    </div>
                    <div class="modulo-grupo">
                         <input type="button" class="modulo-grp btn-primary" value="elejir modulo" id="elejir">
                         <div class="input-modulo form group">
                              <label class="col-lg-6 control-label"><span class="text-title">Modulo</span><span class="text-danger"></span></label>
                              <input type="text" id="modulo" name="modulo" class="modulo-grp form-control" readonly>
                         </div>
                    </div>


                    <!--<div class="form group">
                         <input type="submit" class="btn-primary" value="Elejir Modulo">
                         <span>Modulo: </span>
                    </div>-->
               </div>
               <input type="button" class="btn-primary" name="person" value="Reservar" id="reservar">

          </form>
     </div>

     <div id="overlay" class="overlay-modulos ">
          <div class="popup " id="popup">
               <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"> <i class="fas fa-times"></i></a>
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
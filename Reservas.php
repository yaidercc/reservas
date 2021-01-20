<?php
include 'php/conexion.php';
session_start();
//si no a iniciado sesion se le redirige al login
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

     <!-- Librerias boostrap -->
     <script src="librerias/bootstrap.bundle.min.js"></script>
     <link rel="stylesheet" href="librerias/bootstrap.min.css" >

     <!--Libreria de iconos fontawesome-->
     <script src="https://kit.fontawesome.com/2efdabf6ca.js" crossorigin="anonymous"></script>

     <!--resetear estilos predeterminados de la pagina-->
     <link rel="stylesheet" href="Css/normalice.css" crossorigin="anonymous">

     <!--estilos-->
     <link rel="stylesheet" href="Css/Estilos.css" crossorigin="anonymous">

     <!--librerias de iconos ionicons-->
     <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
     <title>Reservar</title>
</head>

<body>
     <header>
          <!--MENU DE NAVEGACION-->
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
                    <a href="#" class="miga">
                         <ion-icon name="calendar"></ion-icon><span>reservar</span>
                    </a>
                    <?php
                         //si el usuario es administrador se le asigna un nuevo item al menu de navegacion
                         if ($_SESSION['tipo_usuario'] == 1) {
                              echo "<a href='reportes.php?opc=10'>
                                   <ion-icon name='receipt'></ion-icon><span>reportes</span>
                              </a>";
                              echo "<a href='gestion_usuarios.php'>
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
     
     <!--boton de vista de oficinas-->
     <div class="container-imagen">
          <a href="#" class="mapa-modulos" id="abrir-mapa">ver mapa de oficinas</a>
     </div>
     <!--FORMULARIO DE RESERVAS-->
     <div class="form-container">
          <form action="#" id="form-reservar">
               <h1>Registrar usuario</h1>
               <div class="container-inputs">
                    <div class="form-group">
                         <label class="col-lg-6 control-label"><span class="text-title">tus nombres</span><span class="text-danger"></span></label>
                         <input type="text" class="form-control" value="<?php echo  $_SESSION['Nombres'] ?>" readonly>
                    </div>
                    <div class="form-group">
                         <label class="col-lg-6 control-label"><span class="text-title">tus apellidos</span><span class="text-danger"></span></label>
                         <input type="text" class="name form-control" value="<?php echo $_SESSION['Apellios'] ?>" readonly>
                    </div>


                    <div class="form group">
                         <label class="col-lg-6 control-label"><span class="text-title">fecha de reserva</span><span class="text-danger">*</span></label>
                         <input type="date" name="fecha" value="09/12/2020" class="fecha-fin form-control" readonly>
                    </div>
                    <div class="horarios">

                         <div class="form group">
                              <label class="control-label"><span class="text-title">hora inicio</span><span class="text-danger">*</span></label>
                              <input type="time" name="Hinicio" value="8:55 am" class="horin horas form-control" readonly>
                         </div>

                         <div class="form group">
                              <label class="control-label"><span class="text-title">hora final</span><span class="text-danger">*</span></label>
                              <input type="time" name="Hfinal" value="" class="hfinal horas form-control" readonly>
                         </div>
                    </div>
                    <div class="modulo-grupo">
                         <input type="button" class="modulo-grp btn-primary" value="elejir modulo" id="elejir">
                         <div class="form group">
                              <label class="col-lg-6 control-label"><span class="text-title">Modulo</span><span class="text-danger"></span></label>
                              <input type="text" id="modulo" name="modulo" class="modulo-grp form-control" readonly>
                         </div>
                    </div>
               </div>
               <input type="submit" class="btn-primary" name="person" value="Reservar" id="reservar" disabled>

          </form>
     </div>
     <!--popup para ver el mapa de oficinas-->
     <div id="overlay-img" class="overlay modulos ">
          <div class="popup imagenes" id="popup-img">
               <a href="#" id="btn-cerrar-popup-img" class="btn-cerrar-popup"> <i class="fas fa-times"></i></a>
               <div class="contenedor-mapa">
                    <img class="arriba" src="img/mapota.png">

               </div>

          </div>
     </div>

     <!--popup mostrar modulos-->
     <div id="overlay" class="overlay modulos ">
          <div class="popup " id="popup">
               <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"> <i class="fas fa-times"></i></a>
               <div id="buscar-modulos">
                    <div class="header">
                         <div class="form-group">
                              <label class=" control-label"><span class="text-title">fecha de reserva</span><span class="text-danger">*</span></label>
                              <input type="date" name="fecha" value="" class="fecha form-control" required>
                         </div>
                         <div class="form-group">
                              <label class="hiniciocontrol-label"><span class="text-title">hora inicio</span><span class="text-danger">*</span></label>
                              <input type="time" id="hora_in" name="Hinicio" class="hora Horin form-control" required>
                         </div>

                         <div class="form-group">
                              <label class=" control-label"><span class="text-title">hora final</span><span class="text-danger">*</span></label>
                              <input type="time" id="hora_fin" name="Hfinal" class="Hfinal hora form-control" required>
                         </div>
                         <div class="form-group">
                              <label class=" control-label"><span class="text-title">Modulo</span><span class="text-danger"></span></label>
                              <input type="text" id="num_modulo" name="modulo" value="" class="form-control">
                              <input type="hidden" value="" id="cita">
                         </div>
                         <a href="#" id="select-modulo">Buscar</a>
                    </div>

                    <div class="container">
                         <!--CARGAN LOS MODULOS-->
                    </div>
                    <input type="button" value="aceptar" id="aceptar" class="btn-primary" disabled>

               </div>



          </div>-->

     </div>
     <!--libreria jquery-->
     <script src="js/jquery-v1.min.js"></script>
     <!--libreria ajax-->
     <script src="librerias/sweetalert2.all.min.js"></script>
     <!--libreria sweeetalert-->
     <script src="librerias/sweetalert.min.js"></script>
     <!--funciones javascript-->
     <script src="js/Funciones.js"></script>
</body>

</html>
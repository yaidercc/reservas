<?php
     include 'php/conexion.php';
     session_start();
     //si la sesion ya esta abierta lo redirige a la pagina de reservas
     if (isset($_SESSION['cedula'])) {
          header('Location: reservas.php');
          exit();
     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Librerias de fuentes-->
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,500;0,700;0,900;1,100;1,500;1,700;1,900&display=swap" rel="stylesheet"> 
     
   
     <!-- Libreria jquery -->
     <script src="librerias/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
       <!-- Lubreria Boostrap 4 -->
       <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <script src="bootstrap/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

     <!-- Libreria fontawesome-->
     <script src="librerias/fontawesome.js" crossorigin="anonymous"></script>

     <!--resetear estilos predeterminados-->
     <link rel="stylesheet" href="Css/normalice.css" crossorigin="anonymous">

     <!--estilos-->
     <link rel="stylesheet" href="Css/Estilos.css" crossorigin="anonymous">

     <!--libreria de iconos-->
     <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
     <title>Ingresar</title>
</head>


<body>
     <nav class="navegacion-login">
          <ul>
               <img id="logo-air" src="img/logo_airplan.png">
          </ul>
     </nav>
     <!--contenedor general de la pagina-->
     <div class="container-login">
          <!--formulario login-->
          <form action="#" id="form-login">
               <h1>iniciar sesión</h1>
               <div class="form-group">
                    <label class="control-label"><span class="text-title">ingrese su documento</span><span></label>
                    <input type="number" name="cedula" placeholder="cedula" class="form-control" required>
               </div>
               <input type="submit" id="mostrar" class="btn-login btn-primary" value="Ingresar">
          </form>

     </div>
     
     <!--Libreria sweetalert-->
     <script src="librerias/sweetalert.min.js"></script>

     <!--Libreria Ajax/jquery-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     
     <!--funciones javascript-->
     <script src="js/Funciones.js"></script>
</body>

</html>
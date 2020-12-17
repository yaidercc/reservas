<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,500;0,700;0,900;1,100;1,500;1,700;1,900&display=swap" rel="stylesheet"> <!-- CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <!-- jQuery and JS bundle w/ Popper.js -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
     <script src="https://kit.fontawesome.com/2efdabf6ca.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="Css/normalice.css" crossorigin="anonymous">
     <link rel="stylesheet" href="Css/Estilos.css" crossorigin="anonymous">
     <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
     <title>Ingresar</title>
</head>

<body>
     <nav class="navegacion-login">
          <ul>
               <img id="logo-air" src="img/logo_airplan.png">
          </ul>
     </nav>
     <div class="container-login">
          <form action="#" id="form-login">
               <h1>iniciar sesión</h1>
               <div class="form-group">
                    <label class="control-label"><span class="text-title">ingrese su documento</span><span></label>
                    <input type="number" name="cedula" placeholder="cedula" class="form-control" required>
               </div>
               <input type="submit" id="mostrar" class="btn-login btn-primary" value="Ingresar">
          </form>

     </div>
     <script src="js/Funciones.js"></script>
     <script src="librerias/sweetalert.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</body>

</html>
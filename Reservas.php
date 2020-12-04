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
     <script src="js/Funciones.js"></script>
     <title>Reservar</title>
</head>

<body>
     <div class="section-1 container-login">
          <form action="">
               <h1>iniciar sesion</h1>
               <div class="form-group">
                    <label class="col-lg-6 control-label">Ingrese su numero de documento</label>
                    <input type="text" placeholder="cedula" class="form-control">
               </div>
               <input type="submit" class="btn-primary" value="Ingresar">
          </form>
     </div>
     <div class="section-2 form-container">
          <form action="php/ingresar.php">
               <h1>Reservar</h1>
               <div class="container-inputs">
                    <div class="form-group">
                         <label class="col-lg-6 control-label"><span class="text-title">tus nombres</span><span class="text-danger"></span></label>
                         <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                         <label class="col-lg-6 control-label"><span class="text-title">tus apellidos</span><span class="text-danger"></span></label>
                         <input type="text" class="form-control">
                    </div>

                    <div class="form group">
                         <label class="col-lg-6 control-label"><span class="text-title">tus apellidos</span><span class="text-danger"></span></label>
                         <input type="text" class="form-control">
                    </div>

                    <div class="form group">
                         <label class="col-lg-6 control-label"><span class="text-title">fecha de reserva</span><span class="text-danger">*</span></label>
                         <input type="date" class="form-control">
                    </div>

                    <div class="form group">
                         <label class="col-lg-6 control-label"><span class="text-title">hora inicio</span><span class="text-danger">*</span></label>
                         <input type="time" class="form-control">
                    </div>

                    <div class="form group">
                         <label class="col-lg-6 control-label"><span class="text-title">hora final</span><span class="text-danger">*</span></label>
                         <input type="time" class="form-control">
                    </div>

                    <div class="form group">
                         <input type="submit" class="btn-primary" value="Elejir Modulo">
                         <span>Modulo: </span>
                    </div>
               </div>
               <input type="submit" class="btn-primary" value="Reservar">

          </form>
     </div>

     <div class="overlay-modules">
          <div class="popup">
               <div class="radio-modulo">
                    <h1>Modulos</h1>
                    <input type="radio">
                    <span class="is-valid">Modulo 30<span>
                              <label><span class="fas fa-check-circle"></span><span>Disponible</span></label>
               </div>
               <input type="submit" class="btn-primary" value="Elejir">
          </div>

     </div>

</body>

</html>
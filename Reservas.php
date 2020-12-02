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

     <link rel="stylesheet" href="Css/normalice.css" crossorigin="anonymous">
     <link rel="stylesheet" href="Css/Estilos.css" crossorigin="anonymous">

     <title>Reservar</title>
</head>

<body>
     <div class="container">
          <div class="container-formulario">
               <form action="" class="formulario">
                    <div class="inicio">
                         <h1>Reservar</h1>
                         <div class="inputs">
                              <label >Buscar Su documento de identidad</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ingrese cedula" required>
                              <span></span>
                         </div>
                    </div>
                    <div class="centrales">
                         <div class="columa-izquierda">
                              <div class="inputs">
                                   <label for="exampleInputEmail1">Nombres</label>
                                   <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Su nombre" readonly>
                              </div>
                              <div class="inputs">
                                   <label for="exampleInputEmail1">fecha de reserva</label>
                                   <input type="date" class="form-control" id="exampleInputEmail1" placeholder="fecha" required>
                              </div>
                              <input type="submit" class="btn btn-primary" value="Ver modulos">
                              <span>Modulo: </span>
                         </div>
                         <div class="columna-derecha">
                              <div class="inputs">
                                   <label for="exampleInputEmail1">Apellidos</label>
                                   <input type="text" class="form-control" id="exampleInputEmail1" placeholder="su apellido" readonly>
                              </div>
                              <div class="Horarios">
                                   <div class="inputs">
                                        <label for="exampleInputEmail1">Hora de Inicio</label>
                                        <input type="time" class="hinicio form-control" id="exampleInputEmail1" placeholder="9:00 am" required>
                                   </div>
                                   <div class="inputs">
                                        <label for="exampleInputEmail1">Hora final</label>
                                        <input type="time" class="fin form-control" id="exampleInputEmail1" placeholder="16:00 pm" required>
                                   </div>
                              </div>
                              
                         </div>
                    </div>
                    <div class="btn-reserva">
                         <input type="submit" class="btn btn-primary" value="Reservar">
                    </div>
               </form>
          </div>
     </div>
     <form>
</body>

</html>
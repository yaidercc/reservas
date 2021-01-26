<?php
     include "conexion.php";
     session_start();
     //variables de los campos
     $modulo=$_POST['modulo'];
     $fecha=$_POST['fecha'];
     $inicio=$_POST['Hinicio'];
     $final=$_POST['Hfinal'];

     //consulta
     $reservar=mysqli_query($conexion,"INSERT INTO `reservas`(`cod_modulo_fk`, `id_fk`, `fecha_reserva`, `hora_inicio`, `hora_final`) VALUES ($modulo, $_SESSION[Id] ,'$fecha','$inicio','$final')");
     //validacion
     if($reservar){
          //transeferncia de datos a javascript
          echo json_encode(array("validacion"=>true));
     }else{
          //transeferncia de datos a javascript
          echo json_encode("hubo un error al reservar");
     }

?>
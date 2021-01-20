<?php
     include "conexion.php";
     session_start();
     $modulo=$_POST['modulo'];
     $fecha=$_POST['fecha'];
     $inicio=$_POST['Hinicio'];
     $final=$_POST['Hfinal'];
     $reservar=mysqli_query($conexion,"INSERT INTO `reservas`(`cod_modulo_fk`, `id_fk`, `fecha_reserva`, `hora_inicio`, `hora_final`) VALUES ($modulo, $_SESSION[Id] ,'$fecha','$inicio','$final')");
     if($reservar){
          echo json_encode(array("validacion"=>true));
     }else{
          echo json_encode("hubo un error al reservar");
     }


     /*propiedad num_rows, para contar el numero de columnas que hay en la bd*/
?>
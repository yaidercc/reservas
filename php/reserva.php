<?php
     include "conexion.php";
     session_start();
     $modulo=$_POST['modulo'];
     $fecha=$_POST['fecha'];
     $inicio=$_POST['Hinicio'];
     $final=$_POST['Hfinal'];

     $reservar=mysqli_query($conexion,"INSERT INTO `reservas`(`cod_modulo_fk`, `cedula_fk`, `fecha_reserva`, `hora_inicio`, `hora_final`) VALUES ($modulo, $_SESSION[cedula],'$fecha','$inicio','$final')");
    /*$Buscar_Modulos=mysqli_query($conexion,"SELECT * FROM reservas WHERE cod_modulo_fk=$modulo AND fecha_reserva='$fecha' ORDER BY hora_inicio ASC"); 
     
     $verificar=false;
    
     while($row=mysqli_fetch_array($Buscar_Modulos)){
          if(mysqli_num_rows($Buscar_Modulos)>0){
               if($inicio<$row['hora_inicio'] && $final<$row['hora_inicio'] || $inicio>$row['hora_final']){
                    $verificar=true;
               }else{
                    $verificar=false;
                    //llenar array con las horas en las que el modulo esta ocupado
                   $array = array(
                         "hinicio"=>$row['hora_inicio'],
                         "hfin"=>$row['hora_final']
                    );
               }
               
          }
          
     }*/
     if($reservar){
          echo json_encode(array("validacion"=>true));
     }else{
          echo "error";
     }


     /*propiedad num_rows, para contar el numero de columnas que hay en la bd*/
?>
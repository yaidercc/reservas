<?php

/**¿use function PHPSTORM_META\type;*/

include "conexion.php";
     session_start();
     $modulo=$_POST['modulo'];
     $fecha=$_POST['fecha'];
     $cedula=$_GET['cedula'];
     $inicio=$_POST['Hinicio'];
     $final=$_POST['Hfinal'];
     $cont=0;
     $Buscar_Modulos=mysqli_query($conexion,"SELECT * FROM 
                                             reservas WHERE cod_modulo_fk=$modulo
                                             AND fecha_reserva='$fecha' ORDER BY hora_inicio ASC"); 
     $verificar=false;
    while($row=mysqli_fetch_array($Buscar_Modulos)){
          $rows = $Buscar_Modulos->num_rows;
          if(mysqli_num_rows($Buscar_Modulos)>0){
               echo $row['cod_reserva'];
               if($inicio<$row['hora_inicio'] && $final<$row['hora_inicio'] || $inicio>$row['hora_final']){
                    $verificar=true;
               }else{
                    $verificar=false;
               break;
               }
              
               
          }
        
     }

     if($verificar){
          echo "dio";
     }else{
          echo "no eño";
     }

     /*propiedad num_rows, para contar el numero de columnas que hay en la bd*/
?>
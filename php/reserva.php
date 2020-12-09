<?php
     include "conexion.php";
     $modulo=$_POST['modulo'];
     $fecha=$_POST['fecha'];
     $inicio=$_POST['Hinicio'];
     $final=$_POST['Hfinal'];

     $Buscar_Modulos=mysqli_query($conexion,"SELECT * FROM reservas WHERE cod_modulo_fk=$modulo AND fecha_reserva='$fecha' ORDER BY hora_inicio ASC"); 
     
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
          
     }
     if($verificar){
          echo json_encode($verificar);
     }else{
          echo json_encode(array("hola"=>"nada"));
     }


     /*propiedad num_rows, para contar el numero de columnas que hay en la bd*/
?>
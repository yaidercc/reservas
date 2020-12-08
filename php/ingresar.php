<?php
     include "conexion.php";
     sleep(1);
     $_SESSION['activo'] = false;
     switch($_GET['case']){
          case "login":
               session_start();
               $cedula= $_POST['cedula'];
               $ingresar=mysqli_query($conexion,"SELECT * FROM `empleados` WHERE cedula=$cedula");
               $datos=$ingresar->fetch_assoc();
               $_SESSION['activo'] = true;
               $_SESSION['cedula'] = $datos['cedula'];
               $_SESSION['primer_nombre'] = $datos['primer_nombre'];
               $_SESSION['segundo_nombre'] = $datos['segundo_nombre'];
               $_SESSION['primer_apellido'] = $datos['primer_apellido'];
               $_SESSION['segundo_apellido'] = $datos['segundo_apellido'];
               if($datos>0){
                    echo json_encode(array('respuesta' =>true ,'nombre' =>$datos['primer_nombre']));
 
               }else{
                    echo json_encode(array('respuesta' =>false));//manda datos al archivo
               }
          break;
          case "verificar":
               echo json_encode(array('respuesta' =>true ,'verificacion' => $_SESSION['activo']));
          break;
     }
    
?>
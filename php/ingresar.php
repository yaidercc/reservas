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
               if($datos>0){
                    echo json_encode(array('respuesta' =>true ,'nombre' =>$datos['primer_nombre'], 'verificacion' =>$_SESSION['activo']));
                    
               }else{
                    echo json_encode(array('respuesta' =>false));//manda datos al archivo
               }
          break;
          case "verificar":
               echo json_encode(array('respuesta' =>true ,'verificacion' => $_SESSION['activo']));
          break;
     }
    
?>
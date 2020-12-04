<?php
     include "conexion.php";
     session_start();
     $cedula= $_POST['cedula'];
     $ingresar=mysqli_query($conexion,"SELECT * FROM `empleados` WHERE cedula=$cedula");
     $datos=$ingresar->fetch_assoc();
     if($datos>0){
          echo json_encode(array('respuesta' =>true ,'nombre' =>$datos['primer_nombre']));
     }else{
          echo json_encode(array('respuesta' =>false));//manda datos al archivo
     }
?>
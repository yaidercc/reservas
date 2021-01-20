<?php
     include "conexion.php";
     sleep(1);
     $_SESSION['activo'] = false;
     session_start();
     $cedula = $_POST['cedula'];
     $ingresar = mysqli_query($conexion, "SELECT * FROM `empleados` WHERE cedula=$cedula");
     $datos = $ingresar->fetch_assoc();

     if ($datos > 0) {// usuario encontrado
          echo json_encode(array('respuesta' => true, 'tipo' => $datos['cod_tipo_fk']));
          $_SESSION['activo'] = true;
          $_SESSION['Id'] = $datos['Id'];
          $_SESSION['cedula'] = $datos['cedula'];
          $_SESSION['Nombres'] = $datos['Nombres'];
          $_SESSION['Apellios'] = $datos['Apellidos'];
          $_SESSION['tipo_usuario'] = $datos['cod_tipo_fk'];
     } else {
          echo json_encode(array('respuesta' => false)); //no se encontro el usuario
     }
?>
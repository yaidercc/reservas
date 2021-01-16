<?php
     include "conexion.php";
     sleep(1);
     $_SESSION['activo'] = false;
     session_start();
     $cedula = $_POST['cedula'];
     $ingresar = mysqli_query($conexion, "SELECT * FROM `empleados` WHERE cedula=$cedula");
     $datos = $ingresar->fetch_assoc();
     $_SESSION['activo'] = true;
     $_SESSION['Id'] = $datos['Id'];
     $_SESSION['cedula'] = $datos['cedula'];
     $_SESSION['Nombres'] = $datos['Nombres'];
     $_SESSION['Apellios'] = $datos['Apellidos'];
     $_SESSION['tipo_usuario'] = $datos['cod_tipo_fk'];
     if ($datos > 0) {
          if ($datos['cod_tipo_fk'] == 1) {
               $enlace = "<a href='#'>hola</a>";
          }
          echo json_encode(array('respuesta' => true, 'tipo' => $datos['cod_tipo_fk']));
          $_SESSION['cedula'] = $cedula;
     } else {
          echo json_encode(array('respuesta' => false)); //manda datos al archivo
     }
     
?>

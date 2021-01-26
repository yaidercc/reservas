<?php
     include "conexion.php";
     //retrasar consulta 1 segundo
     sleep(1);
     //iniciaar sesion
     session_start();
     //variables de los campos
     $cedula = $_POST['cedula'];

     //consulta
     $ingresar = mysqli_query($conexion, "SELECT * FROM `empleados` WHERE cedula=$cedula");
     $datos = $ingresar->fetch_assoc();

     if ($datos > 0) {// usuario encontrado

          //transeferencia de datos a javascript
          echo json_encode(array('respuesta' => true, 'tipo' => $datos['cod_tipo_fk']));

          //creacion de variables de session
          $_SESSION['Id'] = $datos['Id'];
          $_SESSION['cedula'] = $datos['cedula'];
          $_SESSION['Nombres'] = $datos['Nombres'];
          $_SESSION['Apellios'] = $datos['Apellidos'];
          $_SESSION['tipo_usuario'] = $datos['cod_tipo_fk'];
     } else {
           //transeferencia de datos a javascript
          echo json_encode(array('respuesta' => false)); //no se encontro el usuario
     }
?>
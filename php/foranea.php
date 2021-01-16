<?php
     include "conexion.php";

     $cargos = mysqli_query($conexion, "SELECT * FROM `cargos`");
     $empleados = mysqli_query($conexion, "SELECT cargo FROM `empleados`");
     $cont = 0;
     $array_empleados=mysqli_fetch_assoc($empleados);
     while ($array_cargos = mysqli_fetch_assoc($cargos)) {
          $actualizar=mysqli_query($conexion,"UPDATE `empleados` SET `id_cargo_fk`=$array_cargos[ID] WHERE `cargo`='$array_cargos[NOMBRE_CARGO]'");
     }
     echo mysqli_num_rows($empleados);
?>

<?php

include "conexion.php";

$Buscar_Modulos = "";
$sw = 0;
$verificador = true;
/////////////// CONSULTA POR DEFECTO ///////////////////////////



///////////////// SI EL CAMPO MODULO ESTA DEFINIDO ////////////////////////
if (empty($_POST['modulo'])) {
     $Buscar_Modulos = "SELECT * FROM reservas WHERE fecha_reserva='$_POST[fecha]'";
} else {
     $Buscar_Modulos = "SELECT * FROM reservas WHERE fecha_reserva='$_POST[fecha]' AND cod_modulo_fk=$_POST[modulo] ORDER BY `hora_inicio` ASC";
     $sw = 1;
}

////////////////// EJECUTA LA CONSULTA //////////////////////
$query = mysqli_query($conexion, $Buscar_Modulos);

/////////////// VALIDA CANTIDAD DE DATOS TRAIDOS ///////////////
if (mysqli_num_rows($query) > 0) {
     $verificar = "";
     while ($row = mysqli_fetch_assoc($query)) {
          ////////// VERIFICA QUE LOS CAMPOS HORA INICIO Y HORA FINAL TENGAN DATOS ////////////////
          /////////////////////// COMPARA LA HORA DEL FORMULARIO CON LA HORA DE LA BD ///////////////////
          if ($_POST['hinicio'] < $row['hora_inicio'] && $_POST['hfinal'] < $row['hora_inicio'] || $_POST['hinicio'] > $row['hora_final'] && $verificador) {
               if ($sw == 1) {
                    if ($verificador) {
                         $verificar = "<div class='modulo'>
                         <input type='radio' name='modulo' class='radio-modulo disponible' value='$row[cod_modulo_fk]' >
                         <h1>Modulo $row[cod_modulo_fk]</h1>
                         <p><i class='fas fa-check-circle'></i><span>disponible</span></p>
                    </div>";
                    }
               } else {
                    $verificar .= "<div class='modulo'>
                         <input type='radio' name='modulo' class='radio-modulo disponible' value='$row[cod_modulo_fk]' >
                         <h1>Modulo $row[cod_modulo_fk]</h1>
                         <p><i class='fas fa-check-circle'></i><span>disponible</span></p>
                    </div>";
               }
          } else {
               if ($sw == 1) {
                    $verificador = false;
                    $verificar = "<div class='modulo'>
                    <input type='radio' name='modulo' class='radio-modulo disponible' value='$row[cod_modulo_fk]' >
                    <h1>Modulo $row[cod_modulo_fk]</h1>
                    <p><i class='fas fa-check-circle'></i><span>no disosiponible</span></p>
               </div>";
               }
          }
     }
} else {
     $Buscar_Modulos = mysqli_query($conexion, "SELECT * FROM modulos");
     $verificar = "";
     if($sw==1){
          $Buscar_Modulos = mysqli_query($conexion, "SELECT * FROM modulos WHERE cod_modulo=$_POST[modulo]");
     }
     while ($row = mysqli_fetch_assoc($Buscar_Modulos)) {
          $verificar .= "<div class='modulo'>
                              <input type='radio' name='modulo' class='radio-modulo disponible' value='$row[cod_modulo]' >
                              <h1>Modulo $row[cod_modulo]</h1>
                              <p><i class='fas fa-check-circle'></i><span>disponible</span></p>
                         </div>";
     }
}

echo $verificar==""?"no hay modulos disponibles en este horario":$verificar;

?>

<?php

include "conexion.php";
$Buscar_Modulos = "";
/////////////// CONSULTA POR DEFECTO ///////////////////////////

$Buscar_Modulos = "SELECT * FROM reservas WHERE fecha_reserva='$_POST[fecha]'";

///////////////// SI EL CAMPO MODULO ESTA DEFINIDO ////////////////////////
if (!empty($_POST['modulo'])) {
     $Buscar_Modulos = "SELECT * FROM reservas WHERE fecha_reserva='$_POST[fecha]' AND cod_modulo_fk=$_POST[modulo]";
}

////////////////// EJECUTA LA CONSULTA //////////////////////
$query = mysqli_query($conexion, $Buscar_Modulos);

/////////////// VALIDA CANTIDAD DE DATOS TRAIDOS ///////////////
if (mysqli_num_rows($query) > 0) {
     $verificar = "";
    
     while ($row = mysqli_fetch_assoc($query)) {
          ////////// VERIFICA QUE LOS CAMPOS HORA INICIO Y HORA FINAL TENGAN DATOS ////////////////
          if (!empty($_POST['hinicio']) and !empty($_POST['hfinal'])) {
               /////////////////////// COMPARA LA HORA DEL FORMULARIO CON LA HORA DE LA BD ///////////////////
               if ($_POST['hinicio'] < $row['hora_inicio'] && $_POST['hfinal'] < $row['hora_inicio'] ) {
                    $verificar .= "<div class='modulo'>
                                   <input type='radio' name='modulo' class='radio-modulo disponible' value='$row[cod_modulo_fk]' >
                                   <h1>Modulo $row[cod_modulo_fk]</h1>
                                   <h2>Modulo $row[cod_reserva]</h2>
                                   <p><i class='fas fa-check'></i><span>disosponible</span></p>
                              </div>";
                              
               }else{
                    $verificar .= "<div class='modulo'>
                    <input type='radio' name='modulo' class='radio-modulo disponible' value='$row[cod_modulo_fk]' disabled>
                    <h1>Modulo $row[cod_modulo_fk]</h1>
                    <h2>Modulo $row[cod_reserva]</h2>
                    <p><ion-icon name='ban'></ion-icon><span>no disponible</span></p>
               </div>";
               }
          } else {
               $verificar .= "<div class='modulo'>
               <input type='radio' name='modulo' class='radio-modulo no-disponible' value='$row[cod_modulo_fk]'>
               <h1>Modulo $row[cod_modulo_fk]</h1>
               <h2>Modulo $row[cod_reserva]</h2>
               <p><i class='fas fa-check'></i><span>llego aqui</span></p>
          </div>";
          }
     }
} else {
     $Buscar_Modulos = mysqli_query($conexion, "SELECT * FROM modulos ");
     $verificar = "";
     while ($row = mysqli_fetch_assoc($Buscar_Modulos)) {
          $verificar .= "<div class='modulo'>
                              <input type='radio' name='modulo' class='radio-modulo disponible' value='$row[cod_modulo]' >
                              <h1>Modulo $row[cod_modulo]</h1>
                              <p><i class='fas fa-check'></i><span>dissponible</span></p>
                         </div>";
     }
}

echo $verificar;



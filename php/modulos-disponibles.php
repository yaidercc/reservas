
<?php

include "conexion.php";

$Buscar_Modulos = "";
////////////// VERIFICAR QUE CONSULTA SE EJECUTO ////////////////
$consulta = 0;
/////////////// SI SE ESPECIFICA UN MODULO, VERIFICA SI ESTA DISPONIBLE //////////
$verificador = true;
/////////////// EVITAR QUE UN MODULO SE RESERVE 2 VECES EN EL MISMO HORARIO /////////////
$validarHorario = -1;
/////////////// EVITAR QUE TRAIGA MODULOS REPETIDOS ////////////////
$noRepetir = -1;
/////////////// CONSULTA POR DEFECTO ///////////////////////////
$EtiquetaModulos = "";

///////////////// VERIFICA SI EL CAMPO MODULO ESTA VACIO ////////////////////////
if (empty($_POST['modulo'])) {
     $Buscar_Modulos = "SELECT * FROM reservas WHERE fecha_reserva='$_POST[fecha]' ORDER BY cod_modulo_fk, hora_inicio asc ";
} else {
     $Buscar_Modulos = "SELECT * FROM reservas WHERE fecha_reserva='$_POST[fecha]' AND cod_modulo_fk=$_POST[modulo] ORDER BY `hora_inicio` ASC";
     $consulta = 1;
}

//// EJECUTA LA CONSULTA
$query = mysqli_query($conexion, $Buscar_Modulos);

/////////////// VALIDA CANTIDAD DE DATOS ENCONTRADOS ///////////////
if (mysqli_num_rows($query) > 0) {
     
     while ($row = mysqli_fetch_assoc($query)) {
          /////////////////////// COMPARA LA HORA DEL FORMULARIO CON LA HORA DE LA BD ///////////////////
          if ($_POST['hinicio'] < $row['hora_inicio'] && $_POST['hfinal'] < $row['hora_inicio'] || $_POST['hinicio'] > $row['hora_final']) {
               //// CONDICION QUE AYUDA A EVITAR QUE UN MODULO SE RESERVE 2 VECES
               if ($validarHorario != $row['cod_modulo_fk']) {
                    if ($consulta == 1) {
                         if ($verificador) {
                              $EtiquetaModulos = "<div class='modulo'>
                                                  <div class='conjunto'>
                                                       <input type='radio' name='modulo' class='radio-modulo ' value='$row[cod_modulo_fk]' >
                                                       <h1>Modulo $row[cod_modulo_fk]</h1>
                                                  </div>
                                                  <p><i class='fas fa-check-circle'></i><span>disponible</span></p>
                                              </div>";
                         } else {
                              $EtiquetaModulos = "<div class='modulo no-disponible'>
                                                  <div class='conjunto'>
                                                       <input type='radio' name='modulo' class='radio-modulo ' value='$row[cod_modulo_fk]' disabled>
                                                       <h1>Modulo $row[cod_modulo_fk]</h1>
                                                  </div>
                                                  <p><i class='fas fa-check-circle'></i><span>no disponible</span></p>
                                             </div>";
                         }
                    } else {
                         if ($noRepetir != $row['cod_modulo_fk']) {
                              $EtiquetaModulos .= "<div class='modulo'>
                                                  <div class='conjunto'>
                                                       <input type='radio' name='modulo' class='radio-modulo ' value='$row[cod_modulo_fk]' >
                                                       <h1>Modulo $row[cod_modulo_fk]</h1>
                                                  </div>
                                                  <p><i class='fas fa-check-circle'></i><span>disponible</span></p>
                                             </div>";
                         }
                    }
               }
          } else {

               if ($consulta == 1) {
                    $verificador = false;
                    $EtiquetaModulos = "<div class='modulo no-disponible'>
                                        <div class='conjunto'>
                                             <input type='radio' name='modulo' class='radio-modulo ' value='$row[cod_modulo_fk]' disabled>
                                             <h1>Modulo $row[cod_modulo_fk]</h1>
                                        </div>
                                        <p><i class='fas fa-check-circle'></i><span>no disponible</span></p>
                                   </div>";
               } else {
                    $aux = $row['cod_modulo_fk'];
               }
          }
          $noRepetir = $row['cod_modulo_fk'];
     }
} else {
     /// TRAER TODO LO DE LA BD MODULOS
     $Buscar_Modulos = "SELECT * FROM modulos";
     if ($consulta == 1) {
          ///TRAE EL MODULO DE LA BD MODULOS
          $Buscar_Modulos = "SELECT * FROM modulos WHERE cod_modulo=$_POST[modulo]";
     }
     //// EJECUTA LA CONSULTA
     $query = mysqli_query($conexion, $Buscar_Modulos);
     while ($row = mysqli_fetch_assoc($query)) {
          $EtiquetaModulos .= "<div class='modulo'>
                              <div class='conjunto'>
                                   <input type='radio' name='modulo' class='radio-modulo ' value='$row[cod_modulo]' >
                                   <h1>Modulo $row[cod_modulo]</h1>
                              </div>
                              <p><i class='fas fa-check-circle'></i><span>disponible</span></p>
                         </div>";
     }
}

// EN CASO DE QUE EN LA BD RESERVAS NO HAYAN MODULOS DISPONIBLES, TRAE LOS MODULOS DE LA OTRA BD QUE NO ESTEN EN RESERVAS
if ($EtiquetaModulos == "" && $consulta == 0) {
     $buscar_noex = "SELECT * FROM modulos WHERE `cod_modulo` NOT IN (SELECT `cod_modulo_fk` FROM reservas)";
     $query = mysqli_query($conexion, $buscar_noex);
     if (mysqli_num_rows($query) > 0) {
          while ($row = mysqli_fetch_assoc($query)) {
               $EtiquetaModulos .= "<div class='modulo'>
                                   <input type='radio' name='modulo' class='radio-modulo disponible' value='$row[cod_modulo]' >
                                   <h1>Modulo $row[cod_modulo]</h1>
                                   <p><i class='fas fa-check-circle'></i><span>disponible</span></p>
                              </div>";
          }
     } else {
          $EtiquetaModulos = "no hay modulos disponibles en este horario";
     }
}

/// IMPRIME EL CONTENDO
echo $EtiquetaModulos;



?>
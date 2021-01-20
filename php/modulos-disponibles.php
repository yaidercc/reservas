<?php
include "conexion.php";
session_start();
//variable que va a contener la consulta que se va a ejecutar
$Buscar_Modulos = "";
////////////// VERIFICAR QUE CONSULTA SE EJECUTO ////////////////
$consulta = 0;
/////////////// SI SE ESPECIFICA UN MODULO, VERIFICA SI ESTA DISPONIBLE //////////
$verificador = true;
/////////////// EVITAR QUE UN MODULO SE RESERVE 2 VECES EN EL MISMO HORARIO /////////////
$validarHorario = -1;
/////////////// EVITAR QUE TRAIGA MODULOS REPETIDOS ////////////////
$noRepetir = -1;
/////////// reservas por dia
$reservasxDia = true;
/////////////// CONSULTA POR DEFECTO ///////////////////////////
$EtiquetaModulos = "";
//////////////////// si el modulo no esta disponible, almacena las citas que hay de este modulo en esta variable
$citas = "";
///////////////// VERIFICA SI EL CAMPO MODULO ESTA VACIO ////////////////////////
if (empty($_POST['modulo'])) {
     $Buscar_Modulos = "SELECT * FROM reservas WHERE fecha_reserva='$_POST[fecha]' ORDER BY cod_modulo_fk, hora_inicio asc ";
} else {
     $Buscar_Modulos = "SELECT * FROM reservas WHERE fecha_reserva='$_POST[fecha]' AND cod_modulo_fk=$_POST[modulo] ORDER BY `hora_inicio` ASC";
     $consulta = 1;
}

$Buscar_reservas = mysqli_query($conexion, "SELECT * FROM reservas WHERE fecha_reserva='$_POST[fecha]' ORDER BY cod_modulo_fk, hora_inicio asc ");
if (mysqli_num_rows($Buscar_reservas) > 0) {
     while ($row = mysqli_fetch_assoc($Buscar_reservas)) {
          if ($_SESSION['Id'] == $row['id_fk']) {
               $reservasxDia = false;
          }
     }
}

if ($reservasxDia) {
     //// EJECUTA LA CONSULTA
     $query = mysqli_query($conexion, $Buscar_Modulos);

     /////////////// VALIDA CANTIDAD DE DATOS ENCONTRADOS ///////////////
     if (mysqli_num_rows($query) > 0) {
          //variable iteradora
          $i = 0;
          // en este vector se almacenan los datos que no coinciden con el horario indicado
          $valores = [mysqli_num_rows($query)];
          while ($row = mysqli_fetch_assoc($query)) {
               /////////////////////// COMPARA LA HORA DEL FORMULARIO CON LA HORA DE LA BD ///////////////////
               if ($_POST['hinicio'] < $row['hora_inicio'] && $_POST['hfinal'] < $row['hora_inicio'] || $_POST['hinicio'] > $row['hora_final']) {
                    //// CONDICION QUE AYUDA A EVITAR QUE UN MODULO SE RESERVE 2 VECES EL MISMO DIA Y Y QUE LOS RANGOS DE HORA INTERSEDAN ENTRE SI
                    if ($validarHorario != $row['cod_modulo_fk']) {
                         //SI ESPECIFICO UN MODULO
                         if ($consulta == 1) {
                              if ($verificador) {
                                   $EtiquetaModulos = "<div class='modulo'>
                                                       <div class='conjunto'>
                                                            <input type='radio' name='modulo' class='radio-modulo ' value='$row[cod_modulo_fk]' >
                                                            <h1>Modulo $row[cod_modulo_fk]</h1>
                                                       </div>
                                                       <span  class='disponibilidad'><i class='fas fa-check-circle'></i><span>disponible</span></span>
                                                  /</div>";
                              } else {
                                   //EN CASO DE QUE ESTE MODULO TENGA UNA CITA YA RESERVADA SE ALMACENAN EN ESTA VARIABLE
                                   $citas .= "de: $row[hora_inicio] a :$row[hora_final] \n";
                              }
                         } else {
                              //SI NO ESPECIFICO UN MODULO EJECUTA ESTE CONDICIONAL Y VERIFICA QUE EL MODULO NO SE HA REPETIDO
                              if ($noRepetir != $row['cod_modulo_fk']) {
                                   $EtiquetaModulos .= "<div class='modulo'>
                                                       <div class='conjunto'>
                                                            <input type='radio' name='modulo' class='radio-modulo ' value='$row[cod_modulo_fk]' >
                                                            <h1>Modulo $row[cod_modulo_fk]</h1>
                                                       </div>
                                                       <span class='disponibilidad' ><i class='fas fa-check-circle'></i><span>disponible</span></span>
                                                  </div>";
                              }
                         }
                    }
               } else {
                    if ($consulta == 1) {
                         $verificador = false;
                         //SE EJECUTA ESTE CONDICIONAL SI SE ESPECIFICO UN MODULO Y NO ESTA DISPONIBLE EN EL HORARIO ESTABLECIDO
                         $EtiquetaModulos = "<div class='modulo no-disponible'>
                                             <div class='conjunto'>
                                                  <input type='radio' name='modulo' class='radio-modulo ' value='$row[cod_modulo_fk]' disabled>
                                                  <h1>Modulo $row[cod_modulo_fk]</h1>
                                             </div>
                                             <span  class='disponibilidad'><i class='fas fa-ban'></i>no disponible</
                                             span></span>
                                             <a href='#' class='citas'>mostrar citas</a>
                                        </div>";
                         // SI YA FUE RESERVADO MUESTRA UNA ALERTA CON LOS HORIARIOS EN LOS QUE FUE RESERVADO
                         if ($_SESSION['Id'] != $row['id_fk']) {
                              $citas .= "fue reservado de: $row[hora_inicio] a: $row[hora_final] \n";
                         } 
                    } else {
                         $aux = $row['cod_modulo_fk'];
                    }
               }
               $noRepetir = $row['cod_modulo_fk'];
               $valores[$i] = $noRepetir;
               $i++;
          }
     } else {
          /// TRAER TODOS LOS DE LA BD MODULOS
          $Buscar_Modulos = "SELECT * FROM modulos";
          if ($consulta == 1) {
               ///TRAE EL MODULO ESPECIFICADO DE LA BD MODULOS
               $Buscar_Modulos = "SELECT * FROM modulos WHERE cod_modulo=$_POST[modulo]";
          }
          /// EJECUTA LA CONSULTA QUE HALLA QUEDO EN LA VARIABLE BUSCAR_MODULOS
          $query = mysqli_query($conexion, $Buscar_Modulos);
          while ($row = mysqli_fetch_assoc($query)) {
               $EtiquetaModulos .= "<div class='modulo'>
                                   <div class='conjunto'>
                                        <input type='radio' name='modulo' class='radio-modulo ' value='$row[cod_modulo]'>
                                        <h1>Modulo $row[cod_modulo]</h1>
                                   </div>
                                   <span class='disponibilidad'><i class='fas fa-check-circle'></i><span>disponible</span></span>
                              </div>";
          }
     }
     // en caso de que encuentre elementos en la consulta anterior y esos unicos elementos no coincidieran consu horaio
     if (mysqli_num_rows($query) > 0 && $consulta == 0 && isset($valores)) {
          $Buscar_Modulos = "SELECT * FROM modulos ORDER BY cod_modulo ASC";
          $query = mysqli_query($conexion, $Buscar_Modulos);
          $noRepetir = $valores[0];
          $count = 0;
          while ($row = mysqli_fetch_assoc($query)) {
               $validarExistencia = false;
               //recorre todos los datos del vector y compara uno a uno con el dato que trae de la bd
               if ($noRepetir != $row['cod_modulo']) {
                    for ($i = 0; $i < count($valores); $i++) {
                         if ($row['cod_modulo'] != $valores[$i]) {
                              $validarExistencia = true;
                         } else {
                              // en caso de que uno de los datos del vector llegue a coincidir con uno de los que trae de la bd, este se sale de inmediato del ciclo
                              $validarExistencia = false;
                              break;
                         }
                    }
               }
               //valida si el dato si es diferente a los que hay en el vector
               if ($validarExistencia) {
                    $EtiquetaModulos .= "<div class='modulo'>
                    <div class='conjunto'>
                    <input type='radio' name='modulo' class='radio-modulo ' value='$row[cod_modulo]' >
                    <h1>Modulo $row[cod_modulo]</h1>
                    </div>
                    <span class='disponibilidad'><i class='fas fa-check-circle'></i><span>disponible</span></span>
                    </div>";
                    $count++;
               }
               $noRepetir = $row['cod_modulo'];
          }
     }
     // EN CASO DE QUE EN LA BD RESERVAS NO HAYAN MODULOS DISPONIBLES, TRAE LOS MODULOS DE LA BD MODULO QUE NO ESTEN EN RESERVAS
     if ($EtiquetaModulos == "" && $consulta == 0) {
          $buscar_noex = "SELECT * FROM modulos WHERE `cod_modulo` NOT IN (SELECT `cod_modulo_fk` FROM reservas)";
          $query = mysqli_query($conexion, $buscar_noex);
          if (mysqli_num_rows($query) > 0) {
               while ($row = mysqli_fetch_assoc($query)) {
                    $EtiquetaModulos .= "<div class='modulo'>
                                             <div class='conjunto'>
                                                  <input type='radio' name='modulo' class='radio-modulo disponible' value='$row[cod_modulo]' >
                                                  <h1>Modulo $row[cod_modulo]</h1>
                                             </div>
                                        <span  class='disponibilidad'><i class='fas fa-check-circle'></i><span>disponible</span></span>
                                   </div>";
               }
          } else {
               $EtiquetaModulos = "no hay modulos disponibles en este horario";
          }
     }


     //si se espeficia un modulo y este modulo esta ocupado, la variable citas contiene las reservas que han hecho en este modulo y guarda el modulo en la variable eiqueta con la clase de no disponible, pero si no esta ocupado o no se especifica el modulo simplemente lo almazcena en la variable etiqueta con la clase de disponible
}
if ($consulta == 1) {
     if ($EtiquetaModulos == "") {
          $EtiquetaModulos = "el modulo especificado no existe";
     }
     $array = array("etiqueta" =>  $EtiquetaModulos, "citas" => $citas, "tipo_con" => $consulta, "reservas" => $reservasxDia);
} else {
     $array = array("etiqueta" => $EtiquetaModulos, "tipo_con" => $consulta, "reservas" => $reservasxDia);
}

/// manda el contenido al archivo de javascript
echo json_encode($array);

<?php
include "conexion.php";

$modulo = $_POST['modulo'];
$fecha = $_POST['fecha'];
$inicio = $_POST['hinicio'];
$final = $_POST['hfinal'];

$Buscar_Modulos =  "SELECT * FROM reservas WHERE fechar_reserva=$fecha";

if (!empty($_POST['modulo'])) {
     $Buscar_Modulos = "SELECT * FROM reservas WHERE fecha_reserva='$_POST[fecha]' AND cod_modulo_fk=$_POST[modulo]";
}
$query = mysqli_query($conexion, $Buscar_Modulos);
/*if (mysqli_num_rows($query)>0) {
     $verificar = "";
     while ($row = mysqli_fetch_assoc($query)) {
          if (isset($inicio) and isset($final)) {
               if ($inicio < $row['hora_inicio'] && $final < $row['hora_inicio'] || $inicio > $row['hora_final']) {
                    $verificar .= "<div class='modulo'>
                                   <input type='radio' value='$row[cod_modulo_fk]'>
                                   <h1>Modulo $row[cod_modulo_fk]</h1>
                              </div>";
               } else {
                    $verificar = "sin valoer";
               }
          } else {
               $verificar .= "<div class='modulo'>
               <input type='radio' value='$row[cod_modulo_fk]'>
               <h1>Modulo $row[cod_modulo_fk]</h1>
          </div>";
          }
     }
} else {
     $verificar = "no disponible";
}*/

echo $Buscar_Modulos;

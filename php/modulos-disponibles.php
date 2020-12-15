
<?php
include "conexion.php";
$Buscar_Modulos="";
$Buscar_Modulos = "SELECT * FROM reservas WHERE fecha_reserva='$_POST[fecha]'";
if (!empty($_POST['modulo'])) {
     $Buscar_Modulos = "SELECT * FROM reservas WHERE fecha_reserva='$_POST[fecha]' AND cod_modulo_fk=$_POST[modulo]";
} 
$query = mysqli_query($conexion, $Buscar_Modulos);
if (mysqli_num_rows($query) > 0) {
     $verificar = "";
     while ($row = mysqli_fetch_assoc($query)) {
          if (!empty($_POST['hinicio']) and !empty($_POST['hfinal'])) {
               if ($_POST['hinicio'] < $row['hora_inicio'] && $_POST['hfinal'] < $row['hora_inicio'] || $_POST['hinicio'] > $row['hora_final']) {
                    $verificar .= "<div class='modulo'>
                                   <input type='radio' name='modulo' class='radio-modulo disponible' value='$row[cod_modulo_fk]' >
                                   <h1>Modulo $row[cod_modulo_fk]</h1>
                                   <p><i class='fas fa-check'></i><span>disponible</span></p>
                              </div>";
               } else {
                    $verificar .= "<div class='modulo'>
                    <input type='radio' name='modulo' value='$row[cod_modulo_fk]' disabled>
                    <h1>Modulo $row[cod_modulo_fk]</h1>
                    <p><ion-icon name='ban'></ion-icon><span>no disponible</span></p>
               </div>";
               }
          } else {
               $verificar .= "<div class='modulo'>
               <input type='radio' name='modulo' class='radio-modulo no-disponible' value='$row[cod_modulo_fk]'>
               <h1>Modulo $row[cod_modulo_fk]</h1>
               <p><i class='fas fa-check'></i><span></span></p>
          </div>";
          }
     }
} else {
     $verificar = "no disponible";
}

echo $verificar;

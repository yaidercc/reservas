<?php
include "conexion.php";
switch ($_GET['case']) {
    case 'agregar':
        $Registrar_usuario = mysqli_query($conexion, "CALL agregar_usuario($_POST[cedula],upper('$_POST[nombres]'),upper('$_POST[apellidos]'),upper('$_POST[cargo]'))");
        if ($Registrar_usuario) {
            echo json_encode(array("validacion" => true));
        } else {
            echo json_encode(array("validacion" => false));
        }
        break;
    case 'eliminar':
        $eliminar_usuarrio = mysqli_query($conexion, "CALL eliminar_usuario($_GET[id])");
        if ($eliminar_usuarrio) {
            echo json_encode(array("validacion" => true));
        } else {
            echo json_encode(array("validacion" => false));
        }
        break;

    case 'modificar':
        $modificar_usuario = mysqli_query($conexion, "CALL actualizar_usuario($_POST[cedula],upper('$_POST[nombres]'),upper('$_POST[apellidos]'),upper('$_POST[cargo]'),$_POST[id_val])");
        if ($modificar_usuario ) {
            echo json_encode(array("validacion" => true));
        } else {
            echo json_encode(array("validacion" => false));
        }
        break;
    default:
        #code...
}

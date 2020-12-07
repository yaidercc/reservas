<?php
     session_start();
     session_destroy();
     echo json_encode(array('respuesta' =>true ,'nombre' =>"funciona"));
?>
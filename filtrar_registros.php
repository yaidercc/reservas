<?php
include 'php/conexion.php';
session_start();
//validamos si se ha hecho o no el inicio de sesion correctamente
//si no se ha hecho la sesion nos regresará a login.php
if (!isset($_SESSION['cedula'])) {
    header('Location: login.php');
    exit();
}
$busqueda = '';
$fecha_de = '';
$fecha_a = '';
if (!empty($_REQUEST['inicial']) || !empty($_REQUEST['final'])) {
    // si los dos campos de fecha estan definidos ejecuta lo que hay dentro
    if (!empty($_REQUEST['inicial']) && !empty($_REQUEST['final'])) {
        $fecha_de = $_REQUEST['inicial'];
        $fecha_a = $_REQUEST['final'];
        if ($fecha_de > $fecha_a) {
            header("location: reportes.php");
        } else if ($fecha_a == $fecha_de) {
            $where = " fecha_reserva LIKE '$fecha_de%'";
            $buscar = "&inicial=$fecha_de&final=$fecha_a";
        } else {
            $f_de = $fecha_de;
            $f_a = $fecha_a;
            $where = " fecha_reserva BETWEEN '$f_de' AND '$f_a'";
            $buscar = "&inicial=$fecha_de&final=$fecha_a";
        }    
    } else {
        //si solo uno esta definido, lo devuelve a reportes
        header("location: reportes.php?opc=" + $_REQUEST['opc']);
    }
} else if (!empty($_REQUEST['busqueda'])) {
    //si la unica varible definida es la de busqueda ejecuta este if
    $buscar = '';
    $busqueda = strtolower($_REQUEST['busqueda']);
    $buscar = "busqueda=$busqueda";
    $where = "(
        Nombres LIKE '%$busqueda%' OR
        Apellidos LIKE '%$busqueda%' OR
        cod_modulo_fk LIKE '%$busqueda%'
    )";
} else {
    header("location: reportes.php");
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <script src="librerias/jquery-3.5.1.slim.min.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2efdabf6ca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Css/normalice.css" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/Estilos.css" crossorigin="anonymous">
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <title>Filtrar Registros</title>
</head>

<body>
    <header>
        <nav class="navegacion-reservas">
            <div class="menu-burger">
                <a href="#">
                    <ion-icon name="menu"></ion-icon>
                </a>
            </div>
            <div class="logo">
                <img id="logo-air" src="img/logo_airplan.png" height="100px" width="100px">
            </div>
            <div class="enlaces">
                <a href="reservas.php">
                    <ion-icon name="calendar"></ion-icon><span>reservar</span>
                </a>
                <!--imprimir datos de los usuarios que tengan que ver con el filtro-->
                <?php
                if ($_SESSION['tipo_usuario'] == 1) {
                    echo "<a href='reportes.php'  class='miga'>
                            <ion-icon name='receipt'></ion-icon><span>repotes</span>
                        </a>";
                    echo "<a href='gestion_usuarios.php?opc=10'>
                        <ion-icon name='people'></ion-icon><span>gestion de usuarios</span>
                        </a>";
                }
                ?>
                <a href="php/salir.php">
                    <ion-icon name="power"></ion-icon><span> salir</span>
                </a>
            </div>
        </nav>
    </header>
    <!--buscar por datos del usuario
    <form action="buscar_fecha.php" method="GET">
        <input type="text" placeholder="buscar" id="busqueda" name="busqueda" value="<?php echo $busqueda; ?>" class="form-control">
        <input type="submit" value="buscar" class="btn_buscar btn-primary">
    </form>-->
    <div class="container-general">
        <!--filtrar por fecha-->
        <h1 class="titulo">listado de reservaciones</h1>
        <form action="filtrar_registros.php" method="GET" id="busquedas">

            <div class="descargas">
                <a href="reportes.php" class="volver">volver</a>

                
            </div>
            <div class="conj">
                <input type="date" id="inicial" name="inicial" value="<?php echo $fecha_de; ?>" class="form-control">
                <input type="date" id="final" name="final" value="<?php echo $fecha_a; ?>" class="form-control">
                <input type="submit" value="buscar" class="btn_buscar btn-primary">
            </div>
        </form>

        <table id="reservaciones" class="table table-striped table-hover">
            <thead class="table">
                <tr>
                    <th scope="col">nombres</th>
                    <th scope="col">apellidos</th>
                    <th scope="col">modulo reservado</th>
                    <th scope="col">fecha de reserva</th>
                    <th scope="col">hora de inicio</th>
                    <th scope="col">hora de fin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                /* cuenta la cantidad de tuplas que tienen relacion con la consulta
                $cantidades = mysqli_query($conexion, "SELECT COUNT(*) as cantidad FROM `empleados` INNER JOIN `reservas` ON cedula_fk=cedula WHERE $where ");

                //covierte en un array los datos que trajo de la bd
                $resultados = mysqli_fetch_array($cantidades);
                // mete la cantidad registros en una variable
                $total_registros = $resultados['cantidad'];
                //cantidad de registros que se van a mostrar en la tabla
                $por_pagina =  $_REQUEST['opc'];
                //verifica que pagina ha sido seleccionada o en que pagina esta
                if (empty($_GET['pagina'])) {
                    // si no hay nada pone la primera pagina
                    $pagina = 1;
                } else {
                    //si hay algo obtiene el valor
                    $pagina = $_GET['pagina'];
                }
                //operacion para ver desde que numero de los registros de la bd, debe traer
                $desde = ($pagina - 1) * $por_pagina;
                //operacion para ver hasta que numero de los registros de la bd, debe traer
                $total = ceil($total_registros / $por_pagina);
                //consultar los registros que tengan que ver con la consulta
                */
                $consultar = mysqli_query($conexion, "SELECT * FROM `empleados` INNER JOIN `reservas` on id_fk=id WHERE $where ORDER BY fecha_reserva ");
                //guarda el numero de tuplas que se hayan encontrado
                $cantidad = mysqli_num_rows($consultar);
                //verifica el numero de tuplas que se hayan encontrado
                if ($cantidad > 0) { ?>
                    <?php
                    while ($row = mysqli_fetch_array($consultar)) { ?>
                        <tr>
                            <td><?php echo $row['Nombres'] ?></td>
                            <td><?php echo $row['Apellidos'] ?></td>
                            <td><?php echo $row['cod_modulo_fk'] ?></td>
                            <td><?php echo $row['fecha_reserva'] ?></td>
                            <td><?php echo $row['hora_inicio'] ?></td>
                            <td><?php echo $row['hora_final'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>
    <script src="librerias/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <!--librerias boostrap 4-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="js/Funciones.js"></script>
</body>

</html>
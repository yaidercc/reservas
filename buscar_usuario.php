<?php
    include 'php/conexion.php';
    session_start();
    //validamos si se ha hecho o no el inicio de sesion correctamente
    //si no se ha hecho la sesion nos regresará a login.php
    if (!isset($_SESSION['cedula'])) {
        header('Location: login.php');

        exit();
    }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2efdabf6ca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Css/normalice.css" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/Estilos.css" crossorigin="anonymous">
    <title>Reservaciones</title>
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
                <?php
                //si es administrador pone la pagina de reportes en el menu de navegacion
                if ($_SESSION['tipo_usuario'] == 1) {
                    echo "<a href='reportes.php'  class='miga'>
                            <ion-icon name='receipt'></ion-icon><span>repotes</span>
                        </a>";
                }
                ?>
                <a href="php/logout.php">
                    <ion-icon name="power"></ion-icon><span> salir</span>
                </a>
            </div>
        </nav>
    </header>
    <div class="contenedor-general">
        <?php
        $busqueda = strtolower($_REQUEST['busqueda']);
        // si no hay nada en el input de buscar
        if (empty($busqueda)) {
            header("location:reportes.php");
        }
        ?>
        <form action="buscar_usuario.php" method="GET">
            <input type="text" placeholder="buscar" id="busqueda" name="busqueda" class="form-control" value="<?php echo $busqueda; ?>">
            <input type="submit" value="buscar" class="btn_buscar btn-primary">
        </form>
        <h1>listado de reservaciones</h1>
        <table id="reservaciones" class="table">
            <thead class="table-dark">
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
                <!--imprimir datos de los usuarios que tengan que ver con el filtro-->
                <?php
                $cantidades = mysqli_query($conexion, "SELECT COUNT(*) AS cantidad FROM `empleados` e INNER JOIN `reservas` r ON r.id_fk=e.id
                WHERE (
                    e.Nombres LIKE '%$busqueda%' OR
                    e.Apellidos LIKE '%$busqueda%' OR
                    r.cod_modulo_fk LIKE '%$busqueda%'
                )");
                //covierte en un array los datos que trajo de la bd
                $resultados = mysqli_fetch_array($cantidades);
                // mete la cantidad de registros en una variable
                $total_registros = $resultados['cantidad'];
                //cantidad de registros que se van a mostrar en la tabla
                $por_pagina = 5;
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
                //consultar los registros que tengan que ver con el filtro
                $consultar = mysqli_query($conexion, "SELECT * FROM `empleados` e INNER JOIN `reservas` r ON r.id_fk=e.id 
                    WHERE (
                    e.Nombres LIKE '%$busqueda%' OR
                    e.Apellidos LIKE '%$busqueda%' OR
                    r.cod_modulo_fk LIKE '%$busqueda%'
                )
                ORDER BY e.Nombres ASC LIMIT $desde,$por_pagina");

                //verifica el numero de tuplas que se hayan encontrado
                $cantidades = mysqli_num_rows($consultar);

                //dependiendo de la cantidad de tuplas encontradas imprime los que hayan encontrado
                if ($cantidades > 0) { ?>
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
        <!--Paginacion de la tabla-->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <!--deshabilitar boton de anterior dependiendo de el numero de pagina-->
                <?php
                if ($pagina != 1) { ?>
                    <li class='page-item '>
                        <a class='page-link' href='?pagina=<?php echo $pagina - 1 ?>&busqueda=<?php echo $busqueda ?>' tabindex='-1' aria-disabled='true'>Anterior</a>
                    </li>
                <?php
                } ?>
                <!--crear cantidad de paginas para la paginacion-->
                <?php
                for ($i = 1; $i <= $total; $i++) {
                    if ($i == $pagina) {
                        echo '<li class="page-item active"><a class="page-link" href="?pagina=' . $i . '&busqueda=' . $busqueda . '">' . $i . '</a></li>';
                    } else {
                        echo '<li class="page-item"><a class="page-link" href="?pagina=' . $i . '&busqueda=' . $busqueda . '">' . $i . '</a></li>';
                    }
                }
                ?>
                <!--deshabilitar boton de siguiente dependiendo de el numero de pagina-->
                <?php
                if ($pagina != $total) { ?>
                    <li class="page-item ">
                        <a class="page-link" href="?pagina=<?php echo $pagina + 1 ?>&&busqueda=<?php echo $busqueda ?>">Siguiente</a>
                    </li>
                <?php
                } ?>

            </ul>
        </nav>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>-->
</body>

</html>
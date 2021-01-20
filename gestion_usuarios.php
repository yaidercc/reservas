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

<!-- Librerias de fuentes-->
<link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,500;0,700;0,900;1,100;1,500;1,700;1,900&display=swap" rel="stylesheet"> 
     
   
     <!-- Libreria jquery -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
       <!-- Lubreria Boostrap 4 -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

     <!-- Libreria fontawesome-->
     <script src="https://kit.fontawesome.com/2efdabf6ca.js" crossorigin="anonymous"></script>

     <!--resetear estilos predeterminados-->
     <link rel="stylesheet" href="Css/normalice.css" crossorigin="anonymous">

     <!--estilos-->
     <link rel="stylesheet" href="Css/Estilos.css" crossorigin="anonymous">

     <!--libreria de iconos-->
     <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <title>Listado Usuarios</title>
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
                    echo "<a href='reportes.php?opc=10'>
                         <ion-icon name='receipt'></ion-icon><span>reportes</span>
                    </a>";
                    echo "<a href='gestion_usuarios.php?opc=10' class='miga'>
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
     <form action="buscar_usuario.php" method="GET">
          <input type="text" placeholder="buscar" id="busqueda" name="busqueda" class="form-control">
          <input type="submit" value="buscar" class="btn_buscar btn-primary">
     </form>-->
    <div class="container-general">
        <!--filtrar por fecha-->
        <h1 class="titulo">listado de usuarios</h1>
        <div id="busquedas">
            <div class="descargas">
                <div class="descarga add-user">
                    <a href="#" id="add-usu">
                        <ion-icon name="person-add"></ion-icon> <span> nuevo usuario</span>
                    </a>

                </div>
            </div>

        </div>
        <table id="usuarios" class="table table-striped table-hover">
            <thead class="table">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">documento</th>
                    <th scope="col">nombres</th>
                    <th scope="col">apellidos</th>
                    <th scope="col">cargo</th>
                    <th scope="col">editar</th>
                    <th scope="col">eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // cuenta la cantidad de tuplas que tienen relacion con la consulta
                /*$cantidades = mysqli_query($conexion, "SELECT COUNT(*) as cantidad FROM `empleados`");
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
                //consultar los registros que tengan que ver con la consulta*/
                $consultar = mysqli_query($conexion, "SELECT * FROM `empleados` e right join `cargos` c ON c.ID=e.id_cargo_fk ORDER BY Nombres ASC ");
                //verifica el numero de tuplas que se hayan encontrado
                $cantidades = mysqli_num_rows($consultar);
                if ($cantidades > 0) { ?>
                    <?php
                    while ($row = mysqli_fetch_array($consultar)) { ?>
                        <tr>
                            <td><?php echo $row['Id'] ?></td>
                            <td><?php echo $row['cedula'] ?></td>
                            <td><?php echo $row['Nombres'] ?></td>
                            <td><?php echo $row['Apellidos'] ?></td>
                            <td><?php echo $row['NOMBRE_CARGO'] ?></td>
                            <td>
                                <a href="#" class="editar">
                                    <ion-icon name="pencil"></ion-icon>
                                </a>
                            </td>
                            <td>
                                <?php if ($row['cod_tipo_fk'] != 1) { ?>
                                    <a href="#" class="eliminar">
                                        <ion-icon name="trash" onclick="AlertarEliminar(<?php echo $row['Id'] ?>)"></ion-icon>
                                    </a>
                                <?php
                                }
                                ?>
                            </td>
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


    <!--POPUP REGISTRO DE USUARIO-->
    <div id="overlay-user" class="overlay ">
        <div class="popup gestion-user" id="popup-user">
            <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"> <i class="fas fa-times"></i></a>
            <h1 class="titulo">registrar usuario</h1>
            <form action="#" id="adds-user-form">

                <div class="form-group">
                    <label class=" control-label"><span class="text-title">ingrese el numero de documento</span><span class="text-danger">*</span></label>
                    <input type="number" name="cedula" class="cedula form-control" required>
                </div>
                <div class="form-group">
                    <label class="hiniciocontrol-label"><span class="text-title">ingrese los nombres</span><span class="text-danger">*</span></label>
                    <input type="text" name="nombres" class="nombres form-control" required>
                </div>

                <div class="form-group">
                    <label class=" control-label"><span class="text-title">ingrese los apellidos</span><span class="text-danger">*</span></label>
                    <input type="text" name="apellidos" class="apellidos form-control" required>
                </div>
                <div class="form-group">
                    <label class=" control-label"><span class="text-title">ingrese el cargo</span><span class="text-danger">*</span></label>
                    <select class="cargos selectpicker" name="cargo" aria-label=".form-select-sm example">
                        <?php
                        $cargos = mysqli_query($conexion, "SELECT * FROM cargos ORDER BY NOMBRE_CARGO ASC");
                        while ($fila = mysqli_fetch_assoc($cargos)) { ?>
                            <option value="<?php echo $fila['ID'] ?>"><?php echo $fila['NOMBRE_CARGO'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <!--<input type="text" name="cargo" value="" class="cargo form-control">-->
                </div>
                <input type="submit" value="aceptar" class="aceptar btn-primary">
            </form>
        </div>
    </div>
    </div>

    <!--POPUP MODIFICAR USUARIO-->
    <div id="overlay-upd" class="overlay ">
        <div class="popup gestion-user" id="popup-upd">
            <a href="#" id="btn-cerrar-popup-updt" class="btn-cerrar-popup"> <i class="fas fa-times"></i></a>
            <h1 class="titulo">modificar usuario</h1>
            <form action="#" id="updt-user-form">
                <div class="form-group">
                    <label class=" control-label"><span class="text-title">numero de documento</span><span class="text-danger">*</span></label>
                    <input type="number" name="cedula" class="cedula-upd form-control" required>
                    <input type="hidden" name="id_val" class="id-upd_val form-control" required>
                </div>
                <div class="form-group">
                    <label class="hiniciocontrol-label"><span class="text-title">nombres</span><span class="text-danger">*</span></label>
                    <input type="text" name="nombres" class="nombres-upd form-control" required>
                </div>

                <div class="form-group">
                    <label class=" control-label"><span class="text-title">apellidos</span><span class="text-danger">*</span></label>
                    <input type="text" name="apellidos" class="apellidos-upd form-control" required>
                </div>
                <div class="form-group select">
                    <label class=" control-label"><span class="text-title">cargo</span><span class="text-danger">*</span></label>
                    <select class="cargos select" name="cargo" id="select-cargo" aria-label=".form-select-sm example">
                    </select>
                </div>
                <input type="submit" value="aceptar" class="aceptar btn-primary">
            </form>
        </div>
    </div>
    </div>

    <script src="librerias/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <!--librerias boostrap 4-->
    <script src="bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!--libreria jquery-->
    <script src="js/jquery-v1.min.js"></script>
    <!--libreria ajax-->
    <script src="librerias/jquery.min.js"></script>
    <!--libreria sweeetalert2-->
    <script src="librerias/sweetalert2.all.min.js"></script>
    <!--libreria sweeetalert-->
    <script src="librerias/sweetalert.min.js"></script>
    <!--funciones javascript-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script src="js/Funciones.js"></script>
</body>

</html>
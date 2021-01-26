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
                <a href="reservas.php" id="link-reservas">
                    <ion-icon name="calendar"></ion-icon><span>reservar</span>
                </a>
                <!--imprimir datos de los usuarios que tengan que ver con el filtro-->
                <?php
                if ($_SESSION['tipo_usuario'] == 1) {
                    echo "<a href='reportes.php' id='link-reportes'>
                         <ion-icon name='receipt'></ion-icon><span>reservaciones</span>
                    </a>";
                    echo "<a href='gestion_usuarios.php' id='link-gestion'>
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
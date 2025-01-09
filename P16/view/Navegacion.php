<?php
    echo '<A HREF="index.php?controller=Inicio">Principal</A>
            <BR>
            <BR>
            <A HREF="index.php?controller=Mueble">Productos</A>
            <BR>
            <BR>';
    if (isset($_SESSION["name"])) {
        echo "<A HREF='index.php?controller=Pieza'>Disponibilidad de piezas</A>
             <BR>
             <BR>
              <A HREF='index.php?controller=Logout'>Cerrar sesi&oacute;n</A>";
    } else {
         echo "<A HREF='index.php?controller=UserLogin'>Acceso clientes</A>";
    }
?>
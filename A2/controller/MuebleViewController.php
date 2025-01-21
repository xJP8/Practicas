<?php
    require_once __DIR__ . "/../model/entities/Mueble.php";

    $pagina = 1;

    if(isset($_GET['pagina'])){
        $pagina = $_GET['pagina'];
    }

    $mueble = new Mueble();
    
    $pagAnt = $pagina - 1;
    $pagPos = $pagina + 1;
    $pagUlt = $mueble->getNumPaginas();
    if ($pagina > $pagUlt) {
        header("Location: index.php?controller=Mueble&pagina=$pagUlt");
    } else if ($pagina < 1) {
        header("Location: index.php?controller=Mueble&pagina=1");
    }

    $mueblesBD = $mueble->getMuebles($pagina);

    
    require_once __DIR__ . "/../view/MuebleView.php";
?>
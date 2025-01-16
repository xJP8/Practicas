<?php
    require_once __DIR__ . "/../model/entities/Mueble.php";

    $mueble = new Mueble();
    $mueblesBD = $mueble->getMuebles();
    
    require_once __DIR__ . "/../view/MuebleView.php";
?>
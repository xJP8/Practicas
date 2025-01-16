<?php
    require_once __DIR__ . "/../model/entities/Pieza.php";

    $pieza = new Pieza();
    $piezasBD = $pieza->getPiezas();

    require_once __DIR__ . "/../view/PiezaView.php";
?>
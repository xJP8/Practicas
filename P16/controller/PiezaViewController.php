<?php
    require_once __DIR__ . "/../model/db/Database.php";

    $db = new Database();
    $piezasBD = $db->getPiezas();

    $piezas = "";
    foreach ($piezasBD as $pieza) {
        $piezas .= "<OPTION>{$pieza['nombre']}</OPTION>";
    }

    require_once __DIR__ . "/../view/PiezaView.php";
?>
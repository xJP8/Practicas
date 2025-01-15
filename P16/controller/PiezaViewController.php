<?php
    require_once __DIR__ . "/../model/db/Database.php";

    $db = new Database();
    $piezasBD = $db->getPiezas();

    require_once __DIR__ . "/../view/PiezaView.php";
?>
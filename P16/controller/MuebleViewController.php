<?php
    require_once __DIR__ . "/../model/db/Database.php";

    $db = new Database();
    $muebles .= $db->getMuebles();
    


    require_once __DIR__ . "/../view/MuebleView.php";
?>
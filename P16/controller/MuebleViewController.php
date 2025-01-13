<?php
    require_once __DIR__ . "/../model/db/Database.php";

    $db = new Database();
    $mueblesBD = $db->getMuebles();

    $muebles = "";
    foreach ($mueblesBD as $mueble) {
        $muebles .= "<tr>";
        $muebles .= "<td>{$mueble['nombre']}</td>";
        $muebles .= "<td>{$mueble['precio']}</td>";
        $muebles .= "</tr>";
    }
    
    require_once __DIR__ . "/../view/MuebleView.php";
?>
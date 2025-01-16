<?php
    require_once __DIR__ . "/../model/entities/Pieza.php";
    
    $existencia = new Pieza();
    $existenciaDB = $existencia->getExistencia($_POST['existencia']);

    require_once __DIR__ . "/../view/ExistenciaView.php";
?>
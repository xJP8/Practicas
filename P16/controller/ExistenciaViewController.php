<?php
    require_once __DIR__ . "/../model/entities/Existencia.php";
    
    $existencia = new Existencia();
    $existenciaDB = $existencia->getExistencia($_POST['existencia']);

    require_once __DIR__ . "/../view/ExistenciaView.php";
?>
<?php
    require_once __DIR__ . "/../model/db/Database.php";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $db = new Database();
        $db->getExistencia($_POST['existencia']);
    } else{
        $existencia = "No se encontraron resultados.";
    }

    require_once __DIR__ . "/../view/ExistenciaView.php";
?>
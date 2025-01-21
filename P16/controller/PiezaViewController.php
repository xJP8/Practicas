<?php
    require_once __DIR__ . "/../model/entities/Pieza.php";

    if ($_POST['existencia'] == null && $action = $_GET['action'] == "detalle") {
        header("Location: index.php?controller=Pieza&action=listar");
        exit();
    }

    $action = "listar"; // Acción por defecto.

    if (!empty($_GET['action'])) { // Comprobar que la URL tiene una ación.
        $action = $_GET['action']; // Obtener la acción de la URL.
    }

    $pieza = new Pieza();
    $piezasBD = $pieza->$action($_POST['existencia']);

    require_once __DIR__ . "/../view/Pieza".$action."View.php";
?>
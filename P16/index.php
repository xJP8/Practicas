<?php
    require_once __DIR__ . '/model/session/Session.php';
    $session = new Session();
    
    $PATH = __DIR__ . "/controller/%sViewController.php";
    $controller = "Inicio";
    
    if (!empty($_GET['controller'])) {
        $controller = $_GET['controller'];
    }
    
    $ruta = sprintf($PATH, $controller);

    if($session->haveAccess($controller)){
        require_once $ruta;
    } else{
        require_once sprintf($PATH, "Inicio");
    }
?>
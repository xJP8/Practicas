<?php
    require_once __DIR__ . '/model/session/Session.php';
    $PATH = __DIR__ . "/controller/%sViewController.php";
    $controller = "Inicio"; // Controlador por defecto.
    
    session_start(); // Mantener la sesión.
    
    if (!empty($_GET['controller'])) { // Comprobar que la URL tiene un controlador.
        $controller = $_GET['controller']; // Obtener el controlador de la URL.
    }
    
    $haveAcces = false; // Cambiar a true para permitir acceso a cualquier controlador
    $isAutenticated = isset($_SESSION['user']); // Cambiar a true para simular usuario autenticado
    $accessList = [
        'any' => ['Inicio', 'Mueble'], // Controladores a los que se puede acceder siempre.
        'anonymous' => ['UserLogin'], // Controladores a los que se puede acceder sin autenticación.
        'user' => ['Existencia', 'Pieza', 'UserPage', 'Logout'] // Controladores a los que se puede acceder si se está autenticado.
    ];

    if (in_array($controller, $accessList['any'])) { // Comprobar si el controlador existe.
        $haveAcces = true;
    } else if ($isAutenticated && in_array($controller, $accessList['user'])) { // Comprobar si el usuario está autenticado y tiene acceso al controlador.
        $haveAcces = true;
    } else if (!$isAutenticated && in_array($controller, $accessList['anonymous'])) { // Comprobar si el usuario no está autenticado y tiene acceso al controlador.
        $haveAcces = true;
    }
    
    if($haveAcces){ // Si se tiene acceso al controlador, cargarlo.
        $ruta = sprintf($PATH, $controller); 
        require_once $ruta; 
    } else{ // Si no se tiene acceso al controlador, cargar el controlador por defecto.
        require_once sprintf($PATH, "Inicio");
    }
?>
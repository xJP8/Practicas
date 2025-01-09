<?php
     $PATH = __DIR__ . "/controller/%sViewController.php";

     session_start();

     $controller = "Inicio";
     if (!empty($_GET['controller'])) {
         $controller = $_GET['controller'];
     }

     $ruta = sprintf($PATH, $controller);
     if(is_file($ruta)){
         require_once $ruta;
     } else{
          require_once __DIR__ . "/view/InicioView.php";
         die("Controlador no encontrado");
     }
?>
<?php
    // Si existe sesión, se borra y se redirige a Formulario Login //
    session_start();
    if(isset($_SESSION["nombre"])){
        session_destroy();

        header("Location: /clients/view/clients.php");
        exit();
    }
?>
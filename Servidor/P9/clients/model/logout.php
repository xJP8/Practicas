<?php
    session_start();
    if(isset($_SESSION["nombre"])){
        session_abort();

        header("Location: clients.php");
        exit();
    }
?>
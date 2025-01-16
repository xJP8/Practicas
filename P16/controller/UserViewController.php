<?php
    require_once __DIR__ . "/../model/entities/User.php";
    $user = new User();
    $userDB = $user->getUser($_POST['user'], $_POST['pass']);
    
    if ($userDB) {
        $_SESSION["user"] = $_POST['user'];
        header('Location: index.php?controller=UserPage');
        exit();
    } else {
        header('Location: index.php?controller=UserLogin');
        exit();
    }
?>
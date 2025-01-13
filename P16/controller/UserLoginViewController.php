<?php
    require_once __DIR__ . "/../model/db/Database.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $db = new Database();
        $user = $db->getUser($_POST['user'], $_POST['pass']);
        if ($user) {
            $_SESSION["user"] = $_POST['user'];
            header('Location: index.php?controller=UserPage');
            exit();
        } else {
            header('Location: index.php?controller=Login&error=invalid_credentials');
            exit();
        }
    }

    require_once __DIR__ . "/../view/UserLoginView.php";  
?>
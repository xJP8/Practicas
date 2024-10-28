<?php
    $servername = "sql8.freemysqlhosting.net";
    $username = "sql8739892";
    $password = "7I8encFwKn";
    $dbname = "sql8739892";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $nombre = htmlspecialchars($_POST['nombre']);
    $contra = htmlspecialchars($_POST['contra']);

    $sql = "SELECT nombre FROM clientes WHERE nombre = " . "'" . $nombre . "'" . " AND contra = " . "'" . $contra . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION["nombre"] = $nombre; 
        header("Location: ../view/login_complete.php");
        exit();
    } else {
        header("Location: ../view/login_refuze.php");
        exit();
    }
    $conn->close();
?>  
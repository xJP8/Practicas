<?php
    $servername = "sql7.freesqldatabase.com";
    $username = "sql7744137";
    $password = "meKvU4kasn";
    $dbname = "sql7744137";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $nombre = htmlspecialchars($_POST['nombre']);
    $contra = htmlspecialchars($_POST['contra']);

    $sql = "SELECT id, nombre FROM clientes WHERE nombre = " . "'" . $nombre . "'" . " AND contrasena = " . "'" . $contra . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION["id"] = $row["id"];
        $_SESSION["nombre"] = $row["nombre"]; 
        header("Location: ../view/login_complete.php");
        exit();
    } else {
        header("Location: ../view/login_refuze.php");
        exit();
    }
    $conn->close();
?>  
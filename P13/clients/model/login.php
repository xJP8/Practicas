<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "jesusdb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $nombre = $_POST['nombre'];
    $contra = $_POST['contra'];

    $sql = "SELECT id, nombre FROM clientes WHERE nombre = '$nombre' AND contrasena = '$contra'";
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
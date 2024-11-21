<?php
    // Credenciales BBDD //
    $servername = "localhost";
    $username = "cliente";
    $password = "";
    $dbname = "jesusdb";

    // Conexión BBDD //
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Datos Formulario //
    $nombre = $_POST['nombre'];
    $contra = $_POST['contra'];

    // Consulta y su preparación //
    $sql = "SELECT id, nombre FROM clientes WHERE nombre = ? AND contrasena = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $nombre, $contra); // Datos parametrización //

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) { // Comprobación de existencia de resultado //
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION["id"] = $row["id"];
        $_SESSION["nombre"] = $row["nombre"]; 
        $stmt->close();
        $conn->close();
        header("Location: ../view/login_complete.php"); // Redirigir a Bienvenido //
        exit();
    } else {
        $stmt->close();
        $conn->close();
        header("Location: ../view/login_refuze.php"); // Redirigir a Credenciales erroneas //
        exit();
    }
?>
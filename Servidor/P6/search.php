<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "jesusbd";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $nombre = htmlspecialchars($_POST['pastel']);

    $sql = "SELECT nombre, precio FROM pasteles WHERE nombre = '$nombre'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Nombre: " . $row["nombre"]. " - Precio: " . $row["precio"]. "<br>";
        }
    } else {
        echo "0 resultados";
    }

    $conn->close();
?>

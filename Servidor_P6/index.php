<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pastelería Jesus</title>
</head>
<body>
    <h1>¿Quieres ver los precios?</h1>
    <p>Seleccione el pastel y pulse "Enviar"</p>
    <form action="search.php" method="post">
    <select name="pastel" id="pasteles">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "jesusbd";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql = "SELECT nombre FROM pasteles";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value=". $row["nombre"] .">". $row["nombre"]."</option>";
                }
            }
            $conn->close();
        ?>
    </select>
    <button>Enviar</button>
    </form>
</body>
</html>
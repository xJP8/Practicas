<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Bancos JP</h1>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="services.php">Servicios</a>
            <a href="oficines.php">Oficinas</a>
            <a href="contacts.php">Contacto</a>
        </nav>
    </header>
    <main>
        <div>
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

            $sql = "SELECT mapa FROM oficinas WHERE nombre = '$nombre'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<h2>'.$nombre.'</h2>';
                    echo $row["mapa"];
                }
            } else {
                echo "<h2>Error</h2>";
                echo "<p>Debe seleccionar una oficina para mostrar la ubicación.</p>";
            }
            
            $conn->close();
            ?>          
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Bancos JP. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
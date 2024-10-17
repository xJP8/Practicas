<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Search</title>
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
                $nombre = htmlspecialchars($_POST['oficina']);
                if ($nombre == null || $nombre == "") {
                    header("Location: oficines.php");
                } else{
                    $servername = "localhost";
                    $username = "root";
                    $password = "root";
                    $dbname = "jesusbd";
                    
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }

                    $sql = "SELECT mapa FROM oficinas WHERE nombre = '$nombre'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<h2>'.$nombre.'</h2>';
                            echo $row["mapa"];
                        }
                    } else {
                        echo "<h2>Error</h2>";
                        echo "<p>No se ha encontrado la oficina deseada.</p>";
                    }
                    
                    $conn->close();
                }
            ?>          
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Bancos JP. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
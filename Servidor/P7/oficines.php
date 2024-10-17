<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Oficinas</title>
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
            <form action="search.php" method="post">
                <select name="oficina" id="oficina">
                    <option value=""></option>
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "root";
                        $dbname = "jesusbd";
    
                        $conn = new mysqli($servername, $username, $password, $dbname);
    
                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }
    
                        $sql = "SELECT nombre FROM oficinas";
                        $result = $conn->query($sql);
    
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option value="'. $row["nombre"] .'">'. $row["nombre"].'</option>';
                            }
                        }
                        $conn->close();
                    ?>
                </select>
                <button>Buscar</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Bancos JP. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
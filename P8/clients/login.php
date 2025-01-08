<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/style.css">
    <title>Contactos</title>
</head>
<body>
    <header>
        <h1>Bancos JP</h1>
        <nav>
            <a href="../index.php">Inicio</a>
            <a href="/services/services.php">Servicios</a>
            <a href="/oficines/oficines.php">Oficinas</a>
            <a href="/contacts/contacts.php">Contacto</a>
            <a href="/clients/view/clients.php">Acceso clientes</a>
        </nav>
    </header>
    <main>
        <div>
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
                    while($row = $result->fetch_assoc()) {
                        echo '<h2>'."Sesión Iniciada".'</h2>';
                        echo '<h3>'."Bienvenido ". $row["nombre"] .'</h3>';
                    }
                } else {
                    echo "<h2>Error</h2>";
                    echo "<p>Credenciales Incorrectas</p>";
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
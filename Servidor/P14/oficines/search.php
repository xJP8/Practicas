<?php
session_start();
$nombre = "";
$oficinaEncontrada = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST['oficina'];
    if ($nombre == null || $nombre == "") {
        header("Location: /oficines/oficines.php");
        exit();
    } else {
        $servername = "localhost";
        $username = "cliente";
        $password = "";
        $dbname = "jesusdb";

        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->set_charset("utf8mb4");
        
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $sql = "SELECT mapa, calle, cod_postal, horario FROM oficinas WHERE nombre = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("s", $nombre);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $oficinaEncontrada = true;
            $row = $result->fetch_assoc();
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/style.css">
    <title>Search</title>
</head>
<body>
    <header>
        <h1>Bancos JP</h1>
        <nav>
            <a href="/index.php">Inicio</a>
            <a href="/services/services.php">Servicios</a>
            <a href="/oficines/oficines.php">Oficinas</a>
            <a href="/contacts/contacts.php">Contacto</a>
            <?php
                if(!isset($_SESSION["nombre"])){
                    echo '<a href="/clients/view/clients.php">Acceso clientes</a>';
                } else{
                    echo '<a href="/accounts/view/account.php">Cuentas</a>';
                    echo '<a href="/clients/view/client_logout.php">Cerrar sesión</a>';
                }
            ?>
        </nav>
    </header>
    <main>
        <div>
            <?php if ($oficinaEncontrada): ?>
                <h2><?php echo $nombre; ?></h2>
                <h3><?php echo $row["calle"]; ?></h3>
                <h3><?php echo $row["cod_postal"]; ?></h3>
                <h3><?php echo $row["horario"]; ?></h3>
                <?php echo $row["mapa"]; ?>
            <?php else: ?>
                <h2>Error</h2>
                <p>No se ha encontrado la oficina deseada.</p>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Bancos JP. Todos los derechos reser'$nombre'vados.</p>
    </footer>
</body>
</html>

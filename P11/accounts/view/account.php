<?php
    session_start();
    
    if(!isset($_SESSION["nombre"])){
        header("Location: /clients/view/clients.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/style.css">
    <title>Tus cuentas</title>
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
            <h1>Tus cuentas</h1>
            <table>
                <tr>
                    <td>Cuenta</td>
                    <td>Saldo</td>
                </tr>
                <?php
                    $servername = "sql7.freesqldatabase.com";
                    $username = "sql7744137";
                    $password = "meKvU4kasn";
                    $dbname = "sql7744137";
                
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }
                
                    $id = $_SESSION["id"];
                
                    $sql = "SELECT numero_cuenta, saldo FROM cuentas";
                    $result = $conn->query($sql);
                
                    if ($result->num_rows > 0) {
                        while ($fila = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $fila['numero_cuenta'] . "</td>
                                    <td>" . $fila['saldo'] . "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No hay cuentas registradas.</td></tr>";
                    }
                    $conn->close();
                ?>
            </table>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Bancos JP. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
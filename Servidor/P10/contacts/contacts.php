<?php
    session_start();
?>
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
            <a href="/index.php">Inicio</a>
            <a href="/services/services.php">Servicios</a>
            <a href="/oficines/oficines.php">Oficinas</a>
            <a href="/contacts/contacts.php">Contacto</a>
            <?php
                if(!isset($_SESSION["nombre"])){
                    echo '<a href="/clients/view/clients.php">Acceso clientes</a>';
                } else{
                    echo '<a href="/clients/view/client_logout.php">Cerrar sesión</a>';
                }
            ?>
        </nav>
    </header>
    <main>
        <div>
            <form action="mail.php" method="post">
                <input type="text" id="name" name="name" placeholder="Nombre" required><br>
                <input type="email" id="email" name="email" placeholder="Email" required><br>
                <input type="number" id="number" name="number" placeholder="Teléfono" required><br>
                <input type="text" id="asunto" name="asunto" placeholder="Asunto" required><br>
                <textarea name="mensaje" id="mensaje" placeholder="Mensaje" required></textarea><br>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Bancos JP. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
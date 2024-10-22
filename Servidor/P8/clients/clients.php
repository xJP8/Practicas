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
            <a href="/clients/clients.php">Acceso clientes</a>
        </nav>
    </header>
    <main>
        <div>
            <form action="/clients/login.php" method="post">
                <input type="text" id="nombre" name="nombre" placeholder="Nombre" required><br>
                <input type="password" name="contra" id="contra" placeholder="Contraseña" required><br>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Bancos JP. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
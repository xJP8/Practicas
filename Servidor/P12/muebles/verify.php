<?php
    session_start();

    if (isset($_SESSION["user"])) { // Si existe sesión, te manda a la pagina de bienvenida.
        header("Location: user_page.php");
        exit();
    }

    $dbHost = "localhost"; // Dirección Host
    $dbUser = "user"; // Nombre Usuario
    $dbPass = "1234"; // Contraseña Usuario
    $dbName = "muebles"; // Nombre Base de Datos
    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    // Comprobamos que la conexión funcione.
    if ($conn->connect_error) {
        die("Error en la base de datos");
    }

    $user = $_POST["user"];
    $pass = $_POST["pass"];

    // Creación, preparación y ejecución de la Query.
    $sql = "SELECT user FROM Usuario WHERE user = ? AND pass = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();

    // Obtención de los resultados.
    $resoult = $stmt->get_result();
    $ruta = ""; // Esto me sirvirá pa saber donde mandarte.

    if ($resoult->num_rows>0) { // Si encuentra usuario, inicia sesión y te manda a la pagina de bienvenida.
        $row = $resoult->fetch_assoc();
        $_SESSION["user"] = $row["user"];
        $ruta = "user_page.php"; 
    } else { // Si no encuentra ningún usuario, te re envía al formulario.
        $ruta = "login.php";
    }

    // Cerramos los recursos y movemos al usuario de pagina.
    $stmt->close();
    $conn->close();
    
    header("Location: " . $ruta);
    exit();
?>
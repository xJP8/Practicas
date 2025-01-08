<?php
    session_start();

    if (isset($_SESSION["user"])) { // Si existe sesión, te manda a la pagina de bienvenida.
        header("Location: user_page.php");
        exit();
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
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require __DIR__ . '/../vendor/autoload.php';  // Ruta corregida al autoload de Composer
    
    $mail = new PHPMailer(true);
    
    $nombre = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $asunto = htmlspecialchars($_POST['asunto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);
    
    try {
        // Configuraciones del servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;            
        $mail->Username   = 'jesusperez140805@gmail.com';
        $mail->Password   = 'ybimrbmqndlyicii';  // Contraseña de aplicación de Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;  
    
        // Destinatario y remitente
        $mail->setFrom('jesusperez140805@gmail.com', 'Jesús Pérez');
        $mail->addAddress($email);  // Se envía el correo al email recibido por POST
    
        // Contenido del correo
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $asunto;
        $mail->Body    = $mensaje;
    
        $mail->send();
        echo 'El mensaje ha sido enviado';
    } catch (Exception $e) {
        echo "El mensaje no pudo ser enviado. Error: {$mail->ErrorInfo}";
    }
?>

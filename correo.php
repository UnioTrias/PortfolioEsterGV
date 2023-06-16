<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir la librería de PHPMailer
require 'ruta/hacia/PHPMailer/PHPMailer.php';
require 'ruta/hacia/PHPMailer/Exception.php';
require 'ruta/hacia/PHPMailer/SMTP.php';

// Recibir los datos del formulario
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Configurar el objeto PHPMailer
$mail = new PHPMailer(true);

try {
    // Configurar los detalles del servidor SMTP y la autenticación
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com';  // Reemplaza con el servidor SMTP que corresponda
    $mail->SMTPAuth = true;
    $mail->Username = 'tu_email@example.com';  // Reemplaza con tu dirección de correo electrónico
    $mail->Password = 'tu_contraseña';  // Reemplaza con tu contraseña
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configurar el remitente y el destinatario
    $mail->setFrom($email, $name);
    $mail->addAddress('destinatario@example.com');  // Reemplaza con la dirección de correo electrónico del destinatario

    // Configurar el contenido del correo electrónico
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Enviar el correo electrónico
    $mail->send();

    // Mostrar mensaje de éxito en el formulario
    echo 'success';
} catch (Exception $e) {
    // Mostrar mensaje de error en el formulario
    echo 'error';
}
?>

<?php
if (isset($_POST["submit"])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    $subject = trim($_POST['subject']);
    $to = 'info@cesarlittle.com'; // Cambia esto a tu dirección de correo electrónico

    // Validar que los campos no estén vacíos
    if (empty($name) || empty($email) || empty($message) || empty($subject)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Validar formato de correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico no es válido.";
        exit;
    }

    // Crear cuerpo del mensaje
    $body = "De: $name\nE-Mail: $email\nAsunto: $subject\nMensaje:\n$message";

    // Configurar cabeceras
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Intentar enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        header("Location: thank-you.html");
        exit;
    } else {
        echo "Hubo un error al enviar el correo. Inténtalo de nuevo más tarde.";
    }
}
?>

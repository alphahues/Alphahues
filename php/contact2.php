<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/cpanelusername/PHPMailerTest/PHPMailer/src/Exception.php';
require '/home/cpanelusername/PHPMailerTest/PHPMailer/src/PHPMailer.php';
require '/home/cpanelusername/PHPMailerTest/PHPMailer/src/SMTP.php';

// Instantiation and passing [ICODE]true[/ICODE] enables exceptions
$mail = new PHPMailer(true);

try {
 //Server settings
 $mail->SMTPDebug = 2; // Enable verbose debug output
 $mail->isSMTP(); // Set mailer to use SMTP
 $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
 $mail->SMTPAuth = true; // Enable SMTP authentication
 $mail->Username = 'alphaemailer24@gmail.com'; // SMTP username
 $mail->Password = 'Em@iler2024'; // SMTP password
 $mail->SMTPSecure = 'tls'; // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
 $mail->Port = 587; // TCP port to connect to

//Recipients
 $mail->setFrom('alphaemailer24@gmail.com', 'Mailer');
 $mail->addAddress('sujay@alphahues.in', 'Sujay'); // Add a recipient
 $mail->addAddress('sujay@alphahues.in'); // Name is optional


// Content
 $mail->isHTML(true); // Set email format to HTML
 $mail->Subject = 'Here is the subject';
 $mail->Body = 'This is the HTML message body <b>in bold!</b>';
 $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
 echo 'Message has been sent';

} catch (Exception $e) {
 echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
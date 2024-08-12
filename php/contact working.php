<?php
// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form data   
    $name = sanitize_input($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $subject = sanitize_input($_POST['subject']);
    $message = sanitize_input($_POST['message']);

    // Validate email
    if (!$email) {
        $responseArray = array('class' => 'alert alert-danger', 'message' => 'Invalid email address.');
    } else {
        // Prepare email content
        $to = "sujay@alphahues.in";
        $body = "From: $name\n\nEmail: $email\n\nMessage:\n$message";

        // Send email using a more reliable method (e.g., PHPMailer, SMTP)
        // Example using PHPMailer:
        // require 'vendor/autoload.php'; // Include PHPMailer autoloader
        // $mail = new PHPMailer\PHPMailer\PHPMailer();
        // $mail->setFrom($email, $name);
        // $mail->addAddress($to);
        // $mail->Subject = $subject;
        // $mail->Body = $body;
        // if ($mail->send()) {
        //     $responseArray = array('class' => 'alert alert-success', 'message' => 'Message sent successfully. Thank you, will get back to you soon!');
        // } else {
        //     $responseArray = array('class' => 'alert alert-danger', 'message' => 'There was an error while submitting the form. Please try again later.');
        // }

        // For demonstration, we'll simulate a successful email send
        $responseArray = array('class' => 'alert alert-success', 'message' => 'Message sent successfully. Thank you, will get back to you soon!');
    }
} else {
    $responseArray = array('class' => 'alert alert-danger', 'message' => 'Invalid request.');
}

// Encode response as JSON and send headers
$encoded = json_encode($responseArray);
header('Content-Type: application/json');
echo $encoded;
?>
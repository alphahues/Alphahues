<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST["phone"]);
    $service = trim($_POST["service"]);
    $message = trim($_POST["message"]);

    // Validation: Check if required fields are not empty and email is valid
    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($phone) || empty($service) || empty($message)) {
        http_response_code(400);
        echo "Please complete the form and try again.";
        exit;
    }

    // Set email parameters
    $recipient = "sujay@alphahues.in"; // Primary recipient
    $secondaryRecipient = "daniel.s@alphahues.in"; // Secondary recipient for BCC
    $subject = "New contact from $name"; // Subject line

    // Prepare email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Service: $service\n";
    $email_content .= "Message: $message\n"; // Include the message content

    // Prepare email headers
    $email_headers = "From: $name <$email>\r\n";
    $email_headers .= "Bcc: $secondaryRecipient\r\n"; // Add BCC header

    // Attempt to send the email
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        http_response_code(200);
        echo "<script>alert('Thank You! Your message has been sent.');</script>";
    } else {
        http_response_code(500);
        echo "<script>alert('Oops! Something went wrong and we couldn't send your message.');</script>";
    }
}
?>


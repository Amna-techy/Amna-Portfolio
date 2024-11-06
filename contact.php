<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form inputs
    $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
    $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
    $message = htmlspecialchars(strip_tags(trim($_POST["message"])));

    // Define the recipient email address
    $to = "owaiskhatri58@gmail.com"; // Replace with your email address

    // Define the subject of the email
    $subject = "New message from $name";

    // Define the email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Define the email body
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$message\n";

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Thank you for contacting us, $name. We will get back to you soon.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace 'contact@example.com' with your actual email address
    $receiving_email_address = 'furynick870@gmail.com';
    
    $from_name = strip_tags(trim($_POST['name']));
    $from_email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    // Email content
    $email_content = "Name: $from_name\n";
    $email_content .= "Email: $from_email\n";
    $email_content .= "Message:\n$message\n";

    // Email headers
    $email_headers = "From: $from_name <$from_email>";

    // Sending the email
    if (mail($receiving_email_address, $subject, $email_content, $email_headers)) {
        echo "Thank you for contacting us, $from_name. We will get back to you shortly.";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    // Not a POST request
    echo "There was a problem with your submission, please try again.";
}
?>

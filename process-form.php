<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST["First Name"]; // Update these lines
    $last_name = $_POST["Last Name"];
    $email = $_POST["Email Address"];
    $contact_number = $_POST["Contact Number"];
    $message = $_POST["Message"];

    // Admin email address
    $admin_email = "admin@prescribe.co.za";

    // Email subject
    $subject = "Contact Us Form Submission";

    // Compose the email message
    $email_message = "First Name: $first_name\n";
    $email_message .= "Last Name: $last_name\n";
    $email_message .= "Email Address: $email\n";
    $email_message .= "Contact Number: $contact_number\n";
    $email_message .= "Message:\n$message";

    // Send the email
    if (mail($admin_email, $subject, $email_message)) {
        // Email sent successfully
        $response = array("status" => "success");
    } else {
        // Email sending failed
        $response = array("status" => "error");
    }

    // Return a JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>

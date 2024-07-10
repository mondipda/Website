<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: Print POST array
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    // Check if all form fields are set
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        // Display a thank you message with the user's name
        echo "<h1>Thank You, $name!</h1>";
        echo "<p>Your message has been sent.</p>";
    } else {
        echo "<p>Some fields are missing. Please go back and fill out all fields.</p>";
    }
} else {
    // If the form is not submitted, redirect to the form page
    header("Location: index.html#contact");
    exit();
}
?>




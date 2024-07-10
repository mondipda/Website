<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
      
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "contact";

     
        $conn = new mysqli($servername, $username, $password, $dbname);

       
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

      
        if ($stmt->execute()) {
            echo "<h1>Thank You, $name!</h1>";
            echo "<p>Your message has been sent and stored in our database.</p>";
        } else {
            echo "<p>There was an error submitting your message. Please try again.</p>";
        }

       
        $stmt->close();
        $conn->close();
    } else {
        echo "<p>Some fields are missing. Please go back and fill out all fields.</p>";
    }
} else {
    header("Location: index.html#contact");
    exit();
}
?>






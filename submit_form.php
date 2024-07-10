<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hiredata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$role = $_POST['role'];
$budget = $_POST['budget'];
$deadline = $_POST['deadline'];
$description = $_POST['description'];

// Insert data into database
$sql = "INSERT INTO hire_requests (name, email, role, budget, deadline, description) VALUES ('$name', '$email', '$role', '$budget', '$deadline', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

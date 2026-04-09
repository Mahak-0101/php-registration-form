<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "simple_registration");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Encrypt password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert query
$sql = "INSERT INTO users (name, email, password) 
        VALUES ('$name', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration Successful!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

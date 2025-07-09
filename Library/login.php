<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library_catalog";


// If your root user has **no password** (default in XAMPP)
$conn = new mysqli("localhost", "root", "syedrahman143", "library_catalog");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get input from login form
$user = $_POST['username'];
$pass = $_POST['password'];

// Hash the password before storing (important for security)
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// Save to database
$sql = "INSERT INTO users (username, password) VALUES ('$user', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Login info saved successfully! Welcome to the Library Catalog.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

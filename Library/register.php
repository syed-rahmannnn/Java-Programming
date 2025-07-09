<?php
$conn = new mysqli("localhost", "root", "syedrahman143", "library_catalog");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Save user
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
if ($conn->query($sql) === TRUE) {
    echo "Registration successful! <a href='login.html'>Click here to login</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

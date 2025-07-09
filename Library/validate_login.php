<?php
$conn = new mysqli("localhost", "root", "syedrahman143", "library_catalog");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

// Check if username exists
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        echo "Login successful! Welcome, " . $username;
        // Redirect to dashboard/home if needed
    } else {
        echo "Incorrect password!";
    }
} else {
    echo "User not found. <a href='register.html'>Register here</a>";
}

$conn->close();
?>

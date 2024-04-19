<!-- register_process.php -->
<?php
// Include database connection
include 'db_connection.php';

// Retrieve form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert user data into the database
$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $hashedPassword);
$stmt->execute();
$stmt->close();

// Redirect to login page after successful registration
header("Location: login.php");
exit();
?>

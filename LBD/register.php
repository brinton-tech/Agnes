<?php
// Include database connection
require_once 'db_connection.php';

// Start session
session_start();

// Check if the user is already logged in
if(isset($_SESSION['user_id'])){
    // Redirect to dashboard or any other page if the user is already logged in
    header("Location: dashboard.php");
    exit;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Your registration logic here (e.g., inserting user data into the database)

    // After successful registration, you can redirect the user to the login page
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Local Business Directory</title>
    <style>
        /* Add your CSS styles for registration form here */
    </style>
</head>
<body>
    <h1>Register</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>

<?php
// Start session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    require_once 'db_connection.php';

    // Get username/email and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Form validation
    if (empty($username) || empty($password)) {
        header("Location: login.php?error=empty_fields");
        exit;
    }

    // Prepare SQL statement to check if user exists
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();

        // Get result
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows == 1) {
            // Fetch user data
            $user = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $user['password'])) {
                // Password is correct, start a session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                // Redirect to dashboard or homepage
                header("Location: dashboard.php");
                exit;
            } else {
                // Password is incorrect
                header("Location: login.php?error=invalid_password");
                exit;
            }
        } else {
            // User does not exist
            header("Location: login.php?error=user_not_found");
            exit;
        }
    } else {
        // Error in preparing the statement
        header("Location: login.php?error=sql_error");
        exit;
    }
} else {
    // If the form is not submitted, redirect back to the login page
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        /* Reset default margin and padding */
        body, h1, h2, h3, p, ul, li {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            padding: 1rem;
        }

        header, footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
        }

        main {
            padding: 1rem;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-top: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
        }

        button[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #555;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Media queries for responsiveness */
        @media only screen and (min-width: 600px) {
            body {
                padding: 2rem;
            }

            main {
                padding: 2rem;
            }

            form {
                max-width: 600px;
                margin: 0 auto;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Contact Us</h1>
    </header>
    <main>
        <p>If you have any questions or inquiries, please feel free to contact us using the form below:</p>
        <form action="send_message.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br>
            <button type="submit">Send Message</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Local Business Directory</p>
    </footer>
</body>
</html>


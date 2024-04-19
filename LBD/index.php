<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Business Directory</title>
    <style>
        /* Reset default margin and padding */
        body, h1, h2, h3, p, ul, li {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        header, footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
        }

        main {
            padding: 2rem;
        }

        #registration-section {
            margin-bottom: 2rem;
        }

        button {
            padding: 0.5rem 1rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to the Local Business Directory</h1>
    </header>
    <main>
        <section id="registration-section">
            <h2>Register as a User</h2>
            <p>Don't have an account? Register now!</p>
            <a href="register.php"><button>Register</button></a>
        </section>
        <section id="login-section">
            <h2>Login</h2>
            <p>Already have an account? Login to access the user dashboard.</p>
            <a href="login.php"><button>Login</button></a>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Local Business Directory</p>
    </footer>
</body>
</html>



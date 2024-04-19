<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit;
}

// Include the database connection file
require_once 'db_connection.php';

// Initialize the variable to store search results
$searchResults = [];

// Check if the search query is submitted
if (isset($_GET['query'])) {
    // Sanitize the search query to prevent SQL injection
    $searchQuery = mysqli_real_escape_string($conn, $_GET['query']);

    // Perform the search query
    $sql = "SELECT * FROM businesses WHERE name LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

    // Store the search results in an array
    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        /* CSS styles for the dashboard */
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

        #search-section {
            margin-bottom: 2rem;
        }

        #search-form {
            display: flex;
            align-items: center;
        }

        #search-input {
            flex: 1;
            padding: 0.5rem;
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

        .business-list {
            margin-top: 2rem;
        }

        .business {
            margin-bottom: 1rem;
            padding: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>User Dashboard</h1>
        <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
    </header>
    <main>
        <section id="search-section">
            <h2>Find Local Businesses</h2>
            <form id="search-form" method="get" action="dashboard.php">
                <input type="text" id="search-input" name="query" placeholder="Search for businesses..." value="<?php echo isset($_GET['query']) ? $_GET['query'] : ''; ?>">
                <button type="submit">Search</button>
            </form>
        </section>
        <?php if (!empty($searchResults)) : ?>
            <section id="search-results">
                <h2>Search Results</h2>
                <div class="business-list">
                    <?php foreach ($searchResults as $business) : ?>
                        <div class="business">
                            <h3><?php echo $business['name']; ?></h3>
                            <p><?php echo $business['description']; ?></p>
                            <p>Location: <?php echo $business['location']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; 2024 Local Business Directory</p>
    </footer>
</body>
</html>

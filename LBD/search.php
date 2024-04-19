<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results | Local Business Directory</title>
    <style>
        /* CSS styles for search form */
        .search-form {
            margin: 20px auto;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .search-input {
            width: 70%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* CSS styles for search results */
        .search-results {
            margin: 20px auto;
            max-width: 800px;
        }

        .business {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .business h2 {
            margin-bottom: 5px;
        }

        .business p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="search-form">
        <form action="search.php" method="GET">
            <input type="text" name="query" class="search-input" placeholder="Search for businesses...">
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>

    <div class="search-results">
        <?php
        // Include database connection
        include 'db_connection.php';

        // Check if search query is set
        if (isset($_GET['query'])) {
            // Sanitize the search query to prevent SQL injection
            $searchQuery = mysqli_real_escape_string($conn, $_GET['query']);

            // Perform search query
            $sql = "SELECT * FROM businesses WHERE name LIKE '%$searchQuery%' OR category LIKE '%$searchQuery%'";
            $result = $conn->query($sql);

            // Display search results
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="business">';
                    echo '<h2>' . $row['NAME'] . '</h2>';
                    // Replace 'location' with the appropriate column name if it's different in your database
                    echo '<p>ADDRESS: ' . $row['ADDRESS'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No businesses found matching your search query.</p>';
            }
        }
        ?>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories & Listings | Local Business Directory</title>
    <style>
        /* CSS styles for category list */
        .category-list {
            list-style: none;
            padding: 0;
            margin: 20px auto;
            max-width: 600px;
        }

        .category-list li {
            margin-bottom: 10px;
        }

        .category-list li a {
            display: block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .category-list li a:hover {
            background-color: #0056b3;
        }

        /* CSS styles for listing container */
        .listings-container {
            margin-top: 20px;
        }

        .listing {
            background-color: #f9f9f9;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .listing h3 {
            margin-top: 0;
        }

        .listing p {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Categories</h2>
        <ul class="category-list">
            <!-- PHP code to dynamically generate categories -->
            <?php
            // Include database connection
            require_once 'db_connection.php';

            // Fetch categories from the database
            $sql = "SELECT * FROM categories";
            $result = $conn->query($sql);

            // Check if categories exist
            if ($result->num_rows > 0) {
                // Loop through each category and generate list item
                while ($row = $result->fetch_assoc()) {
                    echo '<li><a href="#">' . $row['category_name'] . '</a></li>';
                }
            } else {
                // If no categories found, display a message
                echo '<li>No categories found</li>';
            }

            // Close database connection
            $conn->close();
            ?>
        </ul>

        <div class="listings-container">
            <h2>Listings</h2>
            <!-- PHP code to dynamically generate listings based on selected category -->
            <?php
            // Fetch listings based on selected category (if any)
            // Your PHP code here to fetch listings based on selected category
            // Example: SELECT * FROM listings WHERE category_id = ?
            // Loop through the listings and generate HTML
            ?>
            <div class="listing">
                <h3>Listing Title 1</h3>
                <p>Listing description goes here.</p>
            </div>
            <div class="listing">
                <h3>Listing Title 2</h3>
                <p>Listing description goes here.</p>
            </div>
            <!-- Repeat for each listing -->
        </div>
    </div>
</body>
</html>

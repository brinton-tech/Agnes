<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories | Local Business Directory</title>
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
    </style>
</head>
<body>
    <ul class="category-list">
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
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Business Listings</title>
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

        #listings-section {
            margin-bottom: 2rem;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 1rem;
            padding: 1rem;
            background-color: #f4f4f4;
            border-radius: 5px;
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
        <h1>Local Business Listings</h1>
    </header>
    <main>
        <section id="listings-section">
            <h2>Businesses in Your Area</h2>
            <ul>
                <?php
                // Include database connection
                include 'db_connection.php';

                // Fetch and display business listings
                $sql = "SELECT * FROM businesses";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<li>' . $row['name'] . '</li>';
                    }
                } else {
                    echo '<li>No businesses found</li>';
                }

                // Close database connection
                $conn->close();
                ?>
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Local Business Directory</p>
    </footer>
</body>
</html>

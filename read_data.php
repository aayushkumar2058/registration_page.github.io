<?php
// Database connection details (replace with your actual credentials)
$db_host = "localhost"; // Replace with your database host (e.g., "localhost")
$db_user = "username"; // Replace with your database username
$db_pass = ""; // Replace with your database password
$db = "data"; // Replace with your database name

// Create a database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all registered data from the database
$sql = "SELECT * FROM baby_registration";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registered Data</title>
    <style>
        /* Add your CSS styling here */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Registered Data</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Baby Name</th>
            <th>Mobile Number</th>
            <th>Email</th>
            <th>Registration Date</th>
        </tr>
        <?php
        // Loop through the fetched data and display it in a table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["baby_name"] . "</td>";
                echo "<td>" . $row["mobile_number"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["registration_date"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No registered data found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

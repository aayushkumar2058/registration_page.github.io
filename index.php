<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $babyName = $_POST["babyName"];
    $mobileNumber = $_POST["mobileNumber"];
    $email = $_POST["email"];

    // Database connection details
    $db_host = "localhost"; // Replace with your database host (e.g., "localhost")
    $db_user = "username"; // Replace with your database username
    $db_pass = ""; // Replace with your database password
    $db= "data"; // Replace with your database name

    // Create a database connection
    $conn = new mysqli($db_host, $db_user, $db_pass, $db);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query to insert the data into the database
    $sql = "INSERT INTO baby_registration (baby_name, mobile_number, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $babyName, $mobileNumber, $email);

    if ($stmt->execute()) {
        // Registration successful
        echo "Registration successful!";
    } else {
        // Error occurred during database insertion
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <style>
        /* Your CSS styling here */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
        }

        /* Additional CSS styling for form layout */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input[type="file"] {
            margin-bottom: 10px;
        }

        .form-group input[type="submit"] {
            margin-top: 10px;
        }

        .success-message {
            color: green;
            font-weight: bold;
        }
    </style>
    <script>
        // Your JavaScript code here (if any)
    </script>
</head>
<body>
    <h1>Registration Form</h1>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="babyName">Enter Name of the Baby:</label>
            <input type="text" id="babyName" name="babyName" required>
        </div>

        <div class="form-group">
            <label for="mobileNumber">Enter Your Mobile Number:</label>
            <input type="tel" id="mobileNumber" name="mobileNumber" required>
        </div>

        <div class="form-group">
            <label for="email">Enter Your Email ID:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="babyImage">Upload a Baby Image:</label>
            <input type="file" id="babyImage" name="babyImage" accept="image/*">
        </div>

        <input type="submit" value="Register">
    </form>
</body>
</html>

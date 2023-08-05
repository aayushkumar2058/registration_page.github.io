<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $babyName = $_POST["babyName"];
    $mobileNumber = $_POST["mobileNumber"];
    $email = $_POST["email"];

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

    // Prepare and execute the SQL query to insert the data into the database
    $sql = "INSERT INTO baby_registration (baby_name, mobile_number, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $babyName, $mobileNumber, $email);
    
    if ($stmt->execute()) {
        // Registration successful, redirect to read_data.php
        header("Location: read_data.php");
        exit; // Important to stop further execution after redirection
    } else {
        // Error occurred during database insertion
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

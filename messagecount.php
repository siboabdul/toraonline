<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "toraonline";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch count of messages from the "message" table
$sql = "SELECT COUNT(*) AS messageCount FROM message";
$result = $conn->query($sql);

// Check if there are rows in the result
if ($result->num_rows > 0) {
    // Fetch the count
    $row = $result->fetch_assoc();
    $messageCount = $row["messageCount"];
} else {
    $messageCount = 0;
}

// Close the database connection
$conn->close();
?>

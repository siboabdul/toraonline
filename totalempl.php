<?php
// Database connection parameters
$servername = "localhost"; // replace with your server name
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$dbname = "toraonline"; // replace with your database name

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Count data in the "empl_registration" table
$sql = "SELECT COUNT(*) as total FROM empl_registration";
$result = $conn->query($sql);

// Check if a result was returned
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalData = $row['total'];
    echo "Total data in 'empl_registration' table: " . $totalData;
} else {
    echo "No data found in the 'empl_registration' table.";
}

// Close the database connection
$conn->close();
?>
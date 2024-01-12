<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toraonline";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_errno) {
    die("connection failed:".$conn->connect_error);
}

// Assuming you have already established a database connection

// Query to fetch the count of rows from the table
$query = "SELECT COUNT(*) as total FROM candidates";

// Execute the query
$result = mysqli_query($conn, $query);

// Fetch the result as an associative array
$row = mysqli_fetch_assoc($result);

// Get the total count
$totalCount = $row['total'];

// Display the total count in the HTML
echo '<p class="votes">Numbers: <span id="votes-candidate1">' . $totalCount . '</span></p>';

// Close the database connection
mysqli_close($conn);

?>
<?php
// session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
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

    // Get user input from the form
    $email = $_SESSION[''];
    $cid = $_POST['president'];
    $cid = $_POST['vp'];

    // Check if the user has already voted
    $check_vote_sql = "SELECT * FROM vote WHERE email = '$email'";
    $check_vote_result = $conn->query($check_vote_sql);

    if ($check_vote_result->num_rows > 0) {
        echo "You have already voted.";
    } else {
        // Insert vote into the vote table
        $insert_vote_sql = "INSERT INTO vote (cid, Nid, position, date) 
                            VALUES ('$cid', '$Nid', '$position', NOW())";

        if ($conn->query($insert_vote_sql) === TRUE) {
            echo "Vote submitted successfully";
        } else {
            echo "Error: " . $insert_vote_sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
}
?>

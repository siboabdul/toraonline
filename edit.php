<?php
$database_name = "toraonline";
$server_name = "localhost";
$user_name = "root";
$password = ""; // Replace with your actual password if applicable

$conn = new mysqli($server_name, $user_name, $password, $database_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['Nid'] ?? ''; // Get the ID from the URL parameter

// Fetch user data from the database
$sql = "SELECT * FROM empl_registration WHERE Nid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fname = $row['firstname'];
    $lname = $row['lastname'];
    $dob = $row['dob'];
    $gender = $row['gender'];
    $position = $row['position'];
    $email = $row['email'];
    $password = $row['password'];
    $date = $row['date'];

    header("Location: edit empl.php");
    exit();
} else {
    // echo "No user found with the provided ID.";
    exit;
}

$stmt->close();

if (isset($_POST["submit"])) {
    // Retrieve the updated form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = $_POST['date'];

    // Prepare the SQL statement using a prepared statement
    $sql = "UPDATE empl_registration
    SET firstname = ?,
        lastname = ?,
        dob = ?,
        gender = ?,
        position = ?,
        email = ?,
        password = ?,
        date = ?
    WHERE Nid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $fname, $lname, $dob, $gender, $position, $email, $password, $date, $id);

    if ($stmt->execute()) {
        echo "Update successful.";
        header("Location: dash.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
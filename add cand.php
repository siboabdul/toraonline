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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate required fields
    $required_fields = ['fname', 'lname', 'gender', 'address', 'dob', 'email', 'position'];
    $errors = '';

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors .= $field . ' is required.<br>';
        }
    }

    if (!empty($errors)) {
        echo $errors;
    } else {
        // Get the form data
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $position = $_POST['position'];

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO candidates (fname, lname, gender, address, dob, email, position) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $fname, $lname, $gender,$address, $dob, $email, $position);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "New employee record created successfully.";
        } else {
            if ($stmt->errno === 1062) {
                echo "Error: The email address already exists in the database.";
            } else {
                echo "Error: " . $stmt->error;
            }
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Candidate Form</title>
    <style>
  body {
    background-color: whitesmoke;
  }
 h1{
 text-align: center;
 margin-right: 13%;
 }

  form {
    background-color: silver;
    padding: 70px;
	align: center;
	margin-left:600px;
	width: 300px;
	display: inline-block;
	border-radius:20px;
  }

  .form-group {
    margin-bottom: 10px;
	align: center;
  }

  .form-group label {
    display: block;
    font-weight: bold;
	align: center;
  }

  .form-group input[type="text"],
  .form-group input[type="email"] {
    width: 300px;
    padding: 6px;
    border: 3px solid black;
    border-radius: 3px;
  }

  .form-group select{
    width: 300px;
    padding: 6px;
    border: 3px solid black;
    border-radius: 3px;
  }

  #dob{
    width: 300px;
    padding: 6px;
    border: 3px solid black;
    border-radius: 3px;
  }

  button {
    padding: 20px 40px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }

  button:hover {
    background-color: skyblue;
  }

  input[type="submit"] {
    display: none;
  }
</style>

</head>
<body>
    <h1>Add Candidate</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" placeholder="First name" required>
        </div>

        <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" placeholder="Second name" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <select name="gender" id="gender">
                <option hidden>Select gender</option>
                <option value="m">Male</option>
                <option value="f">Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" placeholder="address" required>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="E_mail" required>
        </div>

        <div class="form-group">
        <label for="gender">position:</label>
            <select name="position" id="position">
                <option hidden>Select position</option>
                <option value="p">prst</option>
                <option value="v">v prst</option>
            </select>
        </div>

        <button type="submit">Submit</button>
    </form>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "toraonline";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the login form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"] ?? '';
            $userPassword = $_POST["password"] ?? '';

            // Sanitize user inputs to prevent SQL injection
            $email = mysqli_real_escape_string($conn, $email);
            $userPassword = mysqli_real_escape_string($conn, $userPassword);

            // Retrieve the name associated with the email and password from the "empl_registration" table
            $sql = "SELECT firstname FROM empl_registration WHERE email = '$email' AND password = '$userPassword'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Assuming you only have one row in the table
                $row = $result->fetch_assoc();
                $firstname = $row["firstname"];
            } else {
                echo "Invalid email or password";
                // You can redirect the user back to the login page or display an error message as needed
            }
        }

        $conn->close();
        ?>
</body>
</html>
 
 
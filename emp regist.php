<!DOCTYPE html>
<html>
<head>
<title> ADD OF employee</title>
<style>
.container {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  border: 3px solid burlywood;
  border-radius: 30PX;
  background-color: TEAL;
}

.container h1 {
  text-align: center;
  background-color: burlywood;
}

.container input[type="text"],
.container input[type="number"],
.container input[type="id"],
.container input[type="date"],
.container input[type="email"],
.container input[type="password"],
.container select {
  width: 100%;
  padding: 20px;
  margin-bottom: 15px;
  border: 3px solid BLACK;
  box-sizing: border-box;
  border-radius: 20px;
  font-size: large;
}

.container input[type="submit"] {
  background-color: #4CAF60;
  color: white;
  padding: 20px 25px;
  border: none;
  cursor: pointer;
  width: 40%;
  border-radius: 10px;
  font-weight: bold;
  font-size: large;
}

.container input[type="submit"]:hover {
  background-color: skyblue;
}

.error-message {
  color: red;
}

.success-message {
  color: green;
}
</style>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Database configuration
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "TORAONLINE";

  // Create a database connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get user input from the form
  $firstName = $_POST['fname'];
  $lastName = $_POST['lname'];
  $idNumber = $_POST['id'];
  $dateOfBirth = $_POST['dob'];
  $gender = $_POST['gender'];
  $position = $_POST['position'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Prepare and bind the SQL statement
  $sql = "INSERT INTO empl_registration (firstname, lastname, Nid, dob, gender, position, email, password)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssisssss", $firstName, $lastName, $idNumber, $dateOfBirth, $gender, $position, $email, $password);

  // Execute the statement
  if ($stmt->execute()) {
    // Data inserted successfully
    echo '<div class="success-message">Registration successful. Redirecting to home page...</div>';
    echo '<script>setTimeout(function() { window.location.href = "dash.php"; }, 0.3s);</script>';
    exit();
  } else {
    // Error inserting data
    echo '<div class="error-message">Error inserting data: ' . $stmt->error . '</div>';
  }

  // Close the statement and database connection
  $stmt->close();
  $conn->close();
}
?>

<div class="container">
  <div>
    <h1>ADD VOTER</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" onsubmit="return validateForm()">
      <input type="text" name="fname" placeholder="First Name" required>
      <input type="text" name="lname" placeholder="Last Name" required>
      <input type="number" name="id" placeholder="ID Number" required>
      <input type="date" name="dob" placeholder="Date of Birth" required>
      <select name="gender" required>
        <option value="" disabled selected>Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
      <input type="text" name="position" placeholder="Position" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" value="ADD">
    </form>
  </div>
</div>

<script>
function validateForm() {
  var firstName = document.forms[0]["fname"].value;
  var lastName = document.forms[0]["lname"].value;
  var idNumber = document.forms[0]["id"].value;
  var dateOfBirth = document.forms[0]["dob"].value;
  var gender = document.forms[0]["gender"].value;
  var position = document.forms[0]["position"].value;
  var email = document.forms[0]["email"].value;
  var password = document.forms[0]["password"].value;

  if (firstName === "" || lastName === "" ||I apologize for the incomplete response. Here's the remaining part of the JavaScript validation code:


  if (firstName === "" || lastName === "" || idNumber === "" || dateOfBirth === "" || gender === "" || position === "" || email === "" || password === "") {
    alert("Please fill in all fields.");
    return false;
  }

  return true;
}
</script>
</body>
</html>
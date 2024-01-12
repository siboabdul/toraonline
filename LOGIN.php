<?php
session_start();

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
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  // Prepare and bind the SQL statement
  $sql = "SELECT * FROM empl_registration WHERE email = ? AND password = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("si", $email, $password);

  // Execute the statement
  $stmt->execute();

  // Fetch the result
  $result = $stmt->get_result();
  // Check if the user exists
  if ($result->num_rows == 1) {
    // User found, do further processing
    // ...

    // Redirect to a different page after successful login

    $_SESSION['email'] = $email;

    header("Location: vote.php");
    exit();
  } else {
    // User not found or invalid credentials
    //echo "Invalid ,email or password.";
  }

  // Close the statement and database connection
  $stmt->close();
  $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-UA-compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>user login PAGE</title>
<style>
/* Reset default styles */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

/* Global styles */
body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
}

.wrapper {
  max-width: 500px;
  margin-top: 180px;
  margin-left: 650px;
  padding: 40px;
  background-color: rgba(255, 255, 255, 0.7);
  border-radius: 5px;
}

h2.logo {
  text-align: center;
  font-size: 24px;
  color: #333;
  margin-bottom: 20px;
}

form {
  padding: 20px;
}

h2 {
  font-size: 20px;
  color: #333;
  margin-bottom: 20px;
}

.input-box {
  margin-bottom: 20px;
  position: relative;
}

.input-box input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

.input-box label {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #999;
  pointer-events: none;
  transition: all 0.3s ease;
}

.input-box input:focus + label,
.input-box input:valid + label {
  top: 0;
  transform: translate(-50%, -90%);
  font-size: 12px;
  color: #333;
}

.remember-forgot {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
  font-size: 14px;
  color: #666;
}

.remember-forgot input[type="checkbox"] {
  margin-right: 5px;
}

.btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #333;
  color: #fff;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}
.login-register {
  text-align: center;
  margin-top: 20px;
  font-size: 14px;
  color: #666;
}

.register-link {
  color: #333;
  font-weight: bold;
 
}
</style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-UA-compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>User Login Page</title>
  <style>
    /* Reset default styles */
    /* ... (existing CSS rules) ... */
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="form-box login">
      <h2 class="logo">Login</h2>
      <form action="login.php" method="POST">
 
        <div class="input-box">
          <input type="email" name="email" required>
          <label>Email</label>
        </div>
        <div class="input-box">
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox" name="remember">Remember me</label>
          <a href="#">Forgot password?</a>
        </div>
        <p><button type="submit" class="btn">LOGIN</button></p>
        <div class="login-register">
          <p>Don't have an account? <a href="emp_regist.html" class="register-link">Register as a member</a></p>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
<script src="script.js"></script>
</body>
</html>
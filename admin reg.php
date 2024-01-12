<?php
// Database configuration
$host = 'localhost'; // Replace with your database host
$dbName = 'toraonline'; // Replace with your database name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

try {
    // Establish the database connection
    $dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    $pdo = new PDO($dsn, $username, $password, $options);

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the form data
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Check if the email already exists in the database
        $query = "SELECT COUNT(*) FROM admin WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            // Email already exists, show an error message or take appropriate action
            echo "Email already exists!";
        } else {
            // Email does not exist, insert the data into the database
            $query = "INSERT INTO admin (email, password) VALUES (:email, :password)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            // Data inserted successfully, show a success message or redirect to another page
            echo "Data inserted successfully!";
        }
    }
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
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
  margin-left: 450px;
  padding: 20px;
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
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div class="wrapper">
    <div class="form-box login">
      <h2 class="logo">ADMIN REG</h2>
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
        <p><button type="submit" class="btn">Submit</button></p>
      </form>
    </div>
  </div>
</body>
</html>
<script src="script.js"></script>
</body>
</html>
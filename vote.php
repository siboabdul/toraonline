<?php
session_start();
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
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Retrieve the name associated with the email and password from the "empl_registration" table
    $sql = "SELECT firstname FROM empl_registration WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Assuming you only have one row in the table
        $row = $result->fetch_assoc();
        $firstname = $row["fname"];
    } else {
        echo "Invalid email or password";
        // You can redirect the user back to the login page or display an error message as needed
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vote page</title>
<style>
  header {
    display: fixed;
    justify-content: space-between;
    align-items: center;
    padding: 5px;
    background-color: whitesmoke;
    width: 100%;
    margin-top: -10px;
  }

  .logo {
    display: flex;
    align-items: center;
  }

  .logo img {
    width: 20px;
    height: 20px;
    margin-right: 10px;
  }

  nav ul {
    list-style-type: none;
    margin: 10px;
    padding: 1px;
    display: flex;
  }

  nav ul li {
    margin-right: 1px;
    padding: 10px;
    font-size: 30px;
  }

  nav ul li a {
    text-decoration: none;
    color: blue;
  }

  nav ul li a:hover {
    padding: 10px;
    text-decoration: none;
    background-color: red;
  }

  .user-info p {
    margin-right: 0px;
    font-size: 30px;
    align-items: right;
  }

  .user-info a {
    text-decoration: none;
    color: violet;
    font-size: 25px;
    font-weight: bold;
  }

  .user-info a:hover {
    background-color: skyblue;
    padding: 30px;
  }

  .container {
    max-width: 70%;
    margin: 0 auto;
    padding: 90px;
    text-align: center;
    background-color: skyblue;
  }

  h1, h2, h3, h4 {
    margin: 0;
    font-weight: bold;
	padding: 20px;
  }

  input[type="text"], input[type="password"], button {
    margin-top: 20px;
    padding: 20px;
  }

  .candidate-card {
  display:inline-block;
    border: 4px solid black;
    border-radius: 5px;
    padding: 100px;
    margin-bottom: 10px;
    background-color: skyblue;
  }

  .voting-section button, .result-section button {
    margin-top: 15px;
    padding: 40px;
    border-radius: 20px;
  }

  .top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: whitesmoke;
  }

  .top-bar h1 {
    margin: 0;
	align: center;
  }

  .sidebar {
    position: fixed;
    top: 80px;
    left: 0;
    width: 200px;
    height: calc(100vh - 80px);
    background-image: linear-gradient(#035949, #012793);
    color: #fff;

    padding: 10px;
  }

  .sidebar ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
  }

  .sidebar ul li {
    margin-bottom: 10px;
    padding: 10px;
    font-size: 30px;
  }

  .sidebar ul li a {
    text-decoration: none;
    color: #fff;
  }
   .submit {
    width: 400px;
    margin-left: 100px;
    padding: 20px;
    background: transparent;
    font-size: 30px;
    font-weight: bold;

  }

  .submit:hover {
    background-color: teal;
  }
</style>
</head>
<body>
<header>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<form action="voteconn.php" method="POST">
  <div class="logo">
    <img src="logo.png" alt="TORAONLINE Logo">
    <h1>TORAONLINE</h1>
  </div>
  <nav>
    <ul>
      <li><a href="home.html"><ion-icon name="home"></ion-icon> Home</a></li>
      <li><a href="#"><ion-icon name="trophy"></ion-icon> Elections</a></li>
      <li><a href="#"><ion-icon name="podium"></ion-icon> Results</a></li>
    </ul>
  </nav>
  <div class="user-info">
    <p>Welcome, <?php echo $_SESSION['email'];?></p>
    <a href="#"><ion-icon name="log-out"></ion-icon> Logout</a>
  </div>
</header>
<div class="container">

  <h2>Complete Your Vote</h2>
  <div class="candidate-card">
    <h3>President</h3>
    <p>Business: XYZ</p>
    <p>Experience: 10 years</p>
    <form>
    <select name="president" placeholder="choose president">
    <option value="" disabled selected hidden>choose president</option>
    <?php
    $host = 'localhost';
    $db = 'toraonline';
    $user = 'root';
    $password = '';

    $conn = new mysqli($host, $user, $password, $db);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $position = 'p'; // Set the position to 'p' for president, or adjust as needed

    $sql = "SELECT fname, lname FROM candidates WHERE position = '$position'";
    $result = $conn->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $candidateName = $row['fname'] . ' ' . $row['lname'];
            echo "<option value=\"$candidateName\">$candidateName</option>";
        }
    } else {
        echo 'Query failed: ' . $conn->error;
    }

    $conn->close();
    ?>
  </select>

    </form>
  </div>
  <div class="candidate-card">
    <h3>Vice President</h3>
    <p>Business: XYZ</p>
    <p>Experience: 8 years</p>
    <form>
    <select name="vp" placeholder="choose president">
    <option value="" disabled selected hidden>choose vice president</option>
    <?php
    $host = 'localhost';
    $db = 'toraonline';
    $user = 'root';
    $password = '';

    $conn = new mysqli($host, $user, $password, $db);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $position = 'v'; // Set the position to 'p' for president, or adjust as needed

    $sql = "SELECT fname, lname FROM candidates WHERE position = '$position'";
    $result = $conn->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $candidateName = $row['fname'] . ' ' . $row['lname'];
            echo "<option value=\"$candidateName\">$candidateName</option>";
        }
    } else {
        echo 'Query failed: ' . $conn->error;
    }

    $conn->close();
    ?>
  </select>


    </form>
  </div>
  
  <button onclick="submitVote()" class="submit">
   <?php 
   
   include("voteconn.php");
   
   ?>
  VOTE</button>
 

</div>
<script>
  function submitVote() {
    const president = document.querySelector('select[name="president"]').value;
    const vp = document.querySelector('select[name="vp"]').value;
    

    alert("Thank you for voting!\n\nYour selections:\n\nPresident: " + president + "\nVice President: " + vp);
  }
</script>

<script>
$(document).ready(function() {
  $('.vote-button').on('click', function() {
    var position = $(this).data('position');
    var fname = $(this).data('fname');
    var lname = $(this).data('lname');
    
    // Make an AJAX request to submit the vote
    $.ajax({
      url: 'vote_process.php',
      type: 'POST',
      data: {
        position: position,
        candidate_fname: fname,
        candidate_lname: lname
      },
      success: function(response) {
        console.log(response); // Display the response from the server
        // Handle the response as needed, e.g., display a success message
      },
      error: function(xhr, status, error) {
        console.log(error); // Display the error message
        // Handle the error as needed
      }
    });
  });
});
</script>
</script>
</body>
</html>
<?php

include("messagecount.php");
include("total.php");
include("totalempl.php");

?>





<!DOCTYPE html>
<html>
<head>
  <title>empl list</title>
  <style>
    body {
      margin-top: 50px;
      padding: 0;
	  margin-left:0px;
      font-family: Arial, sans-serif;
    }

    .navbar {
	position: fixed;
	margin-left: 270px;
	margin-right:0px;
	margin-top: -110px;
	width: 85%;
  background-color: teal;

  padding: 20px;
  display: flex;
  justify-content: space-between;
  font-size: 30px;
  font-weight: 300;
}

    .navbar div {
      display: flex;
      align-items: center;
    }

    .navbar span {
      margin-right: 10px;
    }

    .search {
  margin-right: 200px;
  width: 20%;
  border: 5px solid black;
  padding: 5px;
  text-align: reft;
  border-radius: 7px;
}

    .logout a{
	position: flex;
	margin-right: 60px;
	align-items: center;
	background-color:black;
}


    /* Sidebar styles */
    .sidebar {
  position: fixed;
  width: 250px;
  background-color:  teal;
  padding: 10px;
  height: 100%;
  margin-top: -110px;
}

.sidebar ul li{
  list-style: none;
}

.sidebar a {
  display: block;
  margin-top: 25px;
  color: white;
  text-decoration: none;
  font-size: 20px;
  font-weight: bold;
  position: relative;
  transition: background-color 0s ease;
}

.sidebar a:hover {
  background-color:silver;
  color: white;
  border-radius: 7px;
  width: 85%;
 padding: 10px;
  
}

.sidebar ul li{
  list-style: none;
}
    /* Main content styles */
.main {
	position: flex;
	margin-left: 40px;
  padding: 40px;
  display: flex;
  flex-wrap: wrap;
  justify-content: right;
  align-items: right;
}

.submenu span{
    background: red;
    color: #ddd;
    padding: 6px;
    border-radius: 1rem;
    font-size: 20px;
}

/* Card styles */
.card {
      background-color:whitesmoke;
  padding-left: 10px;
  margin-top: 70px;
  margin-left: 60px;
  width: 300px;
  text-align: left;
  font-size: 40px;
  border-radius: 30px;
}

.card h3 {
  font-size: 24px;
  margin-bottom: 10px;
}
.h4{
	margin-left: 70px;
	margin-top: 40px;
	text-align: center;
	font-size: 30px;
}

/* Ionicons styles */
.ion-lg {
  font-size: 60px;
}

    /* Table styles */
    table {
      border: 1px;
      width: 80%;
	  margin-left: 300px;
	  margin-right: 400px;
	  border-radius: 20px;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 2px solid #ddd;
    }

    th {
      background-color: teal;
      color: white;
    }

  </style>
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="navbar">
    <div>
        <span class="ion-ios-analytics ion-lg"></span>
        <div>ADMIN CONTROL PANEL</div>
    </div>
    <div class="search">
        <input type="text" placeholder="Search..........">
    </div>
    <div class="logout">
        <a href="#"><ion-icon name="log-out"></ion-icon> log Out</a>
    </div>
</div>

<div class="sidebar">
    <form action="messagecount.php" method="POST">
    <a href="dash.php"><ion-icon name="home"></ion-icon> Home</a>
    <h4>manage candidate</h4>
    <a href="candidate list.php" target="_self"><ion-icon name="podium"></ion-icon> All Candidates</a>
    <ul class="submenu">
        <li><a href="add cand.php"><ion-icon name="add"></ion-icon> Add</a></li>
    </ul>
    <h4>manage employees</h4>
    <a href="empl list.php" target="_self"><ion-icon name="podium"></ion-icon> All employees</a>
    <ul class="submenu">
        <li><a href="emp regist.php"><ion-icon name="add"></ion-icon> Add</a></li>
    </ul>
    <h4>ALL DEPARTMENT</h4>
    <ul class="submenu">
        <li><a href="#"><ion-icon name="add"></ion-icon> Add</a></li>
        <li><a href="#"><ion-icon name="create"></ion-icon> Edit</a></li>
        <li><a href="#"><ion-icon name="trash"></ion-icon> Delete</a></li>
    </ul>
    <h4>block candidates</h4>
    <ul class="submenu">
        <li><a href="#"><ion-icon name="lock-closed"></ion-icon> Block</a></li>
        <li><a href="#"><ion-icon name="lock-open"></ion-icon> Unblock</a></li>
    </ul>
    <h4>system</h4>
    <ul class="submenu">
        <li><a href="#"><ion-icon name="settings"></ion-icon> Settings</a></li>
        <li><a href="#"><ion-icon name="notifications"></ion-icon> Notifications</a></li>
        <li><a href="message.php"><i class='bx bx-envelope'></i> Messages <span><?php echo $messageCount; ?></span></a></li>
        <li><a href="#"><ion-icon name="podium"></ion-icon> Results</a></li>
      </ul>
</div>
  
  <div class="main">
    <form action="totalempl.php" method="POST">
    <div class="card">
      <h3><ion-icon name="person"></ion-icon> all candidates</h3>
     <h3>XYZ business</h3>
      <p class="votes">Numbers: <span id="votes-candidate1"><?php echo $totalCount; ?></span></p>
    </div>
   <div class="card">
      <h3><ion-icon name="person"></ion-icon> inactive candidate</h3>
      <h3>XYZ business</h3>
      
      <p class="votes">Numbers: <span id="votes-candidate2">00</span></p>
    </div>
    
    <div class="card">
      <h3><ion-icon name="person"></ion-icon>all employees</h3>
      <h3>XYZ business</h3>
     
      <p class="votes">Numbers: <span id="votes-candidate3"><?php echo $totalData; ?></span></p>
    </div>
    
    <div class="card">
      <h3><ion-icon name="person"></ion-icon> all departments</h3>
      <h3>XYZ business</h3>
      
      <p class="votes">Numbers: <span id="votes-candidate4">00</span></p>
    </div>
  </div> 
  <div class="h4">
    <h4> ALL VOTERS</h4>
  </div>
   
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toraonline";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Edit Employee
if (isset($_POST['edit'])) {
    $nid = $_POST['nid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = $_POST['date'];

    $sql = "UPDATE empl_registration SET firstname='$firstname', lastname='$lastname', dob='$dob', gender='$gender', position='$position', email='$email', password='$password', date='$date' WHERE Nid=$nid";

    if ($conn->query($sql) === TRUE) {
        echo "Employee updated successfully";
    } else {
        echo "Error updating employee: " . $conn->error;
    }
}

// Delete Employee
if (isset($_GET['delete'])) {
    $nid = $_GET['delete'];

    $sql = "DELETE FROM empl_registration WHERE Nid=$nid";

    if ($conn->query($sql) === TRUE) {
        echo "Employee deleted successfully";
    } else {
        echo "Error deleting employee: " . $conn->error;
    }
}

$sql = "SELECT Nid, firstname, lastname, dob, gender, position, email, password, date FROM empl_registration";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>Nid</th>
            <th>FirstName</th>
            <th>Lastname</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Position</th>
            <th>Email</th>
            <th>Password</th>
            <th>Date</th>
            <th>Action</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Nid"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "<td>" . $row["dob"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["position"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "<td>" . $row["date"] . "</td>";
        echo "<td>
                <a href='edit empl.php?nid=" . $row["Nid"] . "'>Edit</a>
                <a href='?delete=" . $row["Nid"] . "' onclick='return confirm(\"Are you sure you want to delete this employee?\")'>Delete</a>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
  </div>

 
</body>
</html>
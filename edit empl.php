<?php

include("edit.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 6%;
    }

    h1 {
      text-align: center;
      margin-top: 0;
    }

    form {
      display: grid;
      gap: 15px;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"],
    input[type="email"],
    input[type="password"],
    select {
      width: 100%;
      padding: 20px;
      border: 2px solid teal;
      border-radius: 10px;
    }

    select {
      appearance: none;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-weight: bold;
      font-size: 20px;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>

</head>
<body>
<div class="container">
  <div>
    <h1>EDIT VOTER INFO</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" onsubmit="return validateForm()">
    <form action="edit.php" method="POST">
      <input type="text" name="fname" placeholder="First Name" values="<?php echo $firstname; ?>"  required>
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
      <input type="submit" value="Update">
    </form>
  </div>
</div>
</body>
</html>
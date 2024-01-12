<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
  <table>
  <tr>
        <th>Nid</th>
        <th>FirstName</th>
		<th>lastname</th>
        <th>dob</th>
        <th>gender</th>
        <th>position</th>
        <th>Email</th>
        <th>password</th>
        <th>date</th>
      </tr><br/>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "toraonline";

     $conn = mysqli_connect($servername,$username,$password,$dbname);
      if($conn->connect_error)
       {
        die("connection failed:".$conn->connect_error);
       }

       $sql = "SELECT Nid, firstname, lastname, dob, gender, position, email, password, date FROM empl_registration";
       $result = $conn->query($sql);
       if($result-> num_rows > 0)
       {
        while($row = $result->fetch_assoc())
         {
          echo "<tr><td>".$row["Nid"]."</td><td>".$row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["dob"]."</td><td>".$row["gender"]."</td><td>".$row["position"]."</td><td>".$row["email"]."</td><td>".$row["password"]."</td><td>".$row["date"]."</tr></td>";
         }

       echo "</table>";
       }
       else{
        echo "0 result";
       }

       $conn->close();

    ?>
  </table>
</body>
</html>
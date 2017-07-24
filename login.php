<?php
$servername = "localhost";
$username = "root";
$password = "june1106";
$dbname = "MyDatabase";


$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS MyDatabase";
if ($conn->query($sql) === TRUE) {
  $conn = new mysqli($servername, $username, $password, $dbname);

  $sql = "CREATE TABLE IF NOT EXISTS student (
  FirstName VARCHAR(30) NOT NULL,
  LastName VARCHAR(30) NOT NULL,
  Username VARCHAR(50) PRIMARY KEY,
  password VARCHAR(30)
  )";

  if ($conn->query($sql) === TRUE) {
      $sql = "SELECT Username , password FROM student";
      $result = $conn->query($sql);
      if($_POST["USER"]==''||$_POST["PASS"]=='')
      {
        header("Location: loginInvalid.html");
        exit;
      }
      if($result->num_rows > 0)
      {
        while($row=$result->fetch_assoc())
        {
          if($row["Username"]==$_POST["USER"]&& $row["password"]==$_POST["PASS"])
                {
                  header("Location: MainPage.html");
                  exit;
                }
        }
        header("Location: loginFailed.html");
      }
      else {
        header("Location: loginFailed.html");
      }
    } else {
      echo "Error in connection: " . $conn->error;
    }
} else {
   echo $conn->error;
}
$conn->close();
?>

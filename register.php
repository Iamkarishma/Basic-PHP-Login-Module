<?php
$servername = "localhost";
$username = "root";
$password = "june1106";
$dbname = "MyDatabase";

$conn = new mysqli($servername, $username, $password);
$sql = "CREATE DATABASE IF NOT EXISTS MyDatabase";
$conn->query($sql);
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE IF NOT EXISTS student (
FirstName VARCHAR(30) NOT NULL,
LastName VARCHAR(30) NOT NULL,
Username VARCHAR(50) PRIMARY KEY,
password VARCHAR(30)
)";

$conn->query($sql);
$fname=$_POST["FNlogin"];
$lname=$_POST["LNlogin"];
$username=$_POST["USERlogin"];
$password=$_POST["PASSlogin"];

if($fname==''||$lname=='' ||$username==''||$password=='')
{
  header("Location: regInvalid.html");
  exit;
}

$sql="INSERT INTO student (FirstName,LastName,Username,password) VALUES ('$fname','$lname','$username','$password')";
if ($conn->query($sql) === TRUE) {
   header("Location: regDone.html");
} else {
  header("Location: regFailed.html");
}

$conn->close();

 ?>

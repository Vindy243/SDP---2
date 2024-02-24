<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "gbackend";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//retrieve form data
$Username=$_POST['username'];
$Password=$_POST['password'];
$Email =$_POST['email'];

$sql= "INSERT INTO signin(Username,Password, Email) VALUES ('$Username','$Password','$Email')";

if ($conn->query($sql)==TRUE)
{
header("Location:index.html");
exit; 
}

else{
    echo "Error:".$sql."<br>".$conn->error;
}

$conn->close();
?>
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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Fetch user data from the database
    $sql = "SELECT email, password FROM signin WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        header("Location:index.html");
        exit; 
    } else {
        echo "Invalid email or password";
    }
}

$conn->close();
?>

<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seat_cafe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM authorization WHERE username = '$user' AND password = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Valid credentials
    $_SESSION['username'] = $user;
    header("Location: home.php"); // Redirect to a dashboard page
} else {

    $_SESSION['error'] = "Invalid username or password.";
    header("Location: index.php?error=1"); // Redirect back to the login page with error parameter
    exit();
}

$conn->close();
?>

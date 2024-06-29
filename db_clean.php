<?php
$authorized = true; // Example: Check user permissions

if (!$authorized) {
    echo "You are not authorized to perform this action.";
    exit;
}

$hostname = 'localhost';
$username = 'root';
$password = '';
$database_name = 'seat_cafe';

// Create connection
$conn = new mysqli($hostname, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to delete all records from the daily_transactions table
$deleteSql = "DELETE FROM daily_transactions";

// Execute the delete query
if ($conn->query($deleteSql) === TRUE) {
    echo "All records have been deleted from the database.<br>";
    
    // SQL query to reset auto-increment ID to 1
    $alterSql = "ALTER TABLE daily_transactions AUTO_INCREMENT = 1";

    // Execute the alter table query
    if ($conn->query($alterSql) === TRUE) {
        echo "Auto-increment ID reset to 1 successfully.<br>";
        header("Location: home.php");
    } else {
        echo "Error resetting auto-increment ID: " . $conn->error . "<br>";
    }
} else {
    echo "Error deleting records: " . $conn->error . "<br>";
}

// Close the database connection
$conn->close();
?>
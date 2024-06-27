<?php
// Database connection parameters
$hostname = 'localhost';
$username = 'your_username';
$password = 'your_password';
$database_name = 'your_database';

// Connect to MySQL database
$conn = new mysqli($hostname, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the cutoff date (example: records older than 30 days)
$cutoffDate = date('Y-m-d', strtotime('-30 days'));

// SQL query to delete records older than the cutoff date
$sql = "DELETE FROM your_table WHERE transaction_date < '$cutoffDate'";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Records older than $cutoffDate have been cleaned from the database.";
} else {
    echo "Error cleaning records: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

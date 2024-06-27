<?php
// Database connection parameters
$hostname = 'localhost';
$username = 'root';
$password = '';
$database_name = 'seat_cafe';

// Create connection
$conn = new mysqli($hostname, $username, $password, $database_name);

// Insert new transaction if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transaction_date = date('Y-m-d');
    $cash = isset($_POST['cash']) ? floatval($_POST['cash']) : 0;
    $card = isset($_POST['card']) ? floatval($_POST['card']) : 0;
    $expenditure = isset($_POST['expenditure']) ? floatval($_POST['expenditure']) : 0;
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';

    // Calculate total
    $total = $cash + $card;

    // Insert into database
    $sql_insert = "INSERT INTO daily_transactions (cash, card, total, expenditure, comment)
                   VALUES ('$cash', '$card', '$total', '$expenditure', '$comment')";

    if ($conn->query($sql_insert) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

?>
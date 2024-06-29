<?php
require_once 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing data for the record
    $sql = "SELECT * FROM daily_transactions WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Update the record
        $transaction_date = $_POST['transaction_date'];
        $cash = $_POST['cash'];
        $card = $_POST['card'];
        $total = $_POST['total'];
        $expenditure = $_POST['expenditure'];
        $comment = $_POST['comment'];

        $sql = "UPDATE daily_transactions SET transaction_date = ?, cash = ?, card = ?, total = ?, expenditure = ?, comment = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdddssi", $transaction_date, $cash, $card, $total, $expenditure, $comment, $id);

        if ($stmt->execute()) {
            header('Location: result.php');
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
} else {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link rel="stylesheet" href="./css/style.css?v=1.0">
    <script src="./confirmDelete.js"></script>
</head>
<body>
    <header>
        <h1>Edit Record</h1>
    </header>
    
    <div class="container">
        <div class="sidebar">
            <h2>Seat Cafe</h2>
            <form method="post" action="result.php">
                <button type="submit" name="submit" value="view_results">View Results</button>
            </form>
            <form method="post" action="generate.php">
                <button type="submit" name="submit" value="download_pdf">Download PDF</button>
            </form>
            <form method="post" action="db_clean.php" onsubmit="return confirmDelete();">
                <button type="submit" name="submit" value="remove_records">Remove All Records</button>
            </form>
        </div>
        <div class="content">
            <form method="POST" action="" autocomplete="off">
                <div class="form-group">
                    <label for="transaction_date">Date:</label>
                    <input type="date" id="transaction_date" name="transaction_date" value="<?php echo $row['transaction_date']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="cash">Cash:</label>
                    <input type="text" id="cash" name="cash" value="<?php echo $row['cash']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="card">Card:</label>
                    <input type="text" id="card" name="card" value="<?php echo $row['card']; ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" id="total" name="total" value="<?php echo $row['total']; ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="expenditure">Expenditure:</label>
                    <input type="text" id="expenditure" name="expenditure" value="<?php echo $row['expenditure']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea id="comment" name="comment"><?php echo $row['comment']; ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Update Record</button>
                </div>
            </form>
          
            </div>
        </div>
    </div>
</body>
</html>

<?php
require_once 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record
    $sqlDelete = "DELETE FROM daily_transactions WHERE id = ?";
    $stmtDelete = $conn->prepare($sqlDelete);
    $stmtDelete->bind_param("i", $id);

    if ($stmtDelete->execute()) {
        // Reset auto-increment to fill gaps
        $sqlResetAutoIncrement = "ALTER TABLE daily_transactions AUTO_INCREMENT = 1";
        if ($conn->query($sqlResetAutoIncrement) === TRUE) {
            header('Location: result.php');
            exit();
        } else {
            echo "Error resetting auto-increment: " . $conn->error;
        }
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    header('Location: home.php');
    exit();
}
?>

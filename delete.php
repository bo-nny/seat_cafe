<?php
require_once 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Confirm deletion using JavaScript
    echo "<script>";
    echo "if (confirm('Are you sure you want to delete this record?')) {";
    echo "    window.location.href = 'delete_confirm.php?id=$id';";
    echo "} else {";
    echo "    window.location.href = 'result.php';";  
    echo "}";
    echo "</script>";
    
} else {
    header('Location: home.php');
    exit();
}
?>

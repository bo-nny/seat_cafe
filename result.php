<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Results</title>
  <link rel="stylesheet" href="./css/result_styles.css">

</head>
<body>
  
 <!-- Heading -->
 <h1 style="text-align: center;">Monthly Records</h1>
 
 <!-- Display data from database in a table -->
 <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Cash</th>
            <th>Card</th>
            <th>Total</th>
            <th>Expenditure</th>
            <th>Comment</th>
            <th>Action</th> <!-- New column for Edit button -->
        </tr>
    </thead>
    <tbody>
         
        <?php
         require_once 'db.php';

        // SQL query to select all data from the table
        $sql = "SELECT * FROM daily_transactions";

        // Execute the query
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['transaction_date'] . "</td>";
                echo "<td>" . $row['cash'] . "</td>";
                echo "<td>" . $row['card'] . "</td>";
                echo "<td>" . $row['total'] . "</td>";
                echo "<td>" . $row['expenditure'] . "</td>";
                echo "<td>" . $row['comment'] . "</td>";
                echo "<td class = 'action-button'><a class='edit-button' href='edit.php?id=" . $row['id'] . "'>Edit</a> <a class='delete-button' href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
                echo "</tr>";
                
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No results found</td></tr>";
        }
        ?>
    </tbody>
 </table>
        
        <!-- Button to go back to home page -->
 <div  class="back-button">
    <a href="home.php">Back to Home</a>
 </div>
        
<?php
$conn->close();
?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Transactions</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./confirmDelete.js"></script>
</head>
<body>

    <div class="container">
        <header>
            <h1>Seat Cafe LogBook</h1>
        </header>

        <!-- Form to insert new transaction -->
        <form method="POST" action="process.php">
            <div class="form-group">
                <label for="cash">Cash:</label>
                <input type="text" id="cash" name="cash" required>
            </div>
            <div class="form-group">
                <label for="card">Card:</label>
                <input type="text" id="card" name="card" required>
            </div>
            <div class="form-group">
                <!-- <label for="total" hidden>Total:</label> -->
                <input type="text" id="total" name="total" hidden>
            </div>
            <div class="form-group">
                <label for="expenditure">Expenditure:</label>
                <input type="text" id="expenditure" name="expenditure" required>
            </div>
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea id="comment" name="comment"></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Add Transaction</button>

            </div>
        </form>


</div>
            <!-- <form method="post" action="generate.php">
                <div class="form-group-2">
                <button type="submit" name="submit" value="download_pdf">Download PDF</button>
                <button type="submit" name="submit" value="remove_records" class="remove-records-button">Remove All Records</button>
                </div>
            </form> -->

            <div class="button-container">
        <form method="post" action="generate.php">
            <button type="submit" name="submit" value="download_pdf" class="download-button">Download PDF</button>
        </form>
        <form method="post" action="db_clean.php" onsubmit="return confirmDelete();">
            <button type="submit" name="submit" value="remove_records" class="remove-button">Remove All Records</button>
        </form>
    </div>

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
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'process.php';
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
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No results found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
    <?php
    // Close the connection
    $conn->close();
    ?>
</body>
</html>


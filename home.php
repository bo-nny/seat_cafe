<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Record Management</title>
    <link rel="stylesheet" href="./css/style.css?v=1.0">
    <script src="./confirmDelete.js"></script>
</head>
<body>
    <header>
        <h1>Seat Cafe LogBook</h1>
    </header>
    
        <div class="log-out">
            <button type="button" onclick="window.location.href='index.php'">Log Out</button>
        </div>

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
            <form method="POST" action="process.php" autocomplete="off">
                <div class="form-group">
                    <label for="cash">Cash:</label>
                    <input type="text" id="cash" name="cash" required>
                </div>
                <div class="form-group">
                    <label for="card">Card:</label>
                    <input type="text" id="card" name="card" required>
                </div>
                <div class="form-group">
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
                    <button type="submit">Save Record</button>
                </div>
                
            </form>
        </div>
    </div>

</body>
</html>
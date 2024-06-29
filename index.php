
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Login</title>
    <link rel="stylesheet" href="./css/login_styles.css"> 
    <script src="./confirmDelete.js"></script>

    
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <img src="./images/pexels-nishess-shakya-401526881-15076694.jpg" alt="Cafe Logo">
        </div>
        <div class="form-container">
            <h2>Login</h2>

            
            <?php
            session_start();
            if (isset($_SESSION['error'])) {
                echo "<p class='error-message'>" . $_SESSION['error'] . "</p>";
                unset($_SESSION['error']);
            }
            ?>
            

            <form method="POST" action="authorization.php" autocomplete="off">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <button type="submit">Login</button>
                </div>

            </form>
        </div>
    </div>
</body>
</html>

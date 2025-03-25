<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome to Match My Pet</h1>

    <nav>
        <a href="index.php">Home</a>
        <a href="adopt.php">Adopt</a>
        <a href="shelters.php">Shelters</a>
        <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a> | <a href="register.php">Register</a>
            <?php endif; ?>
    </nav>

    <p>Find the Pet of Your Dreams!</p>
    
    <a href="view_pets.php">View Pets</a>

    <?php if (isset($_SESSION['user_id'])): ?>
        <p>Welcome, User! <a href="logout.php">Logout</a></p>
        <a href="adopt.php">Start Adopting</a>
    <?php else: ?>
        <p><a href="login.php">Login</a> | <a href="register.php">Register</a></p>
    <?php endif; ?>
    
    <footer>© 2025 Pet Adoption Website</footer>
</body>
</html>

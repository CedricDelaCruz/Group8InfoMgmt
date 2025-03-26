<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match My Pet - Home</title>
    <link rel="stylesheet" href="/pet_adoption/css/styles.css">
</head>
<body>
    <header>
        <h1>🐶 Match My Pet 🐱</h1>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="adopt.php">Adopt</a>
        <a href="shelters.php">Shelters</a>
        <a href="about.php">About Us</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a> | <a href="register.php">Register</a>
        <?php endif; ?>
    </nav>

    <div class="hero">
        <h2>Find the Pet of Your Dreams!</h2>
    </div>

    <section class="content">
        <p>Ready for a new furry friend in your home?</p>
        <a class="btn" href="view_pets.php">View Pets</a>
    </section>

    <?php if (isset($_SESSION['user_id'])): ?>
        <section class="user-section">
            <p>Welcome, User! <a class="btn" href="logout.php">Logout</a></p>
            <a class="btn" href="adopt.php">Start Adopting</a>
        </section>
    <?php else: ?>
        <section class="guest-section">
            <p><a class="btn" href="login.php">Login</a> | <a class="btn" href="register.php">Register</a></p>
        </section>
    <?php endif; ?>
    
    <footer>© 2025 Pet Adoption Website</footer>
</body>
</html>
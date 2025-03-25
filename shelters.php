<?php
session_start();
include 'db.php';

$sql = "SELECT * FROM shelters";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shelters</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Registered Pet Shelters</h1>
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
    </header>

    <section class="shelter-list">
        <h2>Available Shelters</h2>
        <?php if ($result->num_rows > 0): ?>
            <ul>
                <?php while ($shelter = $result->fetch_assoc()): ?>
                    <li>
                        <h3><?php echo htmlspecialchars($shelter['name']); ?></h3>
                        <p><strong>Location:</strong> <?php echo htmlspecialchars($shelter['location']); ?></p>
                        <p><strong>Contact:</strong> <?php echo htmlspecialchars($shelter['contact']); ?></p>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No shelters found.</p>
        <?php endif; ?>
    </section>

    <footer>
        <p>&copy; 2025 Pet Adoption Website</p>
    </footer>
</body>
</html>

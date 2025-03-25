<?php
session_start();
require 'db.php';

$sql = "SELECT * FROM pets";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Pets</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Available Pets for Adoption</h2>
    <a href="index.php">Back to Home</a>

    <div class="pets-container">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="pet-card">
                    <h3><?= htmlspecialchars($row['name']) ?></h3>
                    <p><strong>Breed:</strong> <?= htmlspecialchars($row['breed']) ?></p>
                    <p><strong>Age:</strong> <?= htmlspecialchars($row['age']) ?> years</p>
                    <p><?= htmlspecialchars($row['description']) ?></p>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="adopt.php?pet_id=<?= $row['id'] ?>" class="adopt-btn">Adopt</a>
                    <?php else: ?>
                        <p><a href="login.php">Login</a> to adopt this pet.</p>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No pets available for adoption at the moment.</p>
        <?php endif; ?>
    </div>
</body>
</html>

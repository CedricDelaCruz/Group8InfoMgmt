<?php include 'auth_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt a Pet</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Meet Our Pets</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="adopt.php">Adopt</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <section class="pet-list">
        <h2>Available Pets</h2>
        <div id="pets-container"></div>
    </section>

    <footer>
        <p>&copy; 2025 Pet Adoption Website</p>
    </footer>
</body>
</html>

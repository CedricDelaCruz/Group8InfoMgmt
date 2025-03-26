<?php
session_start();
include 'db.php';

$message = "";

if (isset($_GET['message']) && $_GET['message'] == "not_logged_in") {
    $message = "You must be logged in to adopt a pet.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "No user found with this email!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match My Pet - Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>🐶 Match My Pet 🐱</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="adopt.php">Adopt</a>
            <a href="shelters.php">Shelters</a>
            <a href="about.php">About Us</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </nav>
    </header>

    <section class="login-form">
        <h2>Login to Your Account</h2>
        
        <?php if (!empty($message)): ?>
            <p class="error-message"><?= $message ?></p>
        <?php endif; ?>

        <?php if (isset($error)) echo "<p class='error-message'>$error</p>"; ?>
        
        <form action="" method="POST" class="form-container">
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </section>

    <p class="register-link">Don't have an account? <a href="register.php">Register here</a></p>
    
    <footer>
        <p>&copy; 2025 Pet Adoption Website</p>
    </footer>
</body>
</html>

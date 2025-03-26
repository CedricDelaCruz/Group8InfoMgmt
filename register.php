<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $user_type = $_POST['user_type'];

    $sql = "INSERT INTO users (name, email, password, phone, address, user_type) VALUES ('$name', '$email', '$password', '$phone', '$address', '$user_type')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php?message=registered");
        exit();
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match My Pet - Register</title>
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

    <section class="register-form">
        <h2>Create an Account</h2>
        
        <?php if (isset($error)) echo "<p class='error-message'>$error</p>"; ?>
        
        <form action="" method="POST" class="form-container">
            <label>Name:</label>
            <input type="text" name="name" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <label>Phone Number:</label>
            <input type="text" name="phone" required>
            <label>Address:</label>
            <textarea name="address" required></textarea>
            <label>User Type:</label>
            <select name="user_type" required>
                <option value="Adopter">Adopter</option>
                <option value="ShelterAdmin">Shelter Admin</option>
            </select>
            <button type="submit">Register</button>
        </form>
    </section>

    <p class="login-link">Already have an account? <a href="login.php">Login here</a></p>
    
    <footer>
        <p>&copy; 2025 Pet Adoption Website</p>
    </footer>
</body>
</html>

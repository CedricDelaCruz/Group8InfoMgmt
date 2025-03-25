<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=You must be logged in to adopt a pet.");
    exit();
}
?>

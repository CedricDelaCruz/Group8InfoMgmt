<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $pet_id = $_POST['pet_id'];
    $comments = $_POST['comments'];

    $sql = "INSERT INTO adoption_applications (user_id, pet_id, comments) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $user_id, $pet_id, $comments);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Application submitted successfully!"]);
    } else {
        echo json_encode(["error" => "Failed to submit application!"]);
    }

    $stmt->close();
    $conn->close();
}
?>

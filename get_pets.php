<?php
include 'db.php';

$sql = "SELECT * FROM pets";
$result = $conn->query($sql);

$pets = [];
while ($row = $result->fetch_assoc()) {
    $pets[] = $row;
}

header('Content-Type: application/json');
echo json_encode($pets);
?>

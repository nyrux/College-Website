<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../../php/config.php';

$type = $_POST['for'];
$status = "pending";
if (!$type) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Type parameter missing']);
    exit;
}

$requests = [];
$result = $conn->query("SELECT * FROM users WHERE status = '$status' AND role = '$type'");
if (!$result) {
    header('Content-Type: application/json');
    echo json_encode(['error' => $conn->error]);
    exit;
}

while ($row = $result->fetch_assoc()) {
    $requests[] = $row;
}

echo json_encode($requests);
?>

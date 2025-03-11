<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../php/config.php';

$type = $_POST['type'] ?? null;


if (!$type) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Type parameter missing']);
    exit;
}

$requests = [];
if ($type === 'admission') {
    $result = $conn->query("SELECT * FROM admissions_data WHERE status = 'accept'");
    if (!$result) {
        header('Content-Type: application/json');
        echo json_encode(['error' => $conn->error]);
        exit;
    }
} elseif ($type === 'teacher') {
    $result = $conn->query("SELECT * FROM users WHERE status = 'pending' AND role = 'teacher'");
    if (!$result) {
        header('Content-Type: application/json');
        echo json_encode(['error' => $conn->error]);
        exit;
    }
} elseif ($type === 'student') {
    $result = $conn->query("SELECT * FROM users WHERE status = 'accept' AND role = 'student'");
    if (!$result) {
        header('Content-Type: application/json');
        echo json_encode(['error' => $conn->error]);
        exit;
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Invalid type']);
    exit;
}

while ($row = $result->fetch_assoc()) {
    $requests[] = $row;
}


echo json_encode($requests);
?>

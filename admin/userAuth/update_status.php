<?php
include '../../visitor/php/config.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$status = $data['status'];

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$status = $data['status'];

$sql = "UPDATE users SET status = '$status' WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $conn->error]);
}

$conn->close();
?>

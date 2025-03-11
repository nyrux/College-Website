<?php
include '../php/config.php';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$status = $data['status'];

$retrieval = $conn->prepare("SELECT first_name, last_name, image FROM admissions_data WHERE id = ?");
$retrieval->bind_param('s', $id);
$retrieval->execute();
$retrieval->store_result();
$retrieval->bind_result($first_name, $last_name, $image);
$retrieval->fetch();
$retrieval->close();

$sql = "UPDATE admissions_data SET status = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('si', $status, $id);

if ($stmt->execute() === TRUE) {
    $stmt->close();
    $notif = "Admin Accepted ".$first_name." ".$last_name."'s Admission Submission";
    $stmt2 = $conn->prepare("INSERT INTO actions (name, image) VALUES (?, ?)");
    $stmt2->bind_param('ss', $notif, $image);
    $stmt2->execute();
    $stmt2->close();
    echo json_encode(["success" => true]);
} else {
    $stmt->close();
    $notif = "Admin Declined ".$first_name." ".$last_name."'s Admission Submission";
    $stmt2 = $conn->prepare("INSERT INTO actions (name, image) VALUES (?, ?)");
    $stmt2->bind_param('ss', $notif, $image);
    $stmt2->execute();
    $stmt2->close();
    echo json_encode(["success" => false, "error" => $conn->error]);
}

$conn->close();
?>

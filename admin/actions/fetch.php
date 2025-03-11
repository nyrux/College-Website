<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once('../php/config.php');


$sql = "SELECT * FROM actions ORDER BY datetime DESC";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
?>

<?php
require_once('../../php/config.php');
$query = "SELECT title, start_date, end_date, image FROM notices WHERE type = 'event'";
$result = $conn->query($query);

$events = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

echo json_encode($events);

$conn->close();
?>

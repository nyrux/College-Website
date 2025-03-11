<?php
include '../php/config.php';

$sql = "SELECT id, first_name, last_name, email, phone_number, province, course, dob, grade, image, submitted_at FROM admissions_data WHERE status IS NULL";
$result = $conn->query($sql);

$submissions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $submissions[] = $row;
    }
}

echo json_encode($submissions);
$conn->close();
?>

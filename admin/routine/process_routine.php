<?php
require_once('../php/config.php');
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $dateInput = $_POST['dateInput'];
    $routine_data = json_decode($_POST['routine'], true); // Decode JSON to PHP array

    if ($routine_data === null) {
        echo "JSON Decode Error: " . json_last_error_msg();
        exit;
    }

    $routine_json = json_encode($routine_data);

    $check = $conn->prepare("SELECT COUNT(*) FROM routine WHERE date = ?");
    $check->bind_param('s', $dateInput);
    $check->execute();
    $check->bind_result($Nodate);
    $check->fetch();
    $check->close();

    if ($Nodate == 0) {
        $sql = $conn->prepare("INSERT INTO routine (data, date) VALUES (?, ?)");
        $sql->bind_param('ss', $routine_json, $dateInput);
    } else {
        $sql = $conn->prepare("UPDATE routine SET data = ? WHERE date = ?");
        $sql->bind_param('ss', $routine_json, $dateInput);
    }

    if ($sql->execute()) {
        $sql -> close();
        $status = "accept";
        $fetch = $conn -> prepare("SELECT email FROM users WHERE status = ?");
        $fetch -> bind_param('s', $status);
        $fetch -> execute();
        $fetch -> bind_result($email);
        $emails = [];
while ($fetch->fetch()) {
    $emails[] = $email;
}
$fetch->close();

echo implode("\n", $emails);
        

    } else {
        echo "error: " . $sql->error;
    }

    $conn->close();
}

?>

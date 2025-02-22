<?php
require_once('../php/config.php');
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $dateInput = $_POST['dateInput'];
    $routine_data = json_decode($_POST['routine'], true); // Decode JSON to PHP array

    if ($routine_data === null) {
        echo "JSON Decode Error: " . json_last_error_msg();
        exit;
    }

    // Convert the PHP array to JSON before inserting into MySQL
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
        echo "success";
    } else {
        echo "error: " . $sql->error;
    }

    $sql->close();
    $conn->close();
}

?>

<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: ../php/auth.php');
    exit();
}
require_once('../php/config.php');
if (isset($_POST['notice_id'])) {
    $notice_id = $_POST['notice_id'];

    $query = "DELETE FROM notices WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $notice_id); // Bind the notice ID

    if ($stmt->execute()) {
        // Redirect after successful deletion
        echo "<script>
            alert('Notice deleted successfully');
            location.href='notices.php'; // Redirect to the notices page
        </script>";
    } else {
        // Error handling
        echo "<script>
            alert('Error deleting notice');
            location.href='notices.php'; // Redirect to the notices page
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>

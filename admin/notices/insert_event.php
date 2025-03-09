<?php
require_once('../php/config.php');

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $title = $_POST['title'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $image_path = null;

    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../../uploads/";
        $image_name = time() . "_" . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_path = $image_name;
            } else {
                echo "<script>alert('Failed to upload image.');</script>";
                exit();
            }
        } else {
            echo "<script>alert('File is not an image.');</script>";
            exit();
        }
    }

    // Prepare SQL Statement
    $type = "event";
    $sql = $conn->prepare("INSERT INTO notices (title, start_date, end_date, image, type) VALUES (?, ?, ?, ?, ?)");
    $sql->bind_param("sssss", $title, $start_date, $end_date, $image_path, $type);

    if ($sql->execute()) {
        echo "<script>alert('Notice added successfully!'); location.href='notices.php';</script>";
    } else {
        echo "<script>alert('Error adding notice.');</script>";
    }

    $sql->close();
    $conn->close();
}
?>

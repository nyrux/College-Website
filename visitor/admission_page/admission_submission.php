<?php
include '../../php/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['f-name'];
    $lastName = $_POST['l-name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['ph-num'];
    $province = $_POST['provinces'];
    $course = $_POST['courses'];
    $dob = $_POST['dob'];
    $grade = $_POST['grades'];

    
    $uploadDir = __DIR__ . '/../../uploads/';

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
        $imageName = $image['name'];
        $imageTmpName = $image['tmp_name'];
        $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
        $uniqueImageName = uniqid('', true) . '.' . $imageExt;
        $uploadPath = $uploadDir . $uniqueImageName;
        
        if (move_uploaded_file($imageTmpName, $uploadPath)) {
            $sql = "INSERT INTO admissions_data (first_name, last_name, email, phone_number, province, course, dob, grade, image)
                    VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$province', '$course', '$dob', '$grade', '$uniqueImageName')";

            if ($conn->query($sql) === TRUE) {
                $notif = $firstName . " " . $lastName . " Added a new Admission Submission request.";
                $stmt2 = $conn->prepare("INSERT INTO actions (name, image) VALUES (?, ?)");
                $stmt2->bind_param('ss', $notif, $uniqueImageName);
                $stmt2->execute();
                $stmt2->close();
                echo "Record added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        echo "There was an error with the image.";
    }
}

$conn->close();
?>

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

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
        $imageName = $image['name'];
        $imageTmpName = $image['tmp_name'];
        $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
        $uniqueImageName = uniqid('', true) . '.' . $imageExt;
        $uploadPath =  $uniqueImageName;

        if (move_uploaded_file($imageTmpName, '../../uploads/' .$uploadPath)) {
            $sql = "INSERT INTO admissions_data (first_name, last_name, email, phone_number, province, course, dob, grade, image)
                    VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$province', '$course', '$dob', '$grade', '$uniqueImageName')";

            if ($conn->query($sql) === TRUE) {
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

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../../php/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = 'student';
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $status = "pending";
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($usernameCount);
    $stmt->fetch();
    $stmt->close();

    if ($usernameCount > 0) {
        echo 'Username already taken!';
        exit;
    }
    
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($emailCount);
    $stmt->fetch();
    $stmt->close();

    if ($emailCount > 0) {
        echo 'Email already registered!';
        exit;
    }
    if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['profileImage'];
        $imageName = $image['name'];
        $imageTmpName = $image['tmp_name'];
        $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
        $uniqueImageName = uniqid('', true) . '.' . $imageExt;
        $uploadPath = $uniqueImageName;

        if (move_uploaded_file($imageTmpName, "../../uploads/".$uploadPath)) {
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, image, role, status) VALUES (?, ?, ?, ?, ?, ?)");
            if ($stmt === false) {
                die('Prepare failed: ' . $conn->error);
            }
        
            $stmt->bind_param("ssssss", $username, $email, $password, $uploadPath, $role, $status);

            if ($stmt->execute()) {
                echo 'Record Sent! Wait For Admins to Accept!';
                session_start();
                $_SESSION['user']=$username;
            } else {
                echo 'Error: ' . $stmt->error;
            }

    $stmt->close();
    $name = $username. " signed up as a " . $role;
    $action = $conn -> prepare("INSERT INTO actions (name, image) VALUES (?, ?)");
    $action -> bind_param("ss",$name, $uploadPath);
    $action->execute();
    $action->close();
        } else {
            echo "Error uploading image.";
        }
    } else {
        echo "There was an error with the image.";
    }
    
}

$conn->close();
?>

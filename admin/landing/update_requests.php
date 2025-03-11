<?php
include '../php/config.php';

session_start();
if(isset($_GET['id']) && isset($_GET['a']) && isset($_GET['form']) && isset($_GET['redirect'])){
    $id = intval($_GET['id']);
    $a = htmlspecialchars($_GET['a']);
    $form = htmlspecialchars($_GET['form']);
    $redirect = htmlspecialchars($_GET['redirect']);

    if($form === 'admission'){
        $retrieval = $conn->prepare("SELECT first_name, last_name, image FROM admissions_data WHERE id = ?");
        $retrieval->bind_param('s', $id);
        $retrieval->execute();
        $retrieval->store_result();
        $retrieval->bind_result($first_name, $last_name, $image);
        $retrieval->fetch();
        $retrieval->close();
            $sql = $conn -> prepare("UPDATE admissions_data SET status = ? WHERE id = ?");
            $sql -> bind_param('si',$a,$id);
            $sql -> execute();
            $sql->close();
    $notif = "Admin Accepted ".$first_name." ".$last_name."'s Admission Submission";
    $stmt2 = $conn->prepare("INSERT INTO actions (name, image) VALUES (?, ?)");
    $stmt2->bind_param('ss', $notif, $image);
    $stmt2->execute();
    $stmt2->close();
            if($redirect === 'home'){
                header('location:index.php');
            }
            elseif($redirect === 'admission'){
                header('location:../admission/admission.php');
            }
            
    }
    elseif($form === 'user'){
        $retrieval = $conn->prepare("SELECT username, image FROM users WHERE id = ?");
        $retrieval->bind_param('s', $id);
        $retrieval->execute();
        $retrieval->store_result();
        $retrieval->bind_result($username, $image);
        $retrieval->fetch();
        $retrieval->close();
        $sql = $conn -> prepare("UPDATE users SET status = ? WHERE id = ?");
        $sql -> bind_param('si',$a,$id);
        $sql -> execute();
        $notif = "Admin Accepted ".$username."'s Signup Submission";
    $stmt2 = $conn->prepare("INSERT INTO actions (name, image) VALUES (?, ?)");
    $stmt2->bind_param('ss', $notif, $image);
    $stmt2->execute();
    $stmt2->close();
        if($redirect === 'home'){
            header('location:../userAuth/userAuth.php');
        }
        elseif($redirect === 'admission'){
            header('location:../admission/admission.php');
        }
        
}
}
?>
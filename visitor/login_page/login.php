<?php
require_once('../../php/config.php');
session_start();
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $name = $_POST['username'];
    $password = $_POST['password'];

    $sql = $conn -> prepare("SELECT COUNT(*),password,role,status,image FROM users WHERE username = ?");
    $sql -> bind_param('s',$name);
    $sql -> execute();
    $sql -> store_result();
    $sql -> bind_result($count,$actual_password,$role,$status,$image);
    $sql -> fetch();
    $sql -> close();

    if($count === 1){
        if(password_verify($password,$actual_password)){
            if($status === NULL){
                echo "Your account is not active yet!";
                exit;
            }
            $_SESSION['image'] = $image;
            $_SESSION['user'] = $name;
            $_SESSION['login'] =true;
            if($role){
                $_SESSION['role']=$role;
            }
            echo "success";
        }
        else{
            echo "Wrong Password";
        }
    }else{
        echo "Account not found!";
    }
}

?>
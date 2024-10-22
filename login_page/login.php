<?php
require_once('../php/config.php');
session_start();
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $name = $_POST['username'];
    $password = $_POST['password'];

    $sql = $conn -> prepare("SELECT COUNT(*),password,role FROM users WHERE username = ?");
    $sql -> bind_param('s',$name);
    $sql -> execute();
    $sql -> store_result();
    $sql -> bind_result($count,$actual_password,$role);
    $sql -> fetch();
    $sql -> close();

    if($count === 1){
        if(password_verify($password,$actual_password)){
            $_SESSION['user'] = $name;
            if(isset($_SESSION['login'])){
                unset($_SESSION['login']);
            }
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
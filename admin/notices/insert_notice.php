<?php
require_once("../php/config.php");

if($_SERVER['REQUEST_METHOD']=== "POST"){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $type = "notice";
    $sql = $conn -> prepare("INSERT INTO notices (title, description, type) VALUES (?,?,?)");
    $sql -> bind_param("sss", $title, $description, $type);
    if($sql -> execute()){
        echo "<script> alert('Succesfully updated!'); location.href='notices.php' </script>";
    }
    $sql -> close();
    $conn -> close();
}
?>
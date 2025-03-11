<?php
require_once('../../php/config.php');

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $date = $_POST['date'];
    $check = $conn -> prepare("SELECT COUNT(*) FROM routine WHERE date = ?");
    $check -> bind_param('s', $date);
    $check -> execute();
    $check -> store_result();
    $check -> bind_result($count);
    $check -> fetch();
    $check -> close();

    if($count !== 0){
        $sql = $conn -> prepare("SELECT data FROM routine WHERE date = ?");
        $sql -> bind_param('s',$date);
        if($sql -> execute()){
            $sql -> store_result();
            $sql -> bind_result($data);
            $sql -> fetch();
            header('Content-Type: application/json');
            echo json_encode($data);
        }
        else{
            echo "failed";
        }
        $sql -> close();
    }
    else{
        echo "404";
    }
}
?>
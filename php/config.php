<?php

/* connecting to localhost server */


$host = "localhost";
$user = "root";
$pass = "";
$db = "school";

$conn = new mysqli($host,$user,$pass,$db);
if(!$conn){
    echo $conn -> error();
}
?>
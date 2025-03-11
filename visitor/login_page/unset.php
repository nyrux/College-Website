<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['code']);
header('Location: forgetpassword.php');
?>
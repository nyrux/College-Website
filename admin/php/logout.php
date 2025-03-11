<?php
session_start();
session_unset();
session_destroy();
header('Location: ../../visitor/home_page/home.html');
?>
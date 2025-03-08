<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('Location: ../php/auth.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="userAuth.css">
        <!-- Nav -->
        <link rel="stylesheet" href="../nav/nav.css">
        <title>User Verification</title>
        <!-- Poppins Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Font Awesome CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Update Results</title>
</head>
<body>
    
    <div class="wrapper">
        <div class="panel-left">
            
            <div class="admin-panel-text">
                <span class="admin-panel">Admin Panel</span>
                <span><i class="fa-solid fa-x"></i></span>
            </div>
            <div class="nav-btns-cont">
               <a href="../landing/index.php"  class="nav-btn"> <div><i class="fa-solid fa-house"></i><span>Home</span></div></a>
                <a href="../admission/admission.php"  class="nav-btn"><div><i class="fa-solid fa-id-card-clip"></i><span>Admission Requests</span></div></a>
                <a href="../userAuth/userAuth.php" class="nav-btn"><div><i class="fa-solid fa-user-tie"></i><span>User Verification</span></div></a>
                <a href="../routine/routine.php" class="nav-btn"><div><i class="fa-solid fa-clipboard-list"></i><span>Update Routine</span></div></a>
                <a href="../results/results.php" class="nav-btn"> <div><i class="fa-solid fa-newspaper"></i><span>Update Result</span></div></a>
                <a href="../notices/notices.php" class="nav-btn"> <div><i class="fa-solid fa-database"></i><span>Notices</span></div></a>
                <a href="../actions/actions.php" class="nav-btn"> <div><i class="fa-solid fa-database"></i><span>Actions Database</span></div></a>
            </div>
            <div class="logout-btn-cont">
                <button class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i>Log out</button>
            </div>
        </div>
        <div class="container">
            <div class="panel-top">
                <div class="profile-cont">
                    <div class="profile-picture"></div>
                    <div class="profile-name">
                        <div class="person-name">Himal Baral</div>
                        <div class="person-role">Coordinator</div>
                    </div>
                </div>
                <div class="icons-cont">
                    <i class="fa-solid fa-bell"></i><i class="fa-solid fa-bars"></i>
                </div>
            </div>

            
            <div class="panel-right">
                   <div class="std-rqst-cont">
                       <div class="rqst-type-head">
                        <span class="rqst-type-title">Requests</span>
                       </div>

                       <div class="rqst-cont-std">
                        
                       </div>
                   </div>
            </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="userAuth.js"></script>
    <script src="../nav/nav.js"></script>
</body>
</html>
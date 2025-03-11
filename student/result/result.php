<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: ../../visitor/login_page/login.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="result.css">
        <!-- Nav -->
        <link rel="stylesheet" href="../nav/nav.css">
        <title>Admin Panel</title>
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
                <span class="admin-panel">Student Panel</span>
                <span><i class="fa-solid fa-x"></i></span>
            </div>
            <div class="nav-btns-cont">
                 <a href="../routine/routine.php"  class="nav-btn"><div><i class="fa-solid fa-clipboard-list"></i><span>Routine</span></div></a>
                 <a href="../result/result.php" class="nav-btn"><div><i class="fa-solid fa-newspaper"></i><span>Results</span></div></a>
                 <a href="../notice/notice.php" class="nav-btn"><div><i class="fa-solid fa-clipboard"></i><span>Notice</span></div></a>
             </div>
            <div class="logout-btn-cont">
                <button class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i>Log out</button>
            </div>
        </div>
        <div class="container">
        <div class="panel-top">
                <div class="profile-cont">
                    <img src="../../uploads/<?php echo $_SESSION['image']; ?>" class="profile-picture">
                    <div class="profile-name">
                        <div class="person-name"><?php echo $_SESSION['user'] ?></div>
                        <div class="person-role">Student</div>
                    </div>
                </div>
                <div class="icons-cont">
                    <i class="fa-solid fa-bell"></i><i class="fa-solid fa-bars"></i>
                </div>
            </div>

            
            <div class="panel-right">
                   <div class="grade-cont">
                       <div class="grade-title">grade 11</div>
                            <div class="section-cont">
                                <a href="../result/grades.php?grades=111"><div class="section-name">Section 1</div></a>
                                <a href="../result/grades.php?grades=112"><div class="section-name">Section 2</div></a>
                                <a href="../result/grades.php?grades=113"><div class="section-name">Section 3</div></a>
                                <a href="../result/grades.php?grades=114"><div class="section-name">Section 4</div></a>
                                <a href="../result/grades.php?grades=115"><div class="section-name">Section 5</div></a>
                            </div>
                    </div>
                   <div class="grade-cont">
                       <div class="grade-title">grade 12</div>
                       <div class="section-cont">
                        <a href="../result/grades.php?grades=121"><div class="section-name">Section 1</div></a>
                        <a href="../result/grades.php?grades=122"><div class="section-name">Section 2</div></a>
                        <a href="../result/grades.php?grades=123"><div class="section-name">Section 3</div></a>
                        <a href="../result/grades.php?grades=124"><div class="section-name">Section 4</div></a>
                        <a href="../result/grades.php?grades=125"><div class="section-name">Section 5</div></a>
                    </div>
                    </div>
            </div>
            </div>
        </div>

    <script src="../nav/nav.js"></script>
</body>
</html>
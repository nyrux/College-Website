<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: ../../visitor/login_page/login.html");
}
require_once('../../php/config.php');
$query = "SELECT * FROM notices ORDER BY datetime DESC"; 
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="notice.css">
    <!-- Nav -->
    <link rel="stylesheet" href="../nav/nav.css">
    <title>Admin Panel</title>
    <!-- Poppins Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                
                <div class="panel-title">Notices <div style="font-weight: 300;font-size: .6em;font-style: italic;">(Any updated notice will be displayed here)</div></div>

                <div class="notice-cont">
                    <div class="notice">
                        <div class="notice-title"></div>
                        <div class="notice-desc">
                        </br>
                        Stay updated with the latest announcements, events, and important notices.
                        </div>
                    </div>

                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if($row['type'] === "notice"){
                                echo '<div class="notice">';
                                echo '<h3 class="notice-title text-xl font-semibold text-cyan-500">' . htmlspecialchars($row['title']) . '</h3>';
                                echo '<div class="notice-desc">'.htmlspecialchars($row['description']).'</div>';
                                echo '</div>';
                            }
                                
                        }
                    } else {
                        echo '<p class="text-center text-gray-500">No notices found.</p>';
                    }
                    ?>
                </div>
                
                </div>
            </div>
        </div>

   <script src="../nav/nav.js"></script>
</body>
</html>
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
    <link rel="stylesheet" href="home.css">
    <!-- Nav -->
    <link rel="stylesheet" href="../nav/nav.css">
    <title>Student Panel</title>
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
               <a href="../home/home.php"  class="nav-btn"> <div><i class="fa-solid fa-house"></i><span>Home</span></div></a>
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
                
                <div class="routine-panel">
                    <div class="schedule-cont">
                        <div class="schedule-head">
                            <div class="panel-title">My Routine</div>
                            <div class="date-cont">
                             <i class="fa-solid fa-calendar-days"></i>
                                 <div class="dates">
                                     <div class="day"></div>
                                     <div class="date"></div>
                                 </div>
                         </div>
                         </div>
                         <div class="schedule-days">
                             <div class="days">sun</div>
                             <div class="days">mon</div>
                             <div class="days">tue</div>
                             <div class="days">wed</div>
                             <div class="days">thu</div>
                             <div class="days">fri</div>
                             <div class="days">sat</div>
                         </div>
     
                         <div class="schedule-table">
                             <table>
                                 <tr>
                                   <td></td><td>sec-1</td><td>sec-2</td><td>sec-3</td><td>sec-4</td><td>sec-5</td><td>sec-6</td><td>sec-7</td><td>sec-8</td>
                                 </tr>
                                 <tr>
                                   <td>time-1</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                 </tr>
                                 <tr>
                                   <td>time-2</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                 </tr>
                                 <tr>
                                   <td>time-3</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                 </tr>
                                 <tr>
                                   <td>time-4</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                 </tr>
                                 <tr>
                                   <td>time-5</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                 </tr>
                                 <tr>
                                   <td>time-6</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                 </tr>
                                 <tr>
                                   <td>time-7</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                 </tr>
                                 <tr>
                                   <td>time-8</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                 </tr>
                               </table>
                               
                         </div>
                    </div>
                </div>
                
                <div class="notice-result-panel">
                    <div class="notice-panel">
                        <div class="notice-head">Notices</div>
                        <div class="notice-title"></div>
                        <div class="notice-desc"></div>
                        <div class="notice-date">
                        </div>
                    </div>
                    <div class="result-panel">
                        <div class="result-head">Results</div>
                        <div class="ranks-analytics-cont">
                            <div class="rank-cont">
                                <div class="rank rank-1">
                                    <i class="fa-solid fa-medal"></i>
                                    <div class="rank-num">1st</div>
                                    <div class="rank-name">Elara Wren</div>
                                </div>
                                
                                <div class="rank rank-2">
                                    <i class="fa-solid fa-medal"></i>
                                    <div class="rank-num">2nd</div>
                                    <div class="rank-name">Milo Thorne</div>
                                </div>

                                <div class="rank rank-3">
                                    <i class="fa-solid fa-medal"></i>
                                    <div class="rank-num">3rd</div>
                                    <div class="rank-name">Cassia Vale</div>
                                </div>
                            </div>
                            <div class="analytics-cont">
                                <div class="pie-chart"></div>
                                <div class="pie-data">
                                    <div class="data">
                                        <div class="data-color-1"></div>
                                        <div class="data-num">62% P</div>
                                    </div>
                                    <div class="data">
                                        <div class="data-color-2"></div>
                                        <div class="data-num">25% F</div>
                                    </div>
                                    <div class="data">
                                        <div class="data-color-3"></div>
                                        <div class="data-num">13% U</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>

   <script src="../nav/nav.js"></script>
   <script src="updateTime.js"></script>
</body>
</html>

<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: ../../visitor/login_page/login.html");
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="routine.css">
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
                        <div class="person-name"><?php echo $_SESSION['user']; ?></div>
                        <div class="person-role">Student</div>
                    </div>
                </div>
                <div class="icons-cont">
                    <i class="fa-solid fa-bell"></i><i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <div class="panel-right">
                <div class="rqst-type-head">
                    <span class="cal-type-title">
                        <input type="date" id="dateInput">

                    </span>
                    
                </div>
         
                <div class="table-cont">
                    <table id="morningRoutine" border="1">
                        <tr>
                            <td style="color: #fff;background-color: #464646;">MORNING</td>
                            <td>6:10-6:50</td>
                            <td>6:50-7:30</td>
                            <td>7:35-8:15</td>
                            <td>8:50-8:55</td>
                            <td>8:55-9:20</td>
                            <td>9:20-10:00</td>
                            <td>10:00-10:40</td>
                            <td>10:45-11:25</td>
                            <td>11:25-12:05</td>
                        </tr>
                        <tr>
                            <td>Section 1</td>
                            <td><input type="text" id="morning_section1_period1"></td>
                            <td><input type="text" id="morning_section1_period2"></td>
                            <td><input type="text" id="morning_section1_period3"></td>
                            <td><input type="text" id="morning_section1_period4"></td>
                            <td><input type="text" id="morning_section1_period5"></td>
                            <td><input type="text" id="morning_section1_period6"></td>
                            <td><input type="text" id="morning_section1_period7"></td>
                            <td><input type="text" id="morning_section1_period8"></td>
                            <td><input type="text" id="morning_section1_period9"></td>
                        </tr>
                        <tr>
                            <td>Section 2</td>
                            <td><input type="text" id="morning_section2_period1"></td>
                            <td><input type="text" id="morning_section2_period2"></td>
                            <td><input type="text" id="morning_section2_period3"></td>
                            <td><input type="text" id="morning_section2_period4"></td>
                            <td><input type="text" id="morning_section2_period5"></td>
                            <td><input type="text" id="morning_section2_period6"></td>
                            <td><input type="text" id="morning_section2_period7"></td>
                            <td><input type="text" id="morning_section2_period8"></td>
                            <td><input type="text" id="morning_section2_period9"></td>
                        </tr>
                        <tr>
                            <td>Section 3</td>
                            <td><input type="text" id="morning_section3_period1"></td>
                            <td><input type="text" id="morning_section3_period2"></td>
                            <td><input type="text" id="morning_section3_period3"></td>
                            <td><input type="text" id="morning_section3_period4"></td>
                            <td><input type="text" id="morning_section3_period5"></td>
                            <td><input type="text" id="morning_section3_period6"></td>
                            <td><input type="text" id="morning_section3_period7"></td>
                            <td><input type="text" id="morning_section3_period8"></td>
                            <td><input type="text" id="morning_section3_period9"></td>
                        </tr>
                        <tr>
                            <td>Section 4</td>
                            <td><input type="text" id="morning_section4_period1"></td>
                            <td><input type="text" id="morning_section4_period2"></td>
                            <td><input type="text" id="morning_section4_period3"></td>
                            <td><input type="text" id="morning_section4_period4"></td>
                            <td><input type="text" id="morning_section4_period5"></td>
                            <td><input type="text" id="morning_section4_period6"></td>
                            <td><input type="text" id="morning_section4_period7"></td>
                            <td><input type="text" id="morning_section4_period8"></td>
                            <td><input type="text" id="morning_section4_period9"></td>
                        </tr>
                        <tr>
                            <td>Section 5</td>
                            <td><input type="text" id="morning_section5_period1"></td>
                            <td><input type="text" id="morning_section5_period2"></td>
                            <td><input type="text" id="morning_section5_period3"></td>
                            <td><input type="text" id="morning_section5_period4"></td>
                            <td><input type="text" id="morning_section5_period5"></td>
                            <td><input type="text" id="morning_section5_period6"></td>
                            <td><input type="text" id="morning_section5_period7"></td>
                            <td><input type="text" id="morning_section5_period8"></td>
                            <td><input type="text" id="morning_section5_period9"></td>
                        </tr>
                        <tr>
                            <td>Section 6</td>
                            <td><input type="text" id="morning_section6_period1"></td>
                            <td><input type="text" id="morning_section6_period2"></td>
                            <td><input type="text" id="morning_section6_period3"></td>
                            <td><input type="text" id="morning_section6_period4"></td>
                            <td><input type="text" id="morning_section6_period5"></td>
                            <td><input type="text" id="morning_section6_period6"></td>
                            <td><input type="text" id="morning_section6_period7"></td>
                            <td><input type="text" id="morning_section6_period8"></td>
                            <td><input type="text" id="morning_section6_period9"></td>
                        </tr>
                        <tr>
                            <td>Section 7</td>
                            <td><input type="text" id="morning_section7_period1"></td>
                            <td><input type="text" id="morning_section7_period2"></td>
                            <td><input type="text" id="morning_section7_period3"></td>
                            <td><input type="text" id="morning_section7_period4"></td>
                            <td><input type="text" id="morning_section7_period5"></td>
                            <td><input type="text" id="morning_section7_period6"></td>
                            <td><input type="text" id="morning_section7_period7"></td>
                            <td><input type="text" id="morning_section7_period8"></td>
                            <td><input type="text" id="morning_section7_period9"></td>
                        </tr>
                        <tr>
                            <td>Section 8</td>
                            <td><input type="text" id="morning_section8_period1"></td>
                            <td><input type="text" id="morning_section8_period2"></td>
                            <td><input type="text" id="morning_section8_period3"></td>
                            <td><input type="text" id="morning_section8_period4"></td>
                            <td><input type="text" id="morning_section8_period5"></td>
                            <td><input type="text" id="morning_section8_period6"></td>
                            <td><input type="text" id="morning_section8_period7"></td>
                            <td><input type="text" id="morning_section8_period8"></td>
                            <td><input type="text" id="morning_section8_period9"></td>
                        </tr>
                        <tr>
                            <td>Section 9</td>
                            <td><input type="text" id="morning_section9_period1"></td>
                            <td><input type="text" id="morning_section9_period2"></td>
                            <td><input type="text" id="morning_section9_period3"></td>
                            <td><input type="text" id="morning_section9_period4"></td>
                            <td><input type="text" id="morning_section9_period5"></td>
                            <td><input type="text" id="morning_section9_period6"></td>
                            <td><input type="text" id="morning_section9_period7"></td>
                            <td><input type="text" id="morning_section9_period8"></td>
                            <td><input type="text" id="morning_section9_period9"></td>
                        </tr>
                    </table>
                    
                    <table id="dayRoutine">
                        <tr>
                            <td style="color: #fff;background-color: #464646;">DAY</td>
                            <td>11:25-12:05</td>
                            <td>12:05-12:45</td>
                            <td>12:50-1:30</td>
                            <td>1:30-2:10</td>
                            <td>2:10-2:30</td>
                            <td>2:30-3:10</td>
                            <td>3:10-3:50</td>
                            <td>3:55-4:35</td>
                            <td>4:25-5:15</td>
                        </tr>
                        <tr>
                            <td>Section 1</td>
                            <td><input type="text" id="day_section1_period1"></td>
                            <td><input type="text" id="day_section1_period2"></td>
                            <td><input type="text" id="day_section1_period3"></td>
                            <td><input type="text" id="day_section1_period4"></td>
                            <td><input type="text" id="day_section1_period5"></td>
                            <td><input type="text" id="day_section1_period6"></td>
                            <td><input type="text" id="day_section1_period7"></td>
                            <td><input type="text" id="day_section1_period8"></td>
                            <td><input type="text" id="day_section1_period9"></td>
                        </tr>
                        <tr>
                            <td>Section 2</td>
                            <td><input type="text" id="day_section2_period1"></td>
                            <td><input type="text" id="day_section2_period2"></td>
                            <td><input type="text" id="day_section2_period3"></td>
                            <td><input type="text" id="day_section2_period4"></td>
                            <td><input type="text" id="day_section2_period5"></td>
                            <td><input type="text" id="day_section2_period6"></td>
                            <td><input type="text" id="day_section2_period7"></td>
                            <td><input type="text" id="day_section2_period8"></td>
                            <td><input type="text" id="day_section2_period9"></td>
                        </tr>
                        <tr>
                            <td>Section 3</td>
                            <td><input type="text" id="day_section3_period1"></td>
                            <td><input type="text" id="day_section3_period2"></td>
                            <td><input type="text" id="day_section3_period3"></td>
                            <td><input type="text" id="day_section3_period4"></td>
                            <td><input type="text" id="day_section3_period5"></td>
                            <td><input type="text" id="day_section3_period6"></td>
                            <td><input type="text" id="day_section3_period7"></td>
                            <td><input type="text" id="day_section3_period8"></td>
                            <td><input type="text" id="day_section3_period9"></td>
                        </tr>
                        <tr>
                            <td>Section 4</td>
                            <td><input type="text" id="day_section4_period1"></td>
                            <td><input type="text" id="day_section4_period2"></td>
                            <td><input type="text" id="day_section4_period3"></td>
                            <td><input type="text" id="day_section4_period4"></td>
                            <td><input type="text" id="day_section4_period5"></td>
                            <td><input type="text" id="day_section4_period6"></td>
                            <td><input type="text" id="day_section4_period7"></td>
                            <td><input type="text" id="day_section4_period8"></td>
                            <td><input type="text" id="day_section4_period9"></td>
                        </tr>
                        <tr>
                            <td>Section 5</td>
                            <td><input type="text" id="day_section5_period1"></td>
                            <td><input type="text" id="day_section5_period2"></td>
                            <td><input type="text" id="day_section5_period3"></td>
                            <td><input type="text" id="day_section5_period4"></td>
                            <td><input type="text" id="day_section5_period5"></td>
                            <td><input type="text" id="day_section5_period6"></td>
                            <td><input type="text" id="day_section5_period7"></td>
                            <td><input type="text" id="day_section5_period8"></td>
                            <td><input type="text" id="day_section5_period9"></td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   <script src="../nav/nav.js"></script>
   <script src="routine.js"></script>

</body>
</html>
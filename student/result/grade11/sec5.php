<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: ../../../visitor/login_page/login.html');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="../resultsheetstyle.css">
        <!-- Nav -->
        <link rel="stylesheet" href="../../nav/nav.css">
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
                 <a href="../../routine/routine.php"  class="nav-btn"><div><i class="fa-solid fa-clipboard-list"></i><span>Routine</span></div></a>
                 <a href="../../result/result.php" class="nav-btn"><div><i class="fa-solid fa-newspaper"></i><span>Results</span></div></a>
                 <a href="../../notice/notice.php" class="nav-btn"><div><i class="fa-solid fa-clipboard"></i><span>Notice</span></div></a>
             </div>
            <div class="logout-btn-cont">
                <button class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i>Log out</button>
            </div>
        </div>
        <div class="container">
            <div class="panel-top">
            <div class="profile-cont">
                    <img src="../../../uploads/<?php echo $_SESSION['image']; ?>" class="profile-picture">
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
                <div class="table-title">Grade 11 - Section 5</div>
                <?php
                require_once('../../../php/config.php');
                $grade = "115";
                $sql = "SELECT id, title, data, datetime FROM results WHERE grade = ? ORDER BY id DESC";

$stmt = $conn->prepare($sql);
$stmt -> bind_param("s", $grade);
$stmt -> execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data = json_decode($row["data"], true);

        echo "<span class='titles' style='display: block; text-align: center; margin-bottom: 20px;'>";
        echo "<h3 style='font-size: 24px; color: #333;'>".$row['title']."</h3><p style='font-size: 16px; color: #888;'>".$row['datetime']."</p></span>";

        if (!empty($data)) {
            echo "<table border='0' cellspacing='0' cellpadding='10' style='margin: 0 auto; width: 80%; border-collapse: collapse; background-color: #f9f9f9; box-shadow: 0 2px 5px rgba(0,0,0,0.1);'>";

            // Column headers
            echo "<tr style='background-color: #4CAF50; color: white; text-align: center;'>";
            foreach ($data[0] as $header) {
                echo "<th style='padding: 12px; font-weight: bold;'>" . htmlspecialchars($header) . "</th>";
            }
            echo "</tr>";

            // Data rows
            for ($i = 1; $i < count($data); $i++) {
                echo "<tr style='text-align: center;'>";
                foreach ($data[$i] as $cell) {
                    echo "<td style='padding: 8px;'>" . htmlspecialchars($cell) . "</td>";
                }
                echo "</tr>";
            }

            echo "</table>";
        }

        echo "<hr style='border: 1px solid #ddd; margin-top: 20px;'>";
    }
} else {
    echo "<p style='text-align: center; font-size: 18px; color: #888;'>No records found.</p>";
}
?>

                
                
            </div>
            </div>
        </div>

    <script src="../../nav/nav.js"></script>

</body>
</html>
<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('Location: ../php/auth.php');
}
require_once('../php/config.php');
?>
<!DOCTYPE html>
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
    
    <title>Actions</title>
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
            <div class="panel-head">
                    <div class="panel-title">Results</div>
                    <div class="routine-nav-cont">
                        <i class="fa-solid fa-add" id="add"></i>
                    </div>
                </div>
            <div class="upload-container">
                <span class="panel-head"><h2>Upload Excel File</h2><i class="fas fa-window-close" id="close"></i></span>
                <form action="insert.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Enter title">
                <input id="file-upload" type="file" name="excel" required>
                <span class="grade_section">
                    Grade: 
                    <select name="grade" required>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    Section: 
                    <select name="section" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>

                    </select>
                </span>
                <button type="submit" name="submit">Upload and Import</button>
                </form>
            </div>
            <?php
$sql = "SELECT id, title, data, datetime FROM results ORDER BY id DESC";
$result = $conn->query($sql);

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
    <script src="../nav/nav.js"></script>
    <script src="routine.js"></script>
</body>
</html>
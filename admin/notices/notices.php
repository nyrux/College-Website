<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../php/auth.php');
}

// Include database connection
require_once('../php/config.php');

// Fetch notices from the database
$query = "SELECT * FROM notices ORDER BY datetime DESC"; // Change order by as per your requirement
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Stylesheet -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="notices.css">
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
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm hidden transition-opacity duration-300">
        <div class="bg-white p-8 rounded-xl shadow-2xl w-[400px] border border-cyan-400 transform scale-95 transition-transform duration-300">
            <h2 class="text-2xl font-bold mb-6 text-cyan-500 text-center">New Notice</h2>
            <form action="insert_event.php" method="post" class="space-y-5" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Enter notice title" class="w-full p-3 rounded-lg bg-gray-100 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-cyan-400 focus:outline-none" required>
                <input type="date" name="start_date" placeholder="Start Date" class="w-full p-3 rounded-lg bg-gray-100 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-cyan-400 focus:outline-none" required>
                <span>Event start Date</span>
                <input type="date" name="end_date" placeholder="End Date" class="w-full p-3 rounded-lg bg-gray-100 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-cyan-400 focus:outline-none" required>
                <span>Event End Date</span>
                <input type="file" name="image" accept="image/*" class="w-full p-3 rounded-lg bg-gray-100 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-cyan-400 focus:outline-none" required>

                <!-- Buttons -->
                <div class="flex justify-between mt-4">
                    <button type="button" onclick="closeModal()" class="w-1/3 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">Cancel</button>
                    <button type="submit" class="w-1/2 py-3 bg-cyan-500 text-white rounded-lg hover:bg-cyan-600 transition">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div id="noticeModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm hidden transition-opacity duration-300">
        <div class="bg-white p-8 rounded-xl shadow-2xl w-[400px] border border-cyan-400 transform scale-95 transition-transform duration-300">
            <h2 class="text-2xl font-bold mb-6 text-cyan-500 text-center">New Notice</h2>
            <form action="insert_notice.php" method="post" class="space-y-5" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Enter notice title" class="w-full p-3 rounded-lg bg-gray-100 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-cyan-400 focus:outline-none" required>
                <textarea id="description" name="description" class="w-full p-3 rounded-lg bg-gray-100 text-gray-900 border border-gray-300 focus:ring-2 focus:ring-cyan-400 focus:outline-none">Write description here.</textarea>
                <!-- Buttons -->
                <div class="flex justify-between mt-4">
                    <button type="button" onclick="closeModal()" class="w-1/3 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">Cancel</button>
                    <button type="submit" class="w-1/2 py-3 bg-cyan-500 text-white rounded-lg hover:bg-cyan-600 transition">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="wrapper">
        <div class="panel-left">
            <div class="admin-panel-text">
                <span class="admin-panel">Admin Panel</span>
                <span><i class="fa-solid fa-x"></i></span>
            </div>
            <div class="nav-btns-cont">
                <a href="../landing/index.php" class="nav-btn"><div><i class="fa-solid fa-house"></i><span>Home</span></div></a>
                <a href="../admission/admission.php" class="nav-btn"><div><i class="fa-solid fa-id-card-clip"></i><span>Admission Requests</span></div></a>
                <a href="../userAuth/userAuth.php" class="nav-btn"><div><i class="fa-solid fa-user-tie"></i><span>User Verification</span></div></a>
                <a href="../routine/routine.php" class="nav-btn"><div><i class="fa-solid fa-clipboard-list"></i><span>Update Routine</span></div></a>
                <a href="../results/results.php" class="nav-btn"><div><i class="fa-solid fa-newspaper"></i><span>Update Result</span></div></a>
                <a href="../notices/notices.php" class="nav-btn"><div><i class="fa-solid fa-database"></i><span>Notices</span></div></a>
                <a href="../actions/actions.php" class="nav-btn"><div><i class="fa-solid fa-database"></i><span>Actions Database</span></div></a>
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
                    <div class="panel-title">Notices</div>
                    <span class="flex">
                    <button onclick="openModal()" class="flex items-center justify-center border-2 border-gray-500 text-gray-500 rounded-lg bg-transparent hover:bg-gray-100 transition-all duration-300 p-2">
                        <span class="font-bold">Add Events</span>
                    </button>
                    <button onclick="noticeModal()" class="flex items-center justify-center border-2 border-gray-500 text-gray-500 rounded-lg bg-transparent hover:bg-gray-100 transition-all duration-300 p-2">
                        <span class="font-bold">Add Notice</span>
                    </button>
                    </span>
                </div>

                <div class="notices-list">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if($row['type'] === "event"){
                                echo '<div class="event-box">';
                                echo '<h3 class="text-xl font-semibold text-cyan-500">' . htmlspecialchars($row['title']) . '</h3>';
                                echo '<p><strong>Start Date:</strong> ' . $row['start_date'] . '</p>';
                                echo '<p><strong>End Date:</strong> ' . $row['end_date'] . '</p>';
                                if ($row['image']) {
                                    echo '<a href="../../uploads/' . $row['image'] . '"><img src="../../uploads/' . $row['image'] . '" alt="Notice Image" class="notice-image"></a>';
                                }
                                echo '<form action="delete_notice.php" method="POST" class="mt-3">'; // Form for delete
                                echo '<input type="hidden" name="notice_id" value="' . $row['id'] . '">'; // Hidden input with notice ID
                                echo '<button type="submit" class="delete-btn text-red-500 hover:text-red-700">Delete</button>'; // Delete button
                                echo '</form>';
                                echo '</div>';
                            }
                            else{
                                echo '<div class="notice">';
                                echo '<h3 class="notice-title text-xl font-semibold text-cyan-500">' . htmlspecialchars($row['title']) . '</h3>';
                                echo '<div class="notice-desc">'.htmlspecialchars($row['description']).'</div>';
                                echo '<form action="delete_notice.php" method="POST" class="mt-3">'; // Form for delete
                                echo '<input type="hidden" name="notice_id" value="' . $row['id'] . '">'; // Hidden input with notice ID
                                echo '<button type="submit" class="delete-btn text-red-500 hover:text-red-700">Delete</button>'; // Delete button
                                echo '</form>';
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

    <script>
        function openModal() {
            document.getElementById("modal").classList.remove("hidden");
        }
        function noticeModal() {
            document.getElementById("noticeModal").classList.remove("hidden");

        }
        function closeModal() {
            document.getElementById("modal").classList.add("hidden");
            document.getElementById("noticeModal").classList.add("hidden");

        }
    </script>
    <script src="../nav/nav.js"></script>
</body>

</html>

<?php

$conn->close();
?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
require_once('../php/config.php');

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $date = $_POST['dateInput'];
    $emailArray = $_POST['emails'];
    
    $mail = new PHPMailer(true);

    $stmt = $conn->prepare("SELECT * FROM routine WHERE date = ?");
    $stmt->bind_param("s", $date);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $data = json_decode($row['data'], true);
    } else {
        die("No data found for the given date.");
    }

    function generateTable($data, $title, $timeSlots) {
        $html = "<h2>$title</h2><table border='1' cellspacing='0' cellpadding='5'>";
    
        $html .= "<tr><th>Section</th>";
        foreach ($timeSlots as $slot) {
            $html .= "<th>$slot</th>";
        }
        $html .= "</tr>";
        foreach ($data as $section => $values) {
            $html .= "<tr><td>$section</td>";
            foreach ($timeSlots as $index => $slot) {
                $html .= "<td>" . (isset($values[$index]) ? $values[$index] : '-') . "</td>";
            }
            $html .= "</tr>";
        }
    
        $html .= "</table><br>";
        return $html;
    }
    $morningSlots = [
        "6:10-6:50", "6:50-7:30", "7:35-8:15", "8:50-8:55", "8:55-9:20",
        "9:20-10:00", "10:00-10:40", "10:45-11:25", "11:25-12:05"
    ];
    
    $daySlots = [
        "11:25-12:05", "12:05-12:45", "12:50-1:30", "1:30-2:10", "2:10-2:30",
        "2:30-3:10", "3:10-3:50", "3:55-4:35", "4:25-5:15"
    ];

    $htmlContent = "<html><body>";
    $htmlContent .= "<h1>Routine Schedule - ".$date."</h1>";
    $htmlContent .= generateTable($data['morning'], "Morning Schedule", $morningSlots);
    $htmlContent .= generateTable($data['day'], "Day Schedule", $daySlots);
    $htmlContent .= "</body></html>";

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'nirambrt3@gmail.com';
        $mail->Password   = 'mtkbsdprrymworjc';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('nirambrt3@gmail.com', 'Anonymous');

        foreach ($emailArray as $email) {
            $mail->addAddress($email);
        }

        $mail->isHTML(true);
        $mail->Subject = "Routine of ".$date;
        $mail->Body    = $htmlContent;
        $mail->AltBody = 'Routine Schedule Attached';

        $mail->send();
        echo 'Email has been sent successfully!';
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

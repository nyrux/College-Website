<?php
require_once('../php/config.php');
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST["submit"])) {
    $file = $_FILES["excel"]["tmp_name"];
    $grade = $_POST['grade'];
    $section = $_POST['section'];
    $title = $_POST['title'];
    $grade_section = $grade.''.$section;
    if ($file) {
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray(); 

        if (!empty($data)) {


            $json_data = json_encode($data, JSON_UNESCAPED_UNICODE);

            $stmt = $conn->prepare("INSERT INTO results (data, grade, title) VALUES (?,?,?)");
            $stmt->bind_param("sss", $json_data, $grade_section, $title);

            if ($stmt->execute()) {
                header('Location: results.php');
            } else {
                echo "Error: " . $conn->error;
            }

            $stmt->close();
            $conn->close();
        }
    }
}
?>
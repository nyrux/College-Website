<?php
require_once('../../php/config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background: #34aeff;
            color: #fff;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #298dd6;
        }
        .message {
            margin-top: 10px;
            color: red;
        }
        #code, #new{
            display: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php if(!isset($_SESSION['password'])){ ?>
            <form method="POST" id="emailbox">
            <h2>Forgot Password</h2>
            <p>Enter your email to reset your password.</p>
                <input type="email" name="email" placeholder="Enter your email" id="email" required>
                <button type="submit" name="reset">Reset Password</button>
            </form>
        <?php } ?>
        
        <form method="POST" id="code">
            <input type="text" name="code" placeholder="Enter 6 digit code" required>
            <button type="submit" name="submit">Submit</button>
        </form>
            <form method="POST" id="new">
            <h2>Change Password</h2>
            <input type="password" name="password" placeholder="Set new Password" required>
            <button type="submit" name="change">Submit</button>
    </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reset"])) {
            $email = $_POST["email"];
            
            
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $code = mt_rand(100000, 999999);
                $status = "active";
                $fetch = $conn->prepare("SELECT fullname FROM users WHERE email = ?");
                $fetch->bind_param("s", $email);
                $fetch->execute();
                $fetch->store_result();
                if ($fetch->num_rows === 0) {
                    echo "<p class='message'>Email not registered!</p>";
                    exit;
                }
                $fetch->bind_result($name);
                $fetch->fetch();
                $fetch->close();

                    $htmlContent = '
                    <div class="container">
                        <h2>Hello, '.$name.'!</h2>
                        <p>Here is your reset password code:</p>
                        <div class="code">'.$code.'</div>
                        <p>Please use this code for verification or access.</p>
                        <p class="footer">If you did not request this code, please ignore this email or contact support.</p>
                    </div>
                    ';
                    $mail = new PHPMailer(true);
                    try {
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.gmail.com'; 
                        $mail->SMTPAuth   = true;
                        $mail->Username   = 'nirambrt3@gmail.com';
                        $mail->Password   = 'mtkbsdprrymworjc';
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port       = 587;
                
                        $mail->setFrom('nirambrt3@gmail.com', 'Kantipur +2');
                        $mail->addAddress($email);
                
                        $mail->isHTML(true);
                        $mail->Subject = "Code for @". $name;
                        $mail->Body    = $htmlContent;
                        $mail->AltBody = 'Reset Password';
                
                        $mail->send();
                        echo "<script> document.getElementById('code').style.display = 'block'; document.getElementById('email').value = '".$email."' </script>";
                        echo "<p class='message' style='color: green;'>Code has been sent successfully!</p>";
                        $_SESSION['email'] = $email;
                        $_SESSION['code'] = $code;
                    } catch (Exception $e) {
                        echo "<p class=''message'>Email could not be sent. Mailer Error: {$mail->ErrorInfo}</p>";
                    }
            } else {
                echo "<p class='message'>Invalid email format.</p>";
            }
        }
        elseif($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])){
            $inputted_code = $_POST['code'];
            if($inputted_code === "".$_SESSION['code']){
                unset($_SESSION['code']);
                echo "<script> document.getElementById('code').style.display = 'none'; document.getElementById('new').style.display = 'block'; document.getElementById('emailbox').style.display = 'none';  </script>";
                

            }
            else{
                echo "<p class='message'>wrong Code</p>";
            }
        }
        elseif($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['change'])){
            $password = $_POST['password'];
            $sql = $conn -> prepare("UPDATE users SET password = ? WHERE email = ?");
            $sql -> bind_param("ss", $password, $_SESSION['email']);
            if($sql -> execute()){
                echo ' <script> alert("Password change successful"); location.href = "login.html"; </script>';

            }
            else{
                echo "<script> alert('Error changing password! ".$sql -> error ."') </script>";
            }
        }
        ?>
    </div>

</body>
</html>

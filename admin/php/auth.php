<?php
session_start();
$pass = "SECUREPASSWORD223";

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if($_POST['password'] === $pass){
        $_SESSION['admin'] = true;
    header('Location: ../landing/index.php');
    }

else{
    echo "<script>alert('incorrect password!')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #34aeff;
        }
        .login-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h2 {
            margin-bottom: 15px;
            color: #333;
        }
        .input-group {
            position: relative;
            margin-bottom: 15px;
        }
        input {
            width: 100%;
            padding: 10px;
            padding-right: 40px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 14px;
            color: #555;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<form method="POST" class="login-container">
    <h2>Admin Authentication</h2>
    <span>An admin requires a password to confirm this is really an admin.</span>
    <div class="input-group">
        <input type="password" name="password" id="password" placeholder="Password">
        <span class="toggle-password" onclick="togglePassword()">👁️</span>
    </div>
    <button>Login</button>
</form>

<script>
    function togglePassword() {
        let passwordField = document.getElementById("password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>

</body>
</html>

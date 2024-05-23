<?php
session_start();
include("connection/connection.php");

if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass1 = mysqli_real_escape_string($conn, $_POST['password']);
    $pass = md5($pass1);

    if($user == "" ||  $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a href='login.php'>Go back</a>";
    } else {
        $result = mysqli_query($conn, "SELECT * FROM user WHERE user_name='$user' AND user_password='$pass'")
        or die("Could not execute the select query.");
        
        $row = mysqli_fetch_assoc($result);
        if(!empty($row)) {
            $validuser = $row['user_name'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['role'] = $row['role'];
            header("location:index.php");
        } else {
            echo "<center>";
            echo "<h4 style='color:red;'>Invalid username or password.</h4>";
            echo "<br/>";
            echo "<a href='login.php'>Go back</a>";
            echo "</center>";
        }

        if(isset($_SESSION['valid'])) {
            header('Location: index.php');          
        }
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
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('allImages/bgImage.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .login-form input[type="text"],
        .login-form input[type="password"],
        .login-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .login-form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .login-form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form class="login-form" action="" method="POST">
            <input type="text" name="username" placeholder="Enter your username">
            <input type="password" name="password" placeholder="Enter your password">
            <input type="submit" name="submit" value="Login">
            <a href="register.php"><p>Or Create a new account</p></a>
        </form>
    </div>
</body>
</html>

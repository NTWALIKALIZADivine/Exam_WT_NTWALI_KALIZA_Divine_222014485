<?php
session_start();
include("connection/connection.php");

if(isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $password = md5($pass);
    $role = mysqli_real_escape_string($conn, $_POST['role']); // Added role field

    if($name == "" || $email == "" || $password == "" || $role == "") {
        echo "All fields are required.";
        echo "<br/>";
        echo "<a href='register.php'>Go back</a>";
    } else {
        $result = mysqli_query($conn, "INSERT INTO user(user_name, user_email, user_password, role) 
                        VALUES('$name', '$email', '$password', '$role')")
        or die("Could not execute the insert query.");
        
        if($result) {
            echo "<center>";
            echo "<div class='success-message'>Registration successful.</div>"; // Display success message in green container
            echo "<br/>";
            echo "<a href='login.php'>Login</a>";
            echo "</center>";
            header("location:login.php");
        } else {
            echo "<center>";
            echo "<h4 style='color:red;'>Registration failed.</h4>";
            echo "<br/>";
            echo "<a href='register.php'>Try Again</a>";
            echo "</center>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        .register-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .register-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .register-form input[type="text"],
        .register-form input[type="email"],
        .register-form input[type="password"],
        .register-form select,
        .register-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .register-form input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
        }

        .register-form input[type="submit"]:hover {
            background-color: #218838;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <form class="register-form" action="" method="POST">
            <input type="text" name="name" placeholder="Enter your name">
            <input type="email" name="email" placeholder="Enter your email">
            <input type="password" name="password" placeholder="Enter your password">
            <select name="role">
                <option value="">Select Role</option>
                <option value="Student">Student</option>
                <option value="Admin">Admin</option>
            </select>
            <input type="submit" name="submit" value="Register">
        </form>
    </div>
</body>
</html>

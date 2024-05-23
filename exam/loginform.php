<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DataXpert</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login to DataXpert</h2>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="submit">Login</button>
            <p>Don't Have Account</p><a href="">Sign Up</a>
        </form>
    </div>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    include "conn.php";
    $em=$_POST['username'];
    $password=$_POST['password'];
    $sql=mysqli_query($conn,"SELECT * FROM user WHERE user_name='$em' AND user_password='$password'");
    if (mysqli_num_rows($sql)==0) {
        echo "Incorrect Password";
    }
    else
    {
     header("location:home.html");
    }
}



?>

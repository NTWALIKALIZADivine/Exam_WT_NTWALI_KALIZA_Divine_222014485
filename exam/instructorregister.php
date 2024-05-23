<?php
$conn=new mysqli('localhost','root','','datp');
if (isset($_POST['submit'])) {
$workshop=$_POST['instructor_name'];
$date=$_POST['email'];
$Names=$_POST['Expertise'];
$phone=$_POST['password'];
$insert="INSERT INTO instructor VALUES('','$workshop','$date','$Names','$phone')";
$c=mysqli_query($conn,$insert);
if ($c) {
    echo "registered successful";
    
}
else
{
    echo"no";
}
}
?>

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
        <h2>Student Register</h2>
        <form method="POST">
            <div class="form-group">
                <label for="instructor_name">instructor_name</label>
                <input type="text" name="instructor_name" required>
            </div>
            <div class="form-group">
                <label for="instructor_email">Email</label>
                <input type="Email"  name="email" required>
            </div>
            <div class="form-group">
                <label for="instructor_expertise">Expertise</label>
                <input type="text"  name="Expertise" required>
            </div>
             <div class="form-group">
                <label for="password">password</label>
                <input type="password"  name="password" required>
            </div>

            <button type="submit" name="submit">Sign Up</button>
            <p>Already Have Account</p><a href="studentlogin.php">Login</a>
        </form>
    </div>
</body>
</html>

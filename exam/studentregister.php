<?php
$conn=new mysqli('localhost','root','','datp');
if (isset($_POST['submit'])) {
$workshop=$_POST['workshop'];
$date=$_POST['Date'];
$Names=$_POST['Names'];
$phone=$_POST['Phone'];
$insert="INSERT INTO attendees VALUES('','$workshop','$date','$Names','$phone')";
$c=mysqli_query($conn,$insert);
if ($c) {
    echo "registered successful";
    header("location:home.html");
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
                <label for="workshopname">Workshop_name</label>
                <input type="text" name="workshop" required>
            </div>
            <div class="form-group">
                <label for="Date">Date</label>
                <input type="Date"  name="Date" required>
            </div>
             <div class="form-group">
                <label for="password">Names</label>
                <input type="text"  name="Names" required>
            </div>
            <div class="form-group">
                <label for="Phone">Phone</label>
                <input type="text"  name="Phone" required>
            </div>
            <button type="submit" name="submit">Sign Up</button>
            <p>Already Have Account</p><a href="studentlogin.php">Login</a>
        </form>
    </div>
</body>
</html>

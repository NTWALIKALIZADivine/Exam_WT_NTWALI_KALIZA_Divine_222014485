<?php
session_start();

?><header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="./?page=services">Services</a></li>
            <li><a href="./?page=about">About Us</a></li>
            <li><a href="./?page=courses">All courses</a></li>
 


            <li><a href="./?page=attendees">Attendee</a></li>
            <li><a href="./?page=constructor">Instructor</a></li>
            <li><a href="./?page=dataAnalysis">DataAnalysis</a></li>
            <li><a href="./?page=shop">WorkShop</a></li>
            <li><a href="./?page=superVisor">SuperVisor</a></li>
        </ul>
    </nav>
    <?php if(isset($_SESSION['valid'])){ ?>
    <div class="login-button">
        <a href="logout.php">LogOut</a>
    </div>
    <?php } else{ ?>
        <div class="login-button">
        <a href="login.php">Login</a>
    </div>

        <?php } ?>
</header>
<style>
    header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    background-color: #333;
    color: #fff;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
}

.login-button {
    margin-right: 20px;
}

.login-button a {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border-radius: 5px;
    text-decoration: none;
}

.login-button a:hover {
    background-color: #0056b3;
}

    </style>
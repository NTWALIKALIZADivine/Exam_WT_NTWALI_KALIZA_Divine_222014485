
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataXpert: Mastering Data Analysis</title>
    <link rel="stylesheet" href="home.css">
    <style>
        .page {
            padding: 20px;
        }

        .left {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .container2 {
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn-submit {
            background-color: #007bff;
            margin-right: 10px;
        }

        .btn-reset {
            background-color: #dc3545;
        }

        .btn-submit,
        .btn-reset {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .btn-reset:hover {
            background-color: #c82333;
        }



.page {
    display: flex;
    flex-direction: column;
    background-color: #f4f4f4;
    padding: 20px;
}

.left {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.left h1 {
    font-size: 24px;
    margin: 0;
}

.breadcrumb {
    list-style: none;
    padding: 0;
    margin: 0;
}

.breadcrumb li {
    display: inline;
    font-size: 14px;
    color: #666;
}

.breadcrumb li i {
    margin: 0 5px;
}

.btn-download {
    display: flex;
    align-items: center;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
}

.btn-download:hover {
    background-color: #0056b3;
}

.DataTable {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.cardHeader {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.cardHeader h2 {
    font-size: 20px;
    margin: 0;
}

.btn {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
}

.btn:hover {
    background-color: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background-color: #f8f9fa;
}

thead tr {
    border-bottom: 2px solid #dee2e6;
}

thead td {
    font-weight: bold;
    padding: 10px 0;
    text-align: left;
}

tbody tr {
    border-bottom: 1px solid #dee2e6;
}

tbody td {
    padding: 10px 0;
    text-align: left;
}

.status {
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 12px;
    font-weight: bold;
    text-transform: uppercase;
}

.delivered {
    background-color: #28a745;
    color: #fff;
}

.pending {
    background-color: #ffc107;
    color: #000;
}

.return {
    background-color: #dc3545;
    color: #fff;
}

.inProgress {
    background-color: #17a2b8;
    color: #fff;
}


</style>
</head>
<body>
<?php 
 include_once("connection/connection.php"); 

 $page = isset($_GET['page']) ? $_GET['page'] : 'main';
if(!isset($_SESSION['valid'])){
header("location:login.php");
}
 ?>
 <?php include("pageSections/header.php"); ?>
<?php 
        if(is_file($page.'.php')){
            include $page.'.php';
        }else{
            if(is_dir($page) && is_file($page.'/index.php')){
                include $page.'/index.php';
            }
			else{
                if($page=='add_Instructor'){
                    include_once 'constructor/'.$page.'.php';
                }else if($page=='add_Workshop'){
                    include_once 'shop/'.$page.'.php';
                 }else if($page=='add_Attendee'){
                    include_once 'attendees/'.$page.'.php';
                 }else if($page=='add_dataanalysis'){
                    include_once 'dataAnalysis/'.$page.'.php';
                 }else if($page=='add_Supervisor'){
                    include_once 'superVisor/'.$page.'.php';
                 }
                else{
                echo '<h4 class="text-center fw-bolder">Page Not Found</h4>';
                }
            }
        }
        ?>
<?php include("pageSections/footer.php"); ?>
</body>
</html>

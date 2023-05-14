<?php
session_start();
include ("conn.php");

if (isset($_POST['confirm'])) {
    if ($_POST['confirm'] == 'Yes') {
        header("Location:login.php?");
    }
    else if ($_POST['confirm'] == 'No') {
        header("index.php");
    } 
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMS</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
    <div class="main">
        <div class="verbar">
            <h2>AMS</h2>
            <ul>
                <li><a href="add.php">Assignments</a></li>
                <li><a href="#">Teachers</a></li>
                <li><a href="#">Subject</a></li>
            </ul>
            <div class="logout">
                <a href="login.php">Logout</a>
            </div>
        </div>
<div class="site-con">
    <div class="header">Assignment Management System</div>
</div>
</body>
</html>

<?php
session_start();
include ("sql/conn.php"); 
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
                <li><a href="home.php">Home</a></li>
                <li><a href="add.php">Assignments</a></li>
                <li><a href="teachers.php">Teachers</a></li>
                <li><a href="subject.php">Subject</a></li>
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
<?php
session_start();
include ("conn.php");

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
            <h2>Assignment</h2>
            <p>Management System</p>
            <ul>
                <li><a href="#">Assignments</a></li>
                <li><a href="#">Teachers</a></li>
                <li><a href="#">Subject</a></li>
            </ul>
            <div class="logout">
                <a href="login.php">Log out</button>
            </div>
        </div>
    </div>
</body>
</html>
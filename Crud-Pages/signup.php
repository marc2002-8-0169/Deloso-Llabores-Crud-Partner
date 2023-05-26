<?php
session_start();
include ("db.php");
    function user_id($num){
        $ranText = "";
        
        if($num < 10){
            $num = 10;
        }
        $length = rand(5,$num);
        for ($i=0; $i < $length; $i++) { 
            $ranText .= rand(0,10);
        }
        return $ranText;
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $student_number = $_POST['id_number'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username)&& !empty($password))
        {
            $user_id = user_id(50);
            $query = "INSERT INTO users(user_id,student_number,username,password) values('$user_id','$student_number','$username','$password')";
            mysqli_query($conn,$query);
            echo "<script>alert('You can now login.');</script>";
            echo "<script>document.location='login.php';</script>";
            die;
        }else{
            echo "The informations are not valid";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Signup Page</title>
	<link rel="stylesheet" href="css/signup.css">
</head>
<body>
	<div class="signup-container">
		<h1>Sign Up</h1>
        <p>Fill out the form bellow.</p>
		<form method="POST">
			<input type="text" placeholder="Your ID number" id="id_number" name="id_number" required>
			<input type="text" placeholder="Username" id="username" name="username" required>
			<input type="password" placeholder="Password" id="password" name="password" required>
			<button type="submit">Sign Up</button><br>
            <label>Already have an account?</label>
            <a href="login.php">Login</a>
		</form>
	</div>
</body>
</html>
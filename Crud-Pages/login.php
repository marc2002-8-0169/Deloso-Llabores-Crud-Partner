<?php
session_start();
include ("db.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username)&& !empty($password))
        {

            $query = "SELECT * FROM users WHERE username = '$username' limit 1";
            $check_query = mysqli_query($conn,$query);

            if($check_query){
                if($check_query && mysqli_num_rows($check_query)>0)
                {
                    $content = mysqli_fetch_assoc($check_query);
                        if($content['password'] === $password){
                        $_SESSION['user_id'] = $user_data['user_id'];
                        echo "<script>alert('You are now logged in.');</script>";
                        echo "<script>document.location='main.php';</script>";
                        die;
                }
            }
        }
            echo "<script>alert('Invalid information.');</script>";
        }else{
            echo "<script>alert('Invalid information.');</script>";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="login-container">
		<h1>Login</h1>
        <p>Input your login details.</p>
		<form action="login.php" method="POST">
			<input type="text" placeholder="Username" id="username" name="username" required>
			<input type="password" placeholder="Password" id="password" name="password" required>
			<button type="submit">Login</button><br>
            <label>Dont have an account yet?</label>
            <a href="signup.php">Signup</a>
		</form>
	</div>
</body>
</html>
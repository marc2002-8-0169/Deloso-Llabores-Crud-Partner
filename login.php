<?php
session_start();
include ("conn.php");
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $student_number = $_POST['id_number'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username)&& !empty($password))
        {

            $query = "SELECT * FROM users WHERE username = '$username' limit 1";
            $check_query = mysqli_query($conn,$query);

            if($result){
                if($check_query && mysqli_num_rows($check_query)>0)
                {
                    $content = mysqli_fetch_assoc($result);
                    if($content['password'] === $password){
                    header("Location: index.php");
                    die;
                }
            }
        }
        echo "<script>alert('Invalid information.');</script>";
        echo "<script>document.location='login.php';</script>";
        }else{
            echo "Invalid information.";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Page</title>
	<link rel="stylesheet" href="login.css">
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
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
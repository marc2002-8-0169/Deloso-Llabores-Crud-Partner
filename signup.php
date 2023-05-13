<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Signup Page</title>
	<link rel="stylesheet" href="signup.css">
</head>
<body>
	<div class="signup-container">
		<h1>Sign Up</h1>
        <p>Fill out the form bellow.</p>
		<form action="register.php" method="POST">
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
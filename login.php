<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Bus Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>
		<div class="input-group">
                <label for="type">User Type:</label>
                <select name="type" id="type">
                    <option value="">Select user type</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
            </div>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Application Form</a>
		</p>
	</form>


</body>
</html>
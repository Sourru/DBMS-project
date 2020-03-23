<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
</head>
<body>

	<div class="container">

		<div class="header">
			
				<h2>Login</h2>
		</div>
		
		<form action="stu_login.php" method="post">

			<div>
				<label for="ID">Reg.ID No : </label>
				<input type="text" name="ID" required>
			</div>


			<div>
				<label for="Password">Password :</label>
				<input type="password" name="password1" required>
			</div>

			 
			<BUTTON type="submit" name="Log_user"> Login </BUTTON>
		
		<p>New User?<b>><a href="stu_registration.php">Register here </a></b></p>

		</form>


	</div>

</body>
</html>>
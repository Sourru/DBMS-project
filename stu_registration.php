<?php?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Registration</title>
</head>
<body>

	<div class="container">

		<div class="header">
			
				<h2>Register</h2>
		</div>
		
		<form action="server.php" method="post">

			
			<div>
				<label for="ID">Reg.ID No : </label>
				<input type="text" name="ID" required>
			</div>

			<div>
				<label for="FName">First Name : </label>
				<input type="text" name="FName" required>
			</div>

			<div>
				<label for="LName">Last Name : </label>
				<input type="text" name="LName" required>
			</div>

			<div>
				<label for="Cls">Class : </label>
				<input type="text" name="Cls" required>
			</div>

			<div>
				<label for="Department">Department : </label>
				<input type="text" name="Department" required>
			</div>

			<div>
				<label for="DOB">Date Of Birth : </label>
				<input type="Date" name="DOB" required>
			</div>

			<div>
				<label for="Email">Email Id. :</label>
				<input type="email" name="Email" required>
			</div>

			<div>
				<label for="Mobile">Mobile No. :</label>
				<input type="text" name="Mobile" pattern="[7-9]{1}[0-9]{9}" required>
			</div>

			<div>
				<label for="Address">Permanent Address :</label>
				<input type="text" name="Address" required>
			</div>

			<div>
				<label for="Password">Password :</label>
				<input type="password" name="password1" required>
			</div>

			<div>
				<label for="Password">Confirm Password :</label>
				<input type="password" name="password2" required>
			</div> 

			<BUTTON type="submit" name="Reg_user"> Register </BUTTON>

			<p>Already a User?<b>><a href="stu_login.php">Log in </a></b></p>

		</form>


	</div>

</body>
</html>>
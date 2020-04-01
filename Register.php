<!DOCTYPE html>
<html>
<head>
	<title>Student Register Page</title>
	<link rel="stylesheet" type="text/css" href="styleregister.css">
	<link rel="stylesheet" type="text/css" href="navbar.css"> 

</head>
<body>

	<div class="home1">

		<ul>
 <li><a href="#">Home</a></li>
 <li><a href="#">Login</a>
  <ul>
   <li><a href="">Administrative Login</a></li>
   <li><a href="Auth_login.php">Authority Login</a></li>
   <li><a href="Home_page.php">Student Login</a></li>
  </ul>
 </li>
 <li><a href="#">Register</a>
  <ul>
   <li><a href="Auth_register.php">Authority Register</a></li>
   <li><a href="Register.php">Student Register</a></li>
  </ul>
 </li>
 <li><a href="#">Contact</a>
  <ul>
   <li><a href="">Mobile No.</a></li>
   <li><a href="">Email</a></li>
  </ul>
 </li>
 <li><a href="#">About us</a></li>
</ul>


   		<div class="form-box" >
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" onclick="login()">Login</button>
				<button type="button" class="toggle-btn">Register</button>

	        </div> 
	          <div class="social-icons">
		 		<img src="fb.png">
		 		<img src="gp.png">
		 		<img src="tw.png">
			  </div>

			  <form id="register" class="input-group" action="server_reg.php" method="post">
			  	<input type="text" name="user" class="input-field" placeholder="Reg. Id" required >
			  	<input type="text" name="fname" class="input-field" placeholder="Full Name(First Middle Last)" required>
			  	<input type="text" name="class" class="input-field" placeholder="Class(TE1/FE1/BE1)" required maxlength="4">
			  	<input type="number" name="rollno" class="input-field" placeholder="Roll No." required maxlength="5">
			  	<input list="dp" name="depart" class="input-field" placeholder="Department" required>
  					<datalist id="dp">
    					<option value="Computer">
    					<option value="IT">
    					<option value="ENTC">
  					</datalist>
				<input type="Email" name="email" class="input-field" placeholder="Email ID." required>
				<input type="number" name="mobile" class="input-field" placeholder="Mobile No." required minlength="10">
				<input type="text" name="address" class="input-field" placeholder="Permanent Address(city)" required>
			  	<input type="date" name="date" class="input-field" required>
			  	<input type="password" name="pass1" class="input-field" placeholder="Enter Password" required minlength="6" onchange="if(this.checkValidity()) form.pass2.pattern = RegExp.escape(this.value);">
			  	<input title="Please enter the same Password as above" type="password" name="pass2" class="input-field" placeholder="Re-Enter Password" required minlength="6" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');">
			  	<input type="checkbox" class="check-box"> <span>Agree to terms and conditions</span>  
			  	<button type="submit" class="submit-box">Register</button> 
			  </form>


			</div>

		</div>

		<script >
			function login(){
				window.location = "Home_page.php";
			} 
		</script>

</body>
</html>
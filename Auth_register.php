 <!DOCTYPE html>
<html>
<head>
	<title>Authority Register Page</title>
	<link rel="stylesheet" type="text/css" href="styleregister_auth.css">
	<link rel="stylesheet" type="text/css" href="navbar.css"> 
	<style>
::placeholder {
  color:blue;
  opacity: 0.75; 
}

</style>
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
   <li><a href="#">Mobile No.</a></li>
   <li><a href="#">Email</a></li>
  </ul>
 </li>
 <li><a href="#">About us</a></li>
</ul>

		</div class="middle-part"> 
	          <p>Authority Register</p>
		</div>


   		<div class="form-box">
			<div class="button-box" style="background-color:white">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" onclick="login()">Login</button>
				<button type="button" class="toggle-btn">Register</button>

	        </div> 
	          <div class="social-icons">
		 		<img src="fb.png">
		 		<img src="gp.png">
		 		<img src="tw.png">
			  </div>

			  <form id="register" class="input-group" action="server_reg_auth.php" method="post">
			  	<input type="text" name="user" class="input-field" placeholder="Reg. Id" required >
			  	<input type="text" name="fname" class="input-field" placeholder="First Name" required>
			  	<input type="text" name="lname" class="input-field" placeholder="Last Name" required>
			  	<input list="dg" name="desgn" class="input-field" placeholder="Designation" required >
			  		<datalist id="dg">
			  		  <select name="dgs" id="dgs">
			  			<option value="Principal"></option>
    					<option value="HOD"></option>
    					<option value="Class Teacher"></option>
    				  </select>			
  					</datalist>
  				<div id="cl" >	
			  	<input type="text" name="class" class="input-field" placeholder="Class" maxlength="3">
			  	</div>
			  	<div id="dpt">
			  	<input list="dp" name="depart" class="input-field" placeholder="Department">
  					<datalist id="dp">
  					  <select name="dps">
    					<option value="Computer"></option>
    					<option value="IT"></option>
    					<option value="ENTC"></option>
    				  </select>		
  					</datalist>
  				</div>	
				<input type="Email" name="email" class="input-field" placeholder="Email ID." required>
				<input type="number" name="mobile" class="input-field" placeholder="Mobile No." required minlength="10">
			  	<input type="password" name="pass1" class="input-field" placeholder="Enter Password" required minlength="6" onchange="if(this.checkValidity()) form.pwd2.pattern = RegExp.escape(this.value);">
			  	<input title="Please enter the same Password as above" type="password" name="pass2" class="input-field" placeholder="Re-Enter Password" required minlength="6" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');">
			  	<input type="password" name="pass3" class="input-field" placeholder="Enter Authority Password" required >
			  	<input type="checkbox" class="check-box"> <span style="color: blue;opacity: 0.75">Agree to terms and conditions</span>  
			  	<button type="submit" class="submit-box">Register</button> 
			  </form>


			</div>

		</div>

		<script >
	
			function login(){
				window.location = "Auth_login.php";
			} 

		</script>

</body>
</html>
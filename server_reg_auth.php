<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "dbms_project");
 
 $id ='';
 $fname ='';
 $lname ='';
 $cls ='';
 $depart ='';
 $mno ='';
 $email ='';
 $desgn= '';
 $pass ='';
 $pass3='pict123';
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
if(isset($_POST['user'])){
	$id = mysqli_real_escape_string($link, $_REQUEST['user']);
	$fname = mysqli_real_escape_string($link, $_REQUEST['fname']);
	$lname = mysqli_real_escape_string($link, $_REQUEST['lname']);
	$desgn = mysqli_real_escape_string($link, $_REQUEST['desgn']);
	$depart = mysqli_real_escape_string($link, $_REQUEST['depart']);
	$mno = mysqli_real_escape_string($link, $_REQUEST['mobile']);
	$email = mysqli_real_escape_string($link, $_REQUEST['email']);

	
}


if(isset($_POST['pass1']) && isset($_POST['pass3'])){
	
	if($_POST['pass3'] === 'pict123'){
		if($_POST['pass1'] == $_POST['pass2']){
		$pass = mysqli_real_escape_string($link, $_REQUEST['pass1']);
		}
		else{
		$_SESSION['Error'] = "Password Mismatch";
		}
	}
	else{
		$_SESSION['Error'] = "You are Not the Authorized Person";
		echo "<script type='text/javascript'>alert('You are Not the Authorized Person')</script>";
	}
	
}


$SELECT = "SELECT ID From authority Where ID = ? Limit 1";
     // Attempt insert query execution

     $stmt = $link->prepare($SELECT);
     $stmt->bind_param("s", $id);
     $stmt->execute();
     $stmt->bind_result($id);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $sql = "INSERT INTO authority (ID, FName,LName,Designation,Class,Department,Email,Mobile,Password) VALUES ('$id', '$fname', '$lname', '$desgn', '$cls', '$depart','$email','$mno','$pass')";

      if(isset($_SESSION['Error'])){
		echo $_SESSION['Error'];
		unset($_SESSION['Error']);	
		}else{
		if(mysqli_query($link, $sql)){
    		echo "Records added successfully.";
    			header("location: Auth_login.php");
			} else{
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
				}
		}
     } else {
      echo "Someone already registered using this Reg. ID";
     }
     $stmt->close();
 
 
// Close connection
mysqli_close($link);
?>
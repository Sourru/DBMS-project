<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "dbms_project");
 
 $id ='';
 $pass ='';
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
if(isset($_POST['user'])){
	$id = mysqli_real_escape_string($link, $_REQUEST['user']);
	$pass = mysqli_real_escape_string($link, $_REQUEST['pass']);
}

$query = "SELECT * FROM student_login WHERE ID=? and Password=?";
 
 $stmt = $link->prepare($query);
     $stmt->bind_param("ss", $id,$pass);
     $stmt->execute();
     $stmt->bind_result($id,$pass);
     $stmt->store_result();
     $count = $stmt->num_rows;

if ($count == 1){
//echo "Login Credentials verified";
	$_SESSION['ctemp'] = $count;
echo "<script type='text/javascript'>alert('Login Credentials verified')
</script>";
    header("location: stu_page1.php?ID=".$id);

//echo '<script> window.location ="Register.php"';
   
}else{
echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
//echo "Invalid Login Credentials";
}
$stmt->close();

// Close connection
mysqli_close($link);
?>
<?php
require 'db.php';
$link = mysqli_connect("localhost", "root", "", "dbms_project");
$id = isset($_GET['ID']) ? $_GET['ID'] : '';
$flag = isset($_GET['flag']) ? $_GET['flag'] : 1;
$sql2 = isset($_GET['sql1']) ? $_GET['sql1'] : '';
if($flag == 0){
	$flag=1;
}
$df = '';
$dt = '';
$tmp = '';
$sql='';

	if(!empty($_POST['dt'])){
    $dt1 = mysqli_real_escape_string($link, $_REQUEST['dt']);
    $dt = date('Y-m-d',strtotime($dt1));
    if($flag==1){
    	$sql = 'SELECT * FROM Student where DOB = :DT';
    }
    elseif($flag==2){
    	$sql = "SELECT * FROM Student where DOB = :DT $sql2";
    }
    
    $sql1 = "where DOB = $dt";
	$statement = $connection->prepare($sql);
	if ($statement->execute([':DT' => $dt])) {
		$people = $statement->fetchAll(PDO::FETCH_OBJ);
		//echo "date";
	 header("location:stu_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&flag=".$flag."&sql=".urlencode($sql1)."&sql1=".urlencode($sql2));
	}
	else{
		echo "ERROR: Could not able to execute $sql.";
	}
}
elseif(!empty($_POST['regid'])){
  	$tmp = mysqli_real_escape_string($link, $_REQUEST['regid']);
  	if($flag==1){
  		$sql = "SELECT * FROM Student where UPPER(ID) LIKE UPPER('%$tmp%')";
  	}	
  	elseif($flag==2){
  		$sql = "SELECT * FROM Student where UPPER(ID) LIKE UPPER('%$tmp%') $sql2";
  	}
  	$sql1 = "where UPPER(ID) LIKE UPPER('$tmp%')";
  	$statement = $connection->prepare($sql);
  	if ($statement->execute()) {
		$people = $statement->fetchAll(PDO::FETCH_OBJ);
	 header("location:stu_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&flag=".$flag."&sql=".urlencode($sql1)."&sql1=".urlencode($sql2));
	}
	 else{
		echo "ERROR: Could not able to execute $sql.";
	}
}
  elseif(!empty($_POST['name'])){
  	$tmp = mysqli_real_escape_string($link, $_REQUEST['name']);
  	if($flag==1){
  		$sql = "SELECT * FROM Student st where UPPER(Full_Name) LIKE UPPER('%$tmp%')";
  	}
  	elseif($flag==2){
  		$sql = "SELECT * FROM Student st where UPPER(Full_Name) LIKE UPPER('%$tmp%') $sql2";
  	}
  	
  	$sql1 = "where UPPER(Full_Name) LIKE UPPER('%$tmp%')";
  	$statement = $connection->prepare($sql);
  	if ($statement->execute()) {
		$people = $statement->fetchAll(PDO::FETCH_OBJ);
	 header("location:stu_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&flag=".$flag."&sql=". urlencode($sql1)."&sql1=".urlencode($sql2));
	}
	 else{
		echo "ERROR: Could not able to execute $sql.";
	}
}
	elseif(!empty($_POST['email'])){
  	$tmp = mysqli_real_escape_string($link, $_REQUEST['email']);
  	if($flag==1){
  		$sql = "SELECT * FROM Student where UPPER(Email) LIKE UPPER('%$tmp%')";
  	}
  	elseif($flag==2){
  		$sql = "SELECT * FROM Student where UPPER(Email) LIKE UPPER('%$tmp%') $sql2";
  	}
  	
  	$sql1 = "where UPPER(Email) LIKE UPPER('%$tmp%')";
  	$statement = $connection->prepare($sql);
  	if ($statement->execute()) {
		$people = $statement->fetchAll(PDO::FETCH_OBJ);
	 header("location:stu_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&flag=".$flag."&sql=". urlencode($sql1)."&sql1=".urlencode($sql2));
	}
	 else{
		echo "ERROR: Could not able to execute $sql.";
	}
}
	elseif(!empty($_POST['mobile'])){
  	$tmp = mysqli_real_escape_string($link, $_REQUEST['mobile']);
  	if($flag==1){
  		$sql = "SELECT * FROM Student where UPPER(Mobile) LIKE UPPER('%$tmp%')";
  	}
  	elseif($flag==2){
  		$sql = "SELECT * FROM Student where UPPER(Mobile) LIKE UPPER('%$tmp%') $sql2";
  	}
  	
  	$sql1 = "where UPPER(Mobile) LIKE UPPER('%$tmp%')";
  	$statement = $connection->prepare($sql);
  	if ($statement->execute()) {
		$people = $statement->fetchAll(PDO::FETCH_OBJ);
	 header("location:stu_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&flag=".$flag."&sql=". urlencode($sql1)."&sql1=".urlencode($sql2));
	}

	 else{
		echo "ERROR: Could not able to execute $sql.";
	}
}
	elseif(!empty($_POST['roll'])){
  	$tmp = mysqli_real_escape_string($link, $_REQUEST['roll']);
  	if($flag==1){
  		$sql = "SELECT * FROM Student where UPPER(Rollno) LIKE UPPER('%$tmp%')";
  	}
  	elseif($flag==2){
  		$sql = "SELECT * FROM Student where UPPER(Rollno) LIKE UPPER('%$tmp%') $sql2";
  	}
  	
  	$sql1 = "where UPPER(Rollno) LIKE UPPER('%$tmp%')";
  	$statement = $connection->prepare($sql);
  	if ($statement->execute()) {
		$people = $statement->fetchAll(PDO::FETCH_OBJ);
	 header("location:stu_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&flag=".$flag."&sql=". urlencode($sql1)."&sql1=".$sql2);
	}
	
	 else{
		echo "ERROR: Could not able to execute $sql.";
	}
}


else{
	echo "Error";
}



?>
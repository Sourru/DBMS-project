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

	if(!empty($_POST['df']) && !empty($_POST['dt'])){
    $df1 = mysqli_real_escape_string($link, $_REQUEST['df']);
    $df = date('Y-m-d',strtotime($df1)); 
    $dt1 = mysqli_real_escape_string($link, $_REQUEST['dt']);
    $dt = date('Y-m-d',strtotime($dt1));
    if($flag==1){
    	$sql = 'SELECT s.*,st.Rollno,st.Year FROM competitive s INNER JOIN Student st ON s.ID = st.ID where s.Date_comp BETWEEN :DF and :DT';
    }
    elseif($flag==2){
    	$sql = "SELECT s.*,st.Rollno,st.Year FROM competitive s INNER JOIN Student st ON s.ID = st.ID where s.Date_comp BETWEEN :DF and :DT $sql2";
    }
    
    $sql1 = "where s.Date_comp BETWEEN $df and $dt";
	$statement = $connection->prepare($sql);
	if ($statement->execute([':DF' => $df,':DT' => $dt])) {
		$people = $statement->fetchAll(PDO::FETCH_OBJ);
		//echo "date";
	 header("location:comp_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&flag=".$flag."&sql=".urlencode($sql1)."&sql1=".urlencode($sql2));
	}
	else{
		echo "ERROR: Could not able to execute $sql.";
	}
}
elseif(!empty($_POST['regid'])){
  	$tmp = mysqli_real_escape_string($link, $_REQUEST['regid']);
  	if($flag==1){
  		$sql = "SELECT s.*,st.Rollno,st.Year FROM competitive s INNER JOIN Student st ON s.ID = st.ID where UPPER(s.ID) LIKE UPPER('%$tmp%')";
  	}	
  	elseif($flag==2){
  		$sql = "SELECT s.*,st.Rollno,st.Year FROM competitive s INNER JOIN Student st ON s.ID = st.ID where UPPER(s.ID)  LIKE UPPER('%$tmp%') $sql2";
  	}
  	$sql1 = "where UPPER(s.ID) LIKE UPPER('$tmp%')";
  	$statement = $connection->prepare($sql);
  	if ($statement->execute()) {
		$people = $statement->fetchAll(PDO::FETCH_OBJ);
	 header("location:comp_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&flag=".$flag."&sql=".urlencode($sql1)."&sql1=".urlencode($sql2));
	}
	 else{
		echo "ERROR: Could not able to execute $sql.";
	}
}
  elseif(!empty($_POST['name'])){
  	$tmp = mysqli_real_escape_string($link, $_REQUEST['name']);
  	if($flag==1){
  		$sql = "SELECT s.*,st.Rollno,st.Year FROM competitive s INNER JOIN Student st ON s.ID = st.ID where UPPER(s.Event) LIKE UPPER('%$tmp%')";
  	}
  	elseif($flag==2){
  		$sql = "SELECT s.*,st.Rollno,st.Year FROM competitive s INNER JOIN Student st ON s.ID = st.ID where UPPER(s.Event)  LIKE UPPER('%$tmp%') $sql2";
  	}
  	
  	$sql1 = "where UPPER(s.Event) LIKE UPPER('%$tmp%')";
  	$statement = $connection->prepare($sql);
  	if ($statement->execute()) {
		$people = $statement->fetchAll(PDO::FETCH_OBJ);
	 header("location:comp_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&flag=".$flag."&sql=". urlencode($sql1)."&sql1=".urlencode($sql2));
	}
	 else{
		echo "ERROR: Could not able to execute $sql.";
	}
}
	elseif(!empty($_POST['venue'])){
  	$tmp = mysqli_real_escape_string($link, $_REQUEST['venue']);
  	if($flag==1){
  		$sql = "SELECT s.*,st.Rollno,st.Year FROM competitive s INNER JOIN Student st ON s.ID = st.ID where UPPER(s.Venue) LIKE UPPER('%$tmp%')";
  	}
  	elseif($flag==2){
  		$sql = "SELECT s.*,st.Rollno,st.Year FROM competitive s INNER JOIN Student st ON s.ID = st.ID where UPPER(s.Venue) LIKE UPPER('%$tmp%') $sql2";
  	}
  	
  	$sql1 = "where UPPER(s.Venue) LIKE UPPER('%$tmp%')";
  	$statement = $connection->prepare($sql);
  	if ($statement->execute()) {
		$people = $statement->fetchAll(PDO::FETCH_OBJ);
	 header("location:comp_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&flag=".$flag."&sql=". urlencode($sql1)."&sql1=".urlencode($sql2));
	}
	 else{
		echo "ERROR: Could not able to execute $sql.";
	}
}
	elseif(!empty($_POST['achievements'])){
  	$tmp = mysqli_real_escape_string($link, $_REQUEST['achievements']);
  	if($flag==1){
  		$sql = "SELECT s.*,st.Rollno,st.Year FROM competitive s INNER JOIN Student st ON s.ID = st.ID where UPPER(s.Achievements) LIKE UPPER('%$tmp%')";
  	}
  	elseif($flag==2){
  		$sql = "SELECT s.*,st.Rollno,st.Year FROM competitive s INNER JOIN Student st ON s.ID = st.ID where UPPER(s.Achievements) LIKE UPPER('%$tmp%') $sql2";
  	}
  	
  	$sql1 = "where UPPER(s.Achievements) LIKE UPPER('%$tmp%')";
  	$statement = $connection->prepare($sql);
  	if ($statement->execute()) {
		$people = $statement->fetchAll(PDO::FETCH_OBJ);
	 header("location:comp_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&flag=".$flag."&sql=". urlencode($sql1)."&sql1=".urlencode($sql2));
	}

	 else{
		echo "ERROR: Could not able to execute $sql.";
	}
}
	elseif(!empty($_POST['desc'])){
  	$tmp = mysqli_real_escape_string($link, $_REQUEST['desc']);
  	if($flag==1){
  		$sql = "SELECT s.*,st.Rollno,st.Year FROM competitive s INNER JOIN Student st ON s.ID = st.ID where UPPER(s.Description) LIKE UPPER('%$tmp%')";
  	}
  	elseif($flag==2){
  		$sql = "SELECT s.*,st.Rollno,st.Year FROM competitive s INNER JOIN Student st ON s.ID = st.ID where UPPER(s.Description) LIKE UPPER('%$tmp%') $sql2";
  	}
  	
  	$sql1 = "where UPPER(s.Description) LIKE UPPER('%$tmp%')";
  	$statement = $connection->prepare($sql);
  	if ($statement->execute()) {
		$people = $statement->fetchAll(PDO::FETCH_OBJ);
	 header("location:comp_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&flag=".$flag."&sql=". urlencode($sql1)."&sql1=".$sql2);
	}
	
	 else{
		echo "ERROR: Could not able to execute $sql.";
	}
}


else{
	echo "Error";
}



?>
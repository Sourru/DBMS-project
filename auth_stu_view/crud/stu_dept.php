<?php
require 'db.php';
$link = mysqli_connect("localhost", "root", "", "dbms_project");
$id = isset($_GET['ID']) ? $_GET['ID'] : '';
$flag = isset($_GET['flag']) ? $_GET['flag'] : 2;
if($flag == 0){
	$flag=2;
}
$dept ='';
$year ='';
$div ='';
 
	if(!empty($_POST['dept']) && empty($_POST['year']) && empty($_POST['division'])){
		$dept = mysqli_real_escape_string($link,$_REQUEST['dept']);
		  $sql="SELECT * FROM  Student WHERE Department ='$dept'";
		  $sql1= " AND Department ='$dept' ";
		   $statement = $connection->prepare($sql);
    if ($statement->execute()) {
        $people = $statement->fetchAll(PDO::FETCH_OBJ);
        header("location:stu_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&flag=".$flag."&sql1=".$sql1);
    }
     else{
		echo "ERROR: Could not able to execute $sql.";
	}

}
	elseif(!empty($_POST['dept']) && !empty($_POST['year']) && empty($_POST['division'])){
		$dept = mysqli_real_escape_string($link,$_REQUEST['dept']);
		$year = mysqli_real_escape_string($link,$_REQUEST['year']);
		  $sql="SELECT * FROM  Student WHERE Department ='$dept' AND Year = '$year'";
		  $sql1= " AND Department ='$dept' AND Year = '$year' ";
		   $statement = $connection->prepare($sql);
    if ($statement->execute()) {
        $people = $statement->fetchAll(PDO::FETCH_OBJ);
        header("location:stu_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&flag=".$flag."&sql1=".$sql1);
    }
     else{
		echo "ERROR: Could not able to execute $sql.";
	}
}
	elseif(!empty($_POST['dept']) && !empty($_POST['year']) && !empty($_POST['division'])){
		$dept = mysqli_real_escape_string($link,$_REQUEST['dept']);
		$year = mysqli_real_escape_string($link,$_REQUEST['year']);
		$div = mysqli_real_escape_string($link,$_REQUEST['division']);
		$div1 = $year.$div;
		//echo $div1;
		  $sql="SELECT * FROM  Student WHERE Department ='$dept' AND Class = '$div1' ";
		  $sql1= " AND Department ='$dept' AND Year = '$year' ";
		   $statement = $connection->prepare($sql);
    if ($statement->execute()) {
        $people = $statement->fetchAll(PDO::FETCH_OBJ);
        header("location:stu_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&flag=".$flag."&sql1=".$sql1);
    }
     else{
		echo "ERROR: Could not able to execute $sql.";
	}
}
	else{
	echo "Error";
}


?>
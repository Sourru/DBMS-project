<?php
require 'db.php';
$id = isset($_GET['ID']) ? $_GET['ID'] : '';
$flag = isset($_GET['flag']) ? $_GET['flag'] : 0;
$dept = isset($_GET['Dept']) ? $_GET['Dept'] : '';
$act = isset($_GET['act']) ? $_GET['act'] : '';
$class = isset($_GET['Class']) ? $_GET['Class'] : '';
$sql = '';
$print ='';

if($flag==0){
	$sql = 'SELECT s.*,st.Rollno,st.Year FROM social_work s INNER JOIN Student st ON s.ID = st.ID';
	$print ='Social Work:- All Students';
}
elseif($flag==1){

	$sql = "SELECT s.*,st.Rollno,st.Year FROM social_work s INNER JOIN Student st ON s.ID = st.ID WHERE st.Department ='$dept'";
	$print ='Social Work:-'.$dept.' Department';
}
elseif($flag==2){
	$sql = "SELECT s.*,st.Rollno,st.Year FROM social_work s INNER JOIN Student st ON s.ID = st.ID WHERE UPPER(s.Nature_of_work) =UPPER('$act')";
	$print ='Social Work:-'.$act;
}
elseif($flag==3){

	$sql = "SELECT s.*,st.Rollno,st.Year FROM social_work s INNER JOIN Student st ON s.ID = st.ID WHERE st.Class ='$class'";
	$print ='Social Work:-'.$class.' Class';
}
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
header("location:social_cal.php?ID=".$id."&print=".$print."&people=". urlencode(serialize($people)));
 ?>

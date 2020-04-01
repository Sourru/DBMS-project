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
	$sql = 'SELECT s.*,st.Rollno,st.Year FROM arts s INNER JOIN Student st ON s.ID = st.ID';
	$print ='Arts:- All Students';
}
elseif($flag==1){

	$sql = "SELECT s.*,st.Rollno,st.Year FROM arts s INNER JOIN Student st ON s.ID = st.ID WHERE st.Department ='$dept'";
	$print ='Arts:-'.$dept.' Department';
}
elseif($flag==2){
	$sql = "SELECT s.*,st.Rollno,st.Year FROM arts s INNER JOIN Student st ON s.ID = st.ID WHERE UPPER(s.Art_Type) =UPPER('$act')";
	$print ='Arts:-'.$act;
}
elseif($flag==3){

	$sql = "SELECT s.*,st.Rollno,st.Year FROM arts s INNER JOIN Student st ON s.ID = st.ID WHERE st.Class ='$class'";
	$print ='Arts:-'.$class.' Class';
}
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
header("location:arts_cal.php?ID=".$id."&print=".$print."&people=". urlencode(serialize($people)));
 ?>

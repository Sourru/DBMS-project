<?php
require 'db.php';

$id = isset($_GET['ID']) ? $_GET['ID'] : '';
$df = '';
$dt = '';

if(isset($_POST['text1'])){
    $df1 = mysqli_real_escape_string($connection, $_REQUEST['df']);
    $df = date('Y-m-d',strtotime($df1)); 
    //echo "Hii";
}
else{
	echo "Error";
}

if(isset($_POST['text2'])){
    $dt1 = mysqli_real_escape_string($connection, $_REQUEST['dt']);
    $df = date('Y-m-d',strtotime($dt1)); 
}
/*

$sql = 'SELECT * FROM sports where Date_Sports >= :DF and Date_Sports <= :DT';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
if ($statement->execute([':DF' => $df,':DT' => $dt])) {
 header("location:sports_cal.php?ID=".$id."&people=". urlencode(serialize($people)));
}
else{
	echo "ERROR: Could not able to execute $sql. ";
}
*/
?>
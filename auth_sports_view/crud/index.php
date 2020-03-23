<?php
require 'db.php';
$id = isset($_GET['ID']) ? $_GET['ID'] : '';
$sql = 'SELECT * FROM sports';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
header("location:sports_cal.php?ID=".$id."&people=". urlencode(serialize($people)));
 ?>

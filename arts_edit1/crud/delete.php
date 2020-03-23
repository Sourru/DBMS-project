<?php
require 'db.php';
$id = $_GET['ID'];
$art = $_GET['art'];
$des = $_GET['des'];
$ven = $_GET['venue'];
$ach = $_GET['ach'];
$sql = 'DELETE FROM arts WHERE ID=:id AND Art_Type=:art AND Description=:des AND Venue=:ven AND Achievements=:ach';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id,':art' => $art,':des' => $des,':ven' => $ven,':ach' => $ach])) {
  header("Location:index.php?ID=".$id);
}
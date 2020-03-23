<?php
require 'db.php';
$id = $_GET['ID'];
$art = $_GET['art'];
$des = $_GET['des'];
$ven = $_GET['venue'];
$ach = $_GET['ach'];
$sql = 'DELETE FROM social_work WHERE ID=:id AND Nature_of_work=:art AND Description=:des AND Venue=:ven AND Associated_org=:ach';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id,':art' => $art,':des' => $des,':ven' => $ven,':ach' => $ach])) {
  header("Location:index.php?ID=".$id);
}
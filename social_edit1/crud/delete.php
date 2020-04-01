<?php
require 'db.php';
$id = $_GET['ID'];
$uid = $_GET['uid'];
$sql = 'DELETE FROM social_work WHERE ID=:id AND UID=:uid';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id,':uid' => $uid])) {
  header("Location:index.php?ID=".$id);
}
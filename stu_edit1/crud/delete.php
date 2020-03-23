<?php
require 'db.php';
$id = $_GET['ID'];
$sql = 'DELETE FROM student WHERE ID=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: /");
}
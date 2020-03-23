<?php
require 'db.php';
$id = $_GET['ID'];
$sql = 'DELETE FROM authority WHERE ID=:id ';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location:/projects/Auth_register.php");
}
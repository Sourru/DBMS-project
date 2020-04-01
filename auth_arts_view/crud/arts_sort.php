<?php
require 'db.php';
$id = isset($_GET['ID']) ? $_GET['ID'] : '';
$column = isset($_GET['column']) ? $_GET['column'] : 'None';
$sort_order = isset($_GET['order']) ? $_GET['order'] : 'None';
$sql1 = isset($_GET['sql']) ? urldecode($_GET['sql']) : '';
$flag = isset($_GET['flag']) ? $_GET['flag'] : '';
$sql2 = isset($_GET['sql1']) ? urldecode($_GET['sql1']) : '';

  if($column != 'None' && $sort_order != 'None'){
     $columns = array('ID','Art_type','Description','Venue','Achievements','Date_Arts','Rollno','Year');
  $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
  $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
  }

    if($flag ==0){
    $sql='SELECT s.*,st.Rollno,st.Year FROM arts s INNER JOIN Student st ON s.ID = st.ID ORDER BY '.$column.' '.$sort_order;
    $statement = $connection->prepare($sql);
    if ($statement->execute()) {
        $people = $statement->fetchAll(PDO::FETCH_OBJ);
        $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
    $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
        header("location:arts_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&column=".$column."&order=".$sort_order."&flag=".$flag."&sql=".$sql1);
    }
  }
  elseif($flag == 1){
    
    $sql = "SELECT s.*,st.Rollno,st.Year FROM arts s INNER JOIN Student st ON s.ID = st.ID $sql1 ORDER BY ".$column." ".$sort_order;
    //echo $sql;
    $statement = $connection->prepare($sql);
    if ($statement->execute()) {
        $people = $statement->fetchAll(PDO::FETCH_OBJ);
        $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
    $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
        header("location:arts_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&column=".$column."&order=".$sort_order."&flag=".$flag."&sql=".$sql1);
    }
  }
  elseif($flag == 2){
    
    $sql = "SELECT s.*,st.Rollno,st.Year FROM arts s INNER JOIN Student st ON s.ID = st.ID $sql1 $sql2 ORDER BY ".$column." ".$sort_order;
    echo $sql;
    $statement = $connection->prepare($sql);
    if ($statement->execute()) {
        $people = $statement->fetchAll(PDO::FETCH_OBJ);
        $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
    $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
        header("location:arts_cal.php?ID=".$id."&people=". urlencode(serialize($people))."&column=".$column."&order=".$sort_order."&flag=".$flag."&sql=".$sql1."&sql1=".$sql2);
    }
  }
 
?>

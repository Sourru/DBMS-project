<?php
require 'db.php';
$id = isset($_GET['ID']) ? $_GET['ID'] : '';
$sql = 'SELECT * FROM student';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>


<!doctype html>
<html lang="en">
  <head>
    <title>Student information</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="bg-info">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="/projects/Auth_page1.php?ID=<?php echo urlencode($id) ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Show Students</a>
      </li>     
    </ul>
  </div>
</nav>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Student information</h2>
    </div>
    <div class="card-body" style="overflow: scroll;">
      <table class="table table-bordered">
        <tr>
          <th>Reg. ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Class</th>
          <th>Department</th>
          <th>Birth Date</th>
          <th>Email</th>
          <th>Mobile No.</th>
          <th>Address</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->ID; ?></td>
            <td><?= $person->FName; ?></td>
            <td><?= $person->LName; ?></td>
            <td><?= $person->Class; ?></td>
            <td><?= $person->Department; ?></td>
            <td><?= $person->DOB; ?></td>
            <td><?= $person->Email; ?></td>
            <td><?= $person->Mobile; ?></td>
            <td><?= $person->Address; ?></td> 
          
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>

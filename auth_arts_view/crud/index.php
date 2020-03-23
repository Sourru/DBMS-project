<?php
require 'db.php';
$id = isset($_GET['ID']) ? $_GET['ID'] : '';
$sql = 'SELECT * FROM arts';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>


<!doctype html>
<html lang="en">
  <head>
    <title>Arts Information</title>
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
      <h2>Arts:- All Students</h2>
    </div>
    <div class="card-body" style="overflow: scroll;">
      <table class="table table-bordered">
        <tr>
          <th>Reg. ID</th>
          <th>Type Of Art</th>
          <th>Description</th>
          <th>Venue</th>
          <th>Achievements</th>
          <th>Date of Occasion</th>
          
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->ID; ?></td>
            <td><?= $person->Art_Type; ?></td>
            <td><?= $person->Description; ?></td>
            <td><?= $person->Venue; ?></td>
            <td><?= $person->Achievements; ?></td>
            <td><?= $person->Date_Arts; ?></td>      
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>

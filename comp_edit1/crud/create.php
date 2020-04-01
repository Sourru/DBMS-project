<?php
require 'db.php';
$id = $_GET['ID'];
$message = '';
if (isset ($_POST['Type'])  && isset($_POST['Description']) && isset($_POST['Venue']) && isset($_POST['Achievements'])  && isset($_POST['DOB']) ) {
  $type = $_POST['Type'];
  $descp = $_POST['Description'];
  $venue = $_POST['Venue'];
  $achieve = $_POST['Achievements'];
  $rawdate = $_POST['DOB'];
  $dob = date('Y-m-d',strtotime($rawdate));
  $uid = uniqid("CMP-");
  $sql = 'INSERT INTO competitive(UID,ID,Event,Description,Venue,Achievements,Date_comp) VALUES(:uid,:id,:type,:descp,:venue,:achieve,:dob)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':uid' => $uid,':id' => $id,':type' => $type,':descp' => $descp,':venue' => $venue,':achieve' => $achieve,':dob' => $dob])) {
    $message = 'data inserted successfully';
  }
  
}
else{
    $message = 'data insertion Unsuccessful';
  }
 ?>

<html lang="en">
  <head>
    <title>Competitive Coding</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="bg-info">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/projects/stu_page1.php?ID=<?php echo $id?>">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php?ID=<?php echo $id?>">Achievements</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Add Achievements</a>
      </li> 
    </ul>
  </div>
  
</nav>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create Achievement</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        
        <div class="form-group">
          <label for="Type">Event</label>
          <input type="text" name="Type" id="fname" class="form-control">
        </div>
        <div class="form-group">
          <label for="Description">Description</label>
          <input type="text" name="Description" id="lname" class="form-control">
        </div>
        <div class="form-group">
          <label for="Venue">Venue</label>
          <input type="text" name="Venue" id="cls" class="form-control">
        </div>
         <div class="form-group">
          <label for="Achievements">Achievements</label>
          <input type="text" name="Achievements" id="depart" class="form-control">
        </div>
         <div class="form-group">
          <label for="DOB">Date of Occasion</label>
          <input type="date" name="DOB" id="dob" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create Achievement</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>

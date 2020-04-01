<?php
require 'db.php';
$id = $_GET['ID'];
$sql = 'SELECT * FROM authority WHERE ID=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['FName'])  && isset($_POST['Cls']) && isset($_POST['Department'])  && isset($_POST['DOB']) && isset($_POST['Email'])  && isset($_POST['Mobile'])  && isset($_POST['Address']) && isset($_POST['Password'])) {
  $fname = $_POST['FName'];
  $desgn=$_POST['Designation'];
  $cls = $_POST['Cls'];
  $depart = $_POST['Department'];
  $email = $_POST['Email'];
  $mobile = $_POST['Mobile'];
  $pass = $_POST['Password'];
  $sql = 'UPDATE authority SET Full_Name=:fname,Designation=:desgn,Class=:cls,Department=:depart,Email=:email,Mobile=:mobile,Password=:pass WHERE ID=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':fname' => $fname,':desgn' => $desgn,':cls' => $cls,':depart' =>$depart,':email' => $email,':mobile' => $mobile,':pass' => $pass,':id' => $id])) {
    header("Location: index.php");
  }

}


 ?>
<html lang="en">
  <head>
    <title>Authority Profile</title>
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
        <a class="nav-link" href="view_auth_profile.php?ID=<?php echo $id?>">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Edit</a>
      </li>
      
      
    </ul>
  </div>
  
</nav>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update Profile</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="FName">Full Name</label>
          <input value="<?= $person->Full_Name; ?>" type="text" name="FName" id="fname" class="form-control">
        </div>
        
        <div class="form-group">
          <label for="Cls">Designation</label>
          <input value="<?= $person->Designation; ?>" type="text" name="Designation" id="desgn" class="form-control">
        </div>
        <div class="form-group">
          <label for="Cls">Class</label>
          <input value="<?= $person->Class; ?>" type="text" name="Cls" id="cls" class="form-control">
        </div>
         <div class="form-group">
          <label for="Department">Department</label>
          <input  value="<?= $person->Department; ?>" type="text" name="Department" id="depart" class="form-control">
        </div>
        <div class="form-group">
          <label for="Email">Email</label>
          <input type="email" value="<?= $person->Email; ?>" name="Email" id="email" class="form-control">
        </div>
         <div class="form-group">
          <label for="Mobile">Mobile No.</label>
          <input value="<?= $person->Mobile; ?>" type="number" name="Mobile" id="mobile" class="form-control"  minlength="10" maxlength="10">
        </div>
         <div class="form-group">
          <label for="Password">Password</label>
          <input value="<?= $person->Password; ?>" type="password" name="Password" id="pass" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>

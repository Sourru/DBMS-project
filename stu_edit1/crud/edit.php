<?php
require 'db.php';
$id = $_GET['ID'];
$sql = 'SELECT * FROM student WHERE ID=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['FName'])  && isset($_POST['LName']) && isset($_POST['Cls']) && isset($_POST['Department'])  && isset($_POST['DOB']) && isset($_POST['Email'])  && isset($_POST['Mobile'])  && isset($_POST['Address']) && isset($_POST['Password'])) {
  $fname = $_POST['FName'];
  $lname = $_POST['LName'];
  $cls = $_POST['Cls'];
  $depart = $_POST['Department'];
  $rawdate = $_POST['DOB'];
  $dob = date('Y-m-d',strtotime($rawdate));
  $email = $_POST['Email'];
  $mobile = $_POST['Mobile'];
  $address = $_POST['Address'];
  $pass = $_POST['Password'];
  $sql = 'UPDATE student SET FName=:fname,LName=:lname,Class=:cls,Department=:depart,DOB=:dob,Email=:email,Mobile=:mobile,Address=:address,Password=:pass WHERE ID=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':fname' => $fname,':lname' => $lname,':cls' => $cls,':depart' => $depart,':dob' => $dob,':email' => $email,':mobile' => $mobile,':address' => $address,':pass' => $pass,':id' => $id])) {
    header("Location: index.php");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="FName">First Name</label>
          <input value="<?= $person->FName; ?>" type="text" name="FName" id="fname" class="form-control">
        </div>
        <div class="form-group">
          <label for="LName">Last Name</label>
          <input value="<?= $person->LName; ?>" type="text" name="LName" id="lname" class="form-control">
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
          <label for="DOB">Birth Date</label>
          <input  value="<?= $person->DOB; ?>" type="date" name="DOB" id="dob" class="form-control">
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
          <label for="Address">Address</label>
          <input value="<?= $person->Address; ?>" type="text" name="Address" id="address" class="form-control">
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

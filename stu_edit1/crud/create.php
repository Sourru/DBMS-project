<?php
require 'db.php';
$message = '';
if (isset ($_POST['ID'])  && isset ($_POST['FName'])  && isset($_POST['LName']) && isset($_POST['Cls']) && isset($_POST['Department'])  && isset($_POST['DOB']) && isset($_POST['Email'])  && isset($_POST['Mobile'])  && isset($_POST['Address']) && isset($_POST['Password'])) {
  $id = $_POST['ID'];
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
  $sql = 'INSERT INTO student(ID,FName,LName,Class,Department,DOB,Email,Mobile,Address,Password) VALUES(:id,:fname,:lname,:cls,:depart,:dob,:email,:mobile,:address,:pass)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':id' => $id,':fname' => $fname,':lname' => $lname,':cls' => $cls,':depart' => $depart,':dob' => $dob,':email' => $email,':mobile' => $mobile,':address' => $address,':pass' => $pass])) {
    $message = 'data inserted successfully';
  }


}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
         <div class="form-group">
          <label for="ID">Reg. ID</label>
          <input type="text" name="ID" id="id" class="form-control">
        </div>
        <div class="form-group">
          <label for="FName">First Name</label>
          <input type="text" name="FName" id="fname" class="form-control">
        </div>
        <div class="form-group">
          <label for="LName">Last Name</label>
          <input type="text" name="LName" id="lname" class="form-control">
        </div>
        <div class="form-group">
          <label for="Cls">Class</label>
          <input type="text" name="Cls" id="cls" class="form-control">
        </div>
         <div class="form-group">
          <label for="Department">Department</label>
          <input type="text" name="Department" id="depart" class="form-control">
        </div>
         <div class="form-group">
          <label for="DOB">Birth Date</label>
          <input type="date" name="DOB" id="dob" class="form-control">
        </div>
        <div class="form-group">
          <label for="Email">Email</label>
          <input type="email" name="Email" id="Email" class="form-control">
        </div>
         <div class="form-group">
          <label for="Mobile">Mobile No.</label>
          <input type="number" name="Mobile" id="mobile" class="form-control"  minlength="10">
        </div>
         <div class="form-group">
          <label for="Address">Address</label>
          <input type="text" name="Address" id="address" class="form-control">
        </div>
         <div class="form-group">
          <label for="Password">Password</label>
          <input type="password" name="Password" id="pass" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create a person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>

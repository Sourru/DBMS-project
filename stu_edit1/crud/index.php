<?php
require 'db.php';
$sql = 'SELECT * FROM student';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Student Information</h2>
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
          <th>Password</th>
          <th>Action</th>
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
            <td><?= $person->Password; ?></td> 
            

            <td>
              <a href="edit.php?ID=<?= $person->ID ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?ID=<?= $person->ID ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>

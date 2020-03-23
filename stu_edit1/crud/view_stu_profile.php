<?php
session_start();

$id = isset($_GET['ID']) ? $_GET['ID'] : '';

        $usernm="root";
        $passwd="";
        $host="localhost";
        $database="dbms_project";

        $conn = mysqli_connect($host,$usernm,$passwd,$database);

        if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
}

        $sql = "SELECT * FROM student WHERE ID = '$id'";
        $result = mysqli_query ($conn,$sql) or die ('Error');

?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Profile</h2>
    </div>
    <div class="card-body">
     
      <form method="post">
      	<?php
      	if (mysqli_num_rows($result) > 0) {
  
        while ($row = mysqli_fetch_array ($result)){
 
       ?>
         <div class="form-group">
          <label for="ID">Reg. ID</label>
          <input type="text" name="ID" id="id" value="<?php echo $row ['ID'];?>" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label for="FName">First Name</label>
          <input type="text" name="FName" id="fname" value="<?php echo $row ['FName'];?>" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label for="LName">Last Name</label>
          <input type="text" name="LName" id="lname" value="<?php echo $row ['LName'];?>" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label for="Cls">Class</label>
          <input type="text" name="Cls" id="cls" value="<?php echo $row ['Class'];?>" class="form-control" disabled>
        </div>
         <div class="form-group">
          <label for="Department">Department</label>
          <input type="text" name="Department" id="depart" value="<?php echo $row ['Department'];?>" class="form-control "disabled>
        </div>
         <div class="form-group">
          <label for="DOB">Birth Date</label>
          <input type="date" name="DOB" id="dob" value="<?php echo $row ['DOB'];?>" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label for="Email">Email</label>
          <input type="email" name="Email" id="Email" value="<?php echo $row ['Email'];?>"  class="form-control" disabled>
        </div>
         <div class="form-group">
          <label for="Mobile">Mobile No.</label>
          <input type="text" name="Mobile" id="mobile" value="<?php echo $row ['Mobile'];?>" class="form-control" disabled>
        </div>
         <div class="form-group">
          <label for="Address">Address</label>
          <input type="text" name="Address" id="address" value="<?php echo $row ['Address'];?>" class="form-control" disabled>
        </div>
         <div class="form-group">
          <label for="Password">Password</label>
          <input type="text" name="Password" id="pass" value="<?php echo $row ['Password'];?>" class="form-control" disabled>
        </div>
        <?php
        		}
    		} else {
    			echo "0 results";
			}
        ?>
        <div class="form-group">
         <a href="edit.php?ID=<?php echo $id?>" class="btn btn-info">Edit</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>

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

        $sql = "SELECT * FROM authority WHERE ID = '$id'";
        $result = mysqli_query ($conn,$sql) or die ('Error');

?>


<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="bg-info">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/projects/auth_page1.php?ID=<?php echo $id?>">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="edit.php?ID=<?php echo $id?>">Edit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="return confirm('Are you sure you want to delete this Account?')" href="delete.php?ID=<?php echo $id?>">Delete Account</a>
      </li>
      
      
    </ul>
  </div>
  
</nav>

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
          <label for="Address">Address</label>
          <input type="text" name="Address" id="address" value="<?php echo $row ['Designation'];?>" class="form-control" disabled>
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
          <label for="Email">Email</label>
          <input type="email" name="Email" id="Email" value="<?php echo $row ['Email'];?>"  class="form-control" disabled>
        </div>
         <div class="form-group">
          <label for="Mobile">Mobile No.</label>
          <input type="text" name="Mobile" id="mobile" value="<?php echo $row ['Mobile'];?>" class="form-control" disabled>
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

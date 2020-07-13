<?php include_once('../profile_photo/processForm.php') ?>
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

        $sql1 = "SELECT * FROM files where UID='$uid'";
        $result1 = mysqli_query($conn, $sql1);

?>


<html lang="en">
  <head>
    <title>Student Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../profile_photo/main.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
$(document).ready(function(){
    $("#submit").hide();  
    $("#profileImage").on("change", function(){
        $("#submit").show();  
    })
});
</script>
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
        <a class="nav-link" href="">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="edit.php?ID=<?php echo $id?>">Edit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="return confirm('Are you sure you want to delete this Account?')" href="delete.php?ID=<?php echo $id?>">Delete Account</a>
      </li>
     <!-- <li class="nav-item">
        <a class="nav-link" href="../teacher_view/view_stu_profile.php?ID=<?php echo $id?>">View Profile Photo</a>
      </li> -->
    </ul>
  </div>
  
</nav>

<div class="container">
  
  <div class="card mt-5">
    <div class="card-header">
      <h2>Profile</h2>
    </div>
    <div class="card-body">
     <div class="row">
      <div class="col-12 offset-md-12 form-div">
        <form action="view_stu_profile.php?ID=<?php echo urlencode($id)?>" method="post" enctype="multipart/form-data">
          <h2 class="text-center mb-12 mt-12">Student Profile Photo</h2>
          <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
          <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Update image</h4>
              </div>
              <?php if(mysqli_num_rows($result1) == 1){
                $row = mysqli_fetch_array ($result1);
               //echo $row['Name'];
                ?>
              <img src="<?php echo '../../file/uploads/'.$id.'/Profile/' . $row['Name'] ?>" onClick="triggerClick()" id="profileDisplay">
             
            <?php }else{?>
                <img src="../profile_photo/placeholder.jpg" onClick="triggerClick()" id="profileDisplay">
                 
             <?php }?> 
            </span>
                 <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                  <h5>Profile Photo</h5>
            </div>
            <div class="form-group" >
              <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block">Save</button>
            </div>
          
        </form>
      </div>
    </div>
      <form method="post">
      	<?php
      	if (mysqli_num_rows($result) > 0) {
  
        while ($row = mysqli_fetch_array ($result)){
 
       ?>
       <div class="row2">
         <div class="form-group">
          <label for="ID">Reg. ID</label>
          <input type="text" name="ID" id="id" value="<?php echo $row ['ID'];?>" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label for="FName">Full Name</label>
          <input type="text" name="FName" id="fname" value="<?php echo $row ['Full_Name'];?>" class="form-control" disabled>
        </div>
        
        <div class="form-group">
          <label for="Cls">Class</label>
          <input type="text" name="Cls" id="cls" value="<?php echo $row ['Class'];?>" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label for="Roll">Class</label>
          <input type="text" name="Roll" id="roll" value="<?php echo $row ['Rollno'];?>" class="form-control" disabled>
        </div>
         <div class="form-group">
          <label for="Department">Department</label>
          <input type="text" name="Department" id="depart" value="<?php echo $row ['Department'];?>" class="form-control "disabled>
        </div>
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
<script src="../profile_photo/script.js"></script>
<?php require 'footer.php'; ?>

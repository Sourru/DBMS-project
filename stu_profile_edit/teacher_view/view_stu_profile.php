<?php include_once('../profile_photo/processForm.php') ?>
<?php
session_start();

$id = isset($_GET['ID']) ? $_GET['ID'] : '';
$aid = isset($_GET['aid']) ? $_GET['aid'] : '';

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

        $sql2 = "SELECT * FROM sports WHERE ID = '$id'";
        $result2 = mysqli_query ($conn,$sql2) or die ('Error');

        $sql3 = "SELECT * FROM arts WHERE ID = '$id'";
        $result3 = mysqli_query ($conn,$sql3) or die ('Error');

        $sql4 = "SELECT * FROM competitive WHERE ID = '$id'";
        $result4 = mysqli_query ($conn,$sql4) or die ('Error');

        $sql5 = "SELECT * FROM social_work WHERE ID = '$id'";
        $result5 = mysqli_query ($conn,$sql5) or die ('Error');

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
  <a class="navbar-brand" href="/projects/Auth_page1.php?ID=<?php echo $aid?>">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <!--  <li class="nav-item">
        <a class="nav-link" href="">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="edit.php?ID=<?php echo $id?>">Edit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="return confirm('Are you sure you want to delete this Account?')" href="delete.php?ID=<?php echo $id?>">Delete Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../profile_photo/form.php?ID=<?php echo $id?>">View Profile Photo</a>
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
        <form enctype="multipart/form-data">
          <h2 class="text-center mb-12 mt-12">Student Profile Photo</h2>
          <?php if (!empty($msg)): ?>
            <div class="alert <?php echo $msg_class ?>" role="alert">
              <?php echo $msg; ?>
            </div>
          <?php endif; ?>
          <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <?php if(mysqli_num_rows($result1) == 1){
                $row = mysqli_fetch_array ($result1);
               //echo $row['Name'];
                ?>
              <img src="<?php echo '../../file/uploads/'.$id.'/Profile/' . $row['Name'] ?>" id="profileDisplay">
             
            <?php }else{?>
                <img src="../profile_photo/placeholder.jpg" onClick="triggerClick()" id="profileDisplay">
                 
             <?php }?> 
            </span>
                
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
        

        <?php
        		}
    		} else {
    			echo "0 results";
			}
        ?>
      </form>
    </div>
  </div>
</div>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Art Achievements</h2>
    </div>
    <div class="card-body" style="overflow: scroll;">
      <table class="table table-bordered">
        <tr>
          <th>Reg. ID</th>
          <th>Type of Art</th>
          <th>Description</th>
          <th>Venue</th>
          <th>Achievements</th>
          <th>Date of Occasion</th>
          <th>Certificate</th>
        </tr>
        <?php if (mysqli_num_rows($result3) > 0) {
  
        while ($row = mysqli_fetch_array ($result3)){
       ?>
          <tr>
            <td><?php echo $row ['ID'];?></td>
            <?php $uid = $row ['UID'];?>
            <td><?php echo $row ['Art_Type'];?>
                <?php $type = $row ['Art_Type'];?>
            </td>
            <td><?php echo $row ['Description'];?> 
                <?php $desc = $row ['Description'];?>
            </td>
            <td><?php echo $row ['Venue'];?>
              <?php $venue = $row ['Venue'];?>
            </td>
            <td><?php echo $row ['Achievements'];?>
              <?php $ach = $row ['Achievements'];?>
            </td>
            <td><?php echo $row ['Date_Arts'];?></td>
            <td><a href="../../file/solo_download.php?ID=<?php echo $row ['ID']?>&uid=<?php echo $row ['UID']?>&type=Arts" style="margin:5%;font-size: 14px;" >Download</a></td>
            
          </tr>
        <?php }
        } else {
          echo "0 results";
      } ?>
      </table>
    </div>
  </div>
</div>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Competitive Coding</h2>
    </div>
    <div class="card-body" style="overflow: scroll;">
      <table class="table table-bordered">
        <tr>
          <th>Reg. ID</th>
          <th>Event</th>
          <th>Description</th>
          <th>Venue</th>
          <th>Achievements</th>
          <th>Date of Occasion</th>
          <th>Certificate</th>
        </tr>
        <?php if (mysqli_num_rows($result4) > 0) {
  
        while ($row = mysqli_fetch_array ($result4)){
       ?>
          <tr>
            <td><?php echo $row ['ID'];?></td>
             <?php $uid = $row['UID']; ?>
            <td><?php echo $row ['Event'];?>
                  <?php $type = $row ['Event'];?>
            </td>
            <td><?php echo $row ['Description'];?>
                  <?php $desc = $row ['Description'];?>
            </td>
            <td><?php echo $row ['Venue'];?>
              <?php $venue = $row ['Venue'];?>
            </td>
            <td><?php echo $row ['Achievements'];?>
              <?php $ach = $row ['Achievements'];?>
            </td>
            <td><?php echo $row ['Date_comp'];?></td>
            <td><a href="../../file/solo_download.php?ID=<?php echo $row ['ID']?>&uid=<?php echo $row ['UID']?>&type=Comp" style="margin:5%;font-size: 14px;" >Download</a></td>
            
          </tr>
        <?php }
        } else {
          echo "0 results";
      } ?>
      </table>
    </div>
  </div>
</div>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Social Work Achievements</h2>
    </div>
    <div class="card-body" style="overflow: scroll;">
      <table class="table table-bordered">
        <tr>
          <th>Reg. ID</th>
          <th>Nature_of_work</th>
          <th>Description</th>
          <th>Associated Organisation</th>
          <th>Venue</th>
          <th>Date of Occasion</th>
          <th>Certificate</th>
        </tr>
        <?php if (mysqli_num_rows($result5) > 0) {
  
        while ($row = mysqli_fetch_array ($result5)){
       ?>
          <tr>
            <td><?php echo $row ['ID'];?></td>
             <?php $uid = $row ['UID'];?>
            <td><?php echo $row ['Nature_of_work'];?>
              <?php $type = $row ['Nature_of_work'];?>
            </td>
            <td><?php echo $row ['Description'];?>
               <?php $desc = $row ['Description'];?>
            </td>
            <td><?php echo $row ['Associated_org'];?>
              <?php $ach = $row ['Associated_org'];?>
            </td>
            <td><?php echo $row ['Venue'];?>
              <?php $venue = $row ['Venue'];?>
            </td>
            <td><?php echo $row ['Date_SW'];?></td>
            <td><a href="../../file/solo_download.php?ID=<?php echo $row ['ID']?>&uid=<?php echo $row ['UID']?>&type=Social" style="margin:5%;font-size: 14px;" >Download</a></td>
            
          </tr>
        <?php }
        } else {
          echo "0 results";
      } ?>
      </table>
    </div>
  </div>
</div>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Sports Achievements</h2>
    </div>
    <div class="card-body" style="overflow: scroll;">
      <table class="table table-bordered">
        <tr>
          <th>Reg. ID</th>
          <th>Sports Name</th>
          <th>Description</th>
          <th>Venue</th>
          <th>Achievements</th>
          <th>Date of Occasion</th>
          <th>Certificate</th>
        </tr>
        <?php if (mysqli_num_rows($result2) > 0) {
  
        while ($row = mysqli_fetch_array ($result2)){
       ?>
          <tr>
            <td><?php echo $row ['ID'];?></td>
                <?php $uid = $row ['UID'];?>
            <td><?php echo $row ['Sports_Name'];?>
               <?php $type = $row ['Sports_Name'];?>
            </td>
            <td><?php echo $row ['Description'];?></td>
            <?php $desc = $row ['Description'];?>
            <td><?php echo $row ['Venue'];?>
              <?php $venue = $row ['Venue'];?>
            </td>
            <td><?php echo $row ['Achievements'];?>
              <?php $ach = $row ['Achievements'];?>
            </td>
            <td><?php echo $row ['Date_Sports'];?></td>
            
            
           <td><a href="../../file/solo_download.php?ID=<?php echo $row ['ID']?>&uid=<?php echo $row ['UID']?>&type=Sports" style="margin:5%;font-size: 14px;" >Download</a></td>
                        
          </tr>
        <?php }
        } else {
          echo "0 results";
      } ?>
      </table>
    </div>
  </div>
</div>




<script src="../profile_photo/script.js"></script>
<?php require 'footer.php'; ?>

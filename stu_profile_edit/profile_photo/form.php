<?php include_once('processForm.php') ?>
<?php 
 $sql1 = "SELECT * FROM files where UID='$uid'";
$result = mysqli_query($conn, $sql1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
$(document).ready(function(){
    $("#submit").hide();  
    $("#profileImage").on("change", function(){
        $("#submit").show();  
    })
});
</script>
  <title>Image Preview and Upload PHP</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-4 offset-md-4 form-div">
        <form action="form.php?ID=<?php echo urlencode($id)?>" method="post" enctype="multipart/form-data">
          <h2 class="text-center mb-3 mt-3">Update profile</h2>
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
              <?php if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array ($result);
               //echo $row['Name'];
                ?>
              <img src="<?php echo '../../file/uploads/'.$id.'/Profile/' . $row['Name'] ?>" onClick="triggerClick()" id="profileDisplay">
             
            <?php }else{?>
                <img src="placeholder.jpg" onClick="triggerClick()" id="profileDisplay">
                 
             <?php }?> 
            </span>
                 <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                  <label>Profile Image</label>
            </div>
            <div class="form-group" >
              <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block">Save</button>
            </div>
          
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<script src="script.js"></script>

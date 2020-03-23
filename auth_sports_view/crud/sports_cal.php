<?php
$df1='';
$dt1='';

$id = isset($_GET['ID']) ? $_GET['ID'] : '';
$people =unserialize(urldecode($_GET['people']));


?>


<!doctype html>
<html lang="en">
  <head>
    <title>Sports Information:- All Students</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script >
      $('#submit_dt').click(function(evt){
    var val1 = $('#df_id').val();
    var val2 = $('#dt_id').val();
    $.ajax({
        type: "POST",
        url: "sports_date.php",
       data: {text1:val1,text2:val2}
       success: function () {
              alert('form was submitted');
    });
    evt.preventDefault();
    return false;
});

    </script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="bg-info">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="/projects/Auth_page1.php?ID=<?php echo urlencode($id) ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Show Students</a>
      </li>     
    
      <li class="nav-item" >
        <label for="df" style="padding-left: 620px;padding-right: 10px">From Date</label>
        <input id="df_id" type="date" name="df">
      </li>
   
     
      <li class="nav-item" >
        <label for="df" style="padding-left: 40px;padding-right: 10px">To Date</label>
        <input id="dt_id" type="date" name="dt">
      </li>
  
      <li class="nav-item" style="padding-left: 20px">
       <a id="submit_dt" href="sports_date.php?ID=<?php echo urlencode($id)?>"  class="btn btn-info">Submit</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Sports:- All Students</h2>
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
          
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->ID; ?></td>
            <td><?= $person->Sports_Name; ?></td>
            <td><?= $person->Description; ?></td>
            <td><?= $person->Venue; ?></td>
            <td><?= $person->Achievements; ?></td>
            <td><?= $person->Date_Sports; ?></td>   
          
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>

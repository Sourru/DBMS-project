<?php
require 'db.php';
$id = isset($_GET['ID']) ? $_GET['ID'] : '';
$people =unserialize(urldecode($_GET['people']));
$column = isset($_GET['column']) ? $_GET['column'] : 'None';
$sort_order = isset($_GET['order']) ? $_GET['order'] : 'None';
$flag = isset($_GET['flag']) ? $_GET['flag'] : 0;
$print = isset($_GET['print']) ? $_GET['print'] : 'Sports:- All Students';
$sql = '';
$sql1 = '';
  if($flag == 1){
    $sql = isset($_GET['sql']) ? urldecode($_GET['sql']) : '';
  }
  elseif($flag == 2){
    $sql = isset($_GET['sql']) ? urldecode($_GET['sql']) : '';
    $sql1 = isset($_GET['sql1']) ? urldecode($_GET['sql1']) : '';
  }


  if($column != 'None' && $sort_order != 'None'){
    $columns = array('ID','Sports_Name','Description','Venue','Achievements','Date_Sports','Rollno','Year');
  $column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
  $sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';   
  }
    
    $up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
    $asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
    
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Sports Information:- All Students</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<style type="text/css">



form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 75%;
  height: 37px;
  background: #f1f1f1;
}

form.example button{
  float: left;
  width: 25%;
  padding: 1px;
  background: #2196F3;
  color: white;
  font-size: 15px;
  height: 37px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example1 input[name=dept] {
  padding: 10px;
  font-size: 15px;
  border: 1px solid grey;
  float: left;
  width:35%;
  height: 37px;
  background: #f1f1f1;
}

form.example1 input[name=year] {
  padding: 10px;
  font-size: 15px;
  border: 1px solid grey;
  float: left;
  width: 20%;
  height: 37px;
  background: #f1f1f1;
}
form.example1 input[name=division] {
  padding: 10px;
  font-size: 15px;
  border: 1px solid grey;
  float: left;
  width: 25%;
  height: 37px;
  background: #f1f1f1;
}

form.example1 button{
  float: left;
  width: 15%;
  padding: 1px;
  background: #2196F3;
  color: white;
  font-size: 15px;
  height: 37px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button[value=Search1] {
  float: right;
  width: 15%;
  position: absolute;
  margin-left:1%;
  padding: 1px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  height: 30px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

input#srch {
    background-image: url('http://www.clker.com/cliparts/z/1/T/u/9/2/search-icon-hi.png');
    background-size:12%;
    background-repeat: no-repeat;
    text-indent: 25px;
}
th{
  background:#47cad1;
}

th:hover{
     cursor:pointer;
    background:#000;
    
}
th a i {
    margin-left: 5px;
    color: rgba(255,255,255,0.4);
}
</style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="bg-info" style="overflow: scroll">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/projects/Auth_page1.php?ID=<?php echo urlencode($id) ?>">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php?&ID=<?php echo urlencode($id)?>">Show All Students</a>
      </li>     
      <li class="nav-item">
        <a class="nav-link" href="../../authhome.php?&ID=<?php echo urlencode($id)?>">Graph Analysis</a>
      </li>
      <li class="nav-item" style="padding-left:5%;width:380px;">
        <form class="example1" action="sports_dept.php?ID=<?php echo urlencode($id)?>&flag=<?php echo urlencode($flag)?>" method="post" enctype="multipart/form-data" >
           <input list="search1" type="text" name="dept" id="srch1" class="input-field" autocomplete="off" placeholder="Department" required >
            <datalist id="search1">
              <select name="search1" id="searchs1" >
              <option  value="Computer">Computer</option>
              <option  value="IT">IT</option>
              <option  value="ENTC">ENTC</option>
              </select>  
            </datalist>
        
           <input list="search2" type="text" name="year" id="srch2" class="input-field" autocomplete="off" placeholder="Year" >
            <datalist id="search2">
              <select name="search2" id="searchs2" >
              <option  value="FE">FE</option>
              <option  value="SE">SE</option>
              <option  value="TE">TE</option>
              <option  value="BE">BE</option>
              </select>  
            </datalist>
         
            <input name="division" type="number" placeholder="Div(1/2/3..)" >
         
            <button type="submit" ></span><i class="fa fa-search"></i>
              </button>         
        </form>
      </li>  
     
      <li class="nav-item" style="padding-left:5%;padding-top:0.1%">
        <form class="example" action="sports_search.php?ID=<?php echo urlencode($id)?>&flag=<?php echo urlencode($flag)?>&sql1=<?php echo urlencode($sql1)?>" method="post" enctype="multipart/form-data" >
        <input list="search" name="search" id="srch" onchange="myFunction(this)" class="input-field" autocomplete="off" placeholder="Search By">
            <datalist id="search">
              <select name="searchs" id="searchs" >
              <option  value="Reg.ID">Reg.ID</option>
              <option  value="Sports">Sports</option>
              <option  value="Description">Description</option>
              <option  value="Venue">Venue</option>
              <option  value="Achievements">Achievements</option>
              <option  value="Dates">Dates</option>
              </select>     
            </datalist>
          <div class="input-group" id="ID" style="display: none;">
            <input name="regid" type="text" placeholder="Enter Reg. ID">
              <button  type="submit"></span><i class="fa fa-search"></i>
              </button>
          </div> 
          <div id="Spt" style="display: none;">
            <input name="sports_n" type="text" placeholder="Enter Sports Name">
            <button type="submit" value="Search"><i class="fa fa-search"></i></button>
          </div>
          <div id="Ven" style="display: none;">
            <input name="venue" type="text" placeholder="Enter Venue">
            <button type="submit" value="Search"><i class="fa fa-search"></i></button>
          </div> 
          <div id="Achiv" style="display: none;">
            <input name="achievements" type="text" placeholder="Enter Achievements">
            <button type="submit" value="Search"><i class="fa fa-search"></i></button>
          </div> 
          <div id="Descp" style="display: none;">
            <input name="desc" type="text" placeholder="Enter Description">
            <button type="submit" value="Search"><i class="fa fa-search"></i></button>
          </div> 
          <li class="nav-item" >
          <div id="date" style="display: none;width: 900px;">
            <label for="df">Date From</label>
            <input id="df_id" type="date" name="df"><br>
            <label for="df">Date To &emsp;</label>
            <input id="dt_id" type="date" name="dt">
            <button type="submit" value="Search1">Search&ensp;<i class="fa fa-search"></i></button>
          </div>
        </li>
       </form> 
      </li>
  
      <li class="nav-item" >
       
      </li>
    </ul>
  </div>
</nav>
<script type="text/javascript">
  function myFunction(option){
          var opt = option.value;
          if(opt == "Reg.ID"){
            document.getElementById("ID").style.display = "block";
            document.getElementById("srch").style.display = "none";
          }
          if(opt == "Sports"){
            document.getElementById("Spt").style.display = "block"; 
            document.getElementById("srch").style.display = "none";       
          }
          if(opt == "Description"){
            document.getElementById("Descp").style.display = "block";
            document.getElementById("srch").style.display = "none";
          }
          if(opt == "Venue"){
            document.getElementById("Ven").style.display = "block";
            document.getElementById("srch").style.display = "none";
          }
          if(opt == "Achievements"){
            document.getElementById("Achiv").style.display = "block";
            document.getElementById("srch").style.display = "none";
          }
          if(opt == "Dates"){
            document.getElementById("date").style.display = "block";
            document.getElementById("srch").style.display = "none";
          }
      }
</script>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2><?php echo $print ?></h2>
    </div>
    <div class="card-body" style="overflow: scroll;">
      <table class="table table-bordered">
       <thead>
        <tr style="font-size: 14.3px;">
          <th><a href="sports_sort.php?ID=<?php echo urlencode($id)?>&column=ID&order=<?php echo $asc_or_desc; ?>&sql=<?php echo urlencode($sql) ?>&sql1=<?php echo urlencode($sql1) ?>&flag=<?php echo urlencode($flag) ?>">Reg. ID<i class="fas fa-sort<?php echo $column == 'ID' ? '-' . $up_or_down : ''; ?>"></i></a></th>
          <th><a href="sports_sort.php?ID=<?php echo urlencode($id)?>&column=Rollno&order=<?php echo $asc_or_desc; ?>&sql=<?php echo urlencode($sql) ?>&sql1=<?php echo urlencode($sql1) ?>&flag=<?php echo urlencode($flag) ?>">Roll No<i class="fas fa-sort<?php echo $column == 'Rollno' ? '-' . $up_or_down : ''; ?>"></i></a></th>
          <th><a href="sports_sort.php?ID=<?php echo urlencode($id)?>&column=Year&order=<?php echo $asc_or_desc; ?>&sql=<?php echo urlencode($sql) ?>&sql1=<?php echo urlencode($sql1) ?>&flag=<?php echo urlencode($flag) ?>">Year<i class="fas fa-sort<?php echo $column == 'Year' ? '-' . $up_or_down : ''; ?>"></i></a></th>
          <th><a href="sports_sort.php?ID=<?php echo urlencode($id)?>&column=Sports_Name&order=<?php echo $asc_or_desc; ?>&sql=<?php echo urlencode($sql) ?>&sql1=<?php echo urlencode($sql1) ?>&flag=<?php echo urlencode($flag) ?>">Sports Name<i class="fas fa-sort<?php echo $column == 'Sports_Name' ? '-' . $up_or_down : ''; ?>"></i></a></th>
          <th><a href="sports_sort.php?ID=<?php echo urlencode($id)?>&column=Description&order=<?php echo $asc_or_desc; ?>&sql=<?php echo urlencode($sql) ?>&sql1=<?php echo urlencode($sql1) ?>&flag=<?php echo urlencode($flag) ?>">Description<i class="fas fa-sort<?php echo $column == 'Description' ? '-' . $up_or_down : ''; ?>"></i></a></th>
          <th><a href="sports_sort.php?ID=<?php echo urlencode($id)?>&column=Venue&order=<?php echo $asc_or_desc; ?>&sql=<?php echo urlencode($sql) ?>&sql1=<?php echo urlencode($sql1) ?>&flag=<?php echo urlencode($flag) ?>">Venue<i class="fas fa-sort<?php echo $column == 'Venue' ? '-' . $up_or_down : ''; ?>"></i></a></th>
          <th><a href="sports_sort.php?ID=<?php echo urlencode($id)?>&column=Achievements&order=<?php echo $asc_or_desc; ?>&sql=<?php echo urlencode($sql) ?>&sql1=<?php echo urlencode($sql1) ?>&flag=<?php echo urlencode($flag) ?>">Achievements<i class="fas fa-sort<?php echo $column == 'Achievements' ? '-' . $up_or_down : ''; ?>"></i></a></th>
          <th><a href="sports_sort.php?ID=<?php echo urlencode($id)?>&column=Date_Sports&order=<?php echo $asc_or_desc; ?>&sql=<?php echo urlencode($sql) ?>&sql1=<?php echo urlencode($sql1) ?>&flag=<?php echo urlencode($flag) ?>">Date of Occasion<i class="fas fa-sort<?php echo $column == 'Date_Sports' ? '-' . $up_or_down : ''; ?>"></i></a></th>
          <th>Certificate</th>
        </tr>
       </thead>  
       <tbody>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->ID; ?></td>
            <td><?= $person->Rollno; ?></td>
            <td><?= $person->Year; ?></td>
            <td><?= $person->Sports_Name; ?></td>
            <td><?= $person->Description; ?></td>
            <td><?= $person->Venue; ?></td>
            <td><?= $person->Achievements; ?></td>
            <td><?= $person->Date_Sports; ?></td>   
            <td><a href="../../file/solo_download.php?ID=<?php echo $person->ID?>&uid=<?php echo $person->UID?>&type=Sports" style="margin:5%;font-size: 14px;" >Download</a></td>
          </tr>
        <?php endforeach; ?>
       </tbody>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>

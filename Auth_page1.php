<?php
 $id = isset($_GET['ID']) ? $_GET['ID'] : '';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Authority Page1</title>
	<link rel="stylesheet" type="text/css" href="stylehome.css" >
	<link rel="stylesheet" type="text/css" href="navbar.css"> 
</head>
<body>

	<div class="home">
      
   <ul>
 <li><a href="/projects/auth_profile_edit/crud/view_auth_profile.php?ID=<?php echo $id?>">View Profile</a>
 </li>
 <li><a href="#">Statistics</a>
  <ul>
   <li><a href="/projects/auth_stu_view/crud/index.php?ID=<?php echo $id?>">Students</a></li>
   <li><a href="/projects/auth_arts_view/crud/index.php?ID=<?php echo $id?>">Arts</a></li>
   <li><a href="/projects/auth_sports_view/crud/index.php?ID=<?php echo $id?>">Sports</a></li>
   <li><a href="/projects/auth_social_view/crud/index.php?ID=<?php echo $id?>">Social Work</a></li>
   <li><a href="/projects/auth_comp_view/crud/index.php?ID=<?php echo $id?>">Competitve Coding</a></li>
  </ul>
 </li>
 <li><a href="/projects/authhome.php?ID=<?php echo $id?>">Graph Analysis</a>
 </li>
 <li><a href="#">About us</a>
 <ul>
  <li><a href="">Blog</a>
  <li><a href="">Mobile No.</a>
  <li><a href="">Email</a>  
 </ul>
 </li>
 <li><a href="Auth_login.php">Logout</a></li>
</ul>


</body>
</html>
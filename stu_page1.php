<?php
 $id = isset($_GET['ID']) ? $_GET['ID'] : '';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Page1</title>
	<link rel="stylesheet" type="text/css" href="stylehome.css" >
	<link rel="stylesheet" type="text/css" href="navbar.css"> 
</head>
<body>

	<div class="home">
      
   <ul>
 <li><a href="/projects/stu_profile_edit/crud/view_stu_profile.php?ID=<?php echo $id?>">View Profile</a>
 </li>
 <li><a href="#">Activities</a>
  <ul>
   <li><a href="/projects/arts_edit1/crud/index.php?ID=<?php echo $id?>">Arts</a></li>
   <li><a href="/projects/sports_edit1/crud/index.php?ID=<?php echo $id?>">Sports</a></li>
   <li><a href="/projects/social_edit1/crud/index.php?ID=<?php echo $id?>">Social Work</a></li>
   <li><a href="/projects/comp_edit1/crud/index.php?ID=<?php echo $id?>">Competitve Coding</a></li>
  </ul>
 </li>
 <li><a href="#">Help</a>
 <ul>
 	<li><a href="">College imp No.s</a>
 	<li><a href="">College imp Docs</a>
 	<li><a href="">College Notices</a>	
 </ul>
 </li>
 <li><a href="#">About us</a>
 <ul>
 	<li><a href="">Blog</a>
 	<li><a href="">Mobile No.</a>
 	<li><a href="">Email</a>	
 </ul>
 </li>
 <li><a href="Home_page.php">Logout</a></li>
</ul>


</body>
</html>
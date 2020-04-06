<?php

include_once dirname(__FILE__).'/inc/config.php';


//--->get all student > start
if(isset($_GET['call_type']) && $_GET['call_type'] =="get")
{
	$q1 = app_db()->select('select * from student');
	echo json_encode($q1);
}
//--->get all student > end




//--->update single entry > start
if(isset($_POST['call_type']) && $_POST['call_type'] =="single_entry")
{	

	$row_id 	= app_db()->CleanDBData($_POST['row_id']);
	$col_name  	= app_db()->CleanDBData($_POST['col_name']); 
	$col_val  	= app_db()->CleanDBData($_POST['col_val']);
	
	$tbl_col_name = array( "uid", "fname", "lname", "cls", "depart", "dob", "email", "mobile", "address", "pass", "row_id");

	if (!in_array($col_name, $tbl_col_name))
	{
		echo json_encode(array(
			'status' => 'error', 
			'msg' => 'invalid col_name', 
		));
		die();
	}

	$q1 = app_db()->select("select * from student where row_id='$row_id'");
	if($q1 < 1) 
	{
		//no record found in the database
		echo json_encode(array(
			'status' => 'error', 
			'msg' => 'no entries were found', 
		));
		die();
	}
	else if($q1 > 0) 
	{
		//found record in the database
		 
		$strTableName = "student";

		$array_fields = array(
			$col_name => $col_val,
		);
		$array_where = array(    
		  'row_id' => $row_id,
		);
		//Call it like this:  
		app_db()->Update($strTableName, $array_fields, $array_where);


		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'updated entry', 
		));
		die();
	}
}
//--->update single entry > end




//--->update a whole row  > start
if(isset($_POST['call_type']) && $_POST['call_type'] =="row_entry")
{	

	$row_id 	= app_db()->CleanDBData($_POST['row_id']);
	$uid  		= app_db()->CleanDBData($_POST['uid']); 
	$fname  	= app_db()->CleanDBData($_POST['fname']); 
	$lname  	= app_db()->CleanDBData($_POST['lname']); 
	$cls  		= app_db()->CleanDBData($_POST['cls']); 
	$depart  	= app_db()->CleanDBData($_POST['depart']);
	$dob  		= app_db()->CleanDBData($_POST['dob']);  
	$email  	= app_db()->CleanDBData($_POST['email']); 
	$mobile  	= app_db()->CleanDBData($_POST['mobile']); 	
	$address  	= app_db()->CleanDBData($_POST['address']); 
	$pass  		= app_db()->CleanDBData($_POST['pass']); 
	
	$q1 = app_db()->select("select * from student where row_id='$row_id'");
	if($q1 < 1) 
	{
		//no record found in the database
		echo json_encode(array(
			'status' => 'error', 
			'msg' => 'no entries were found', 
		));
		die();
	}
	else if($q1 > 0) 
	{
		//found record in the database
		 
		$strTableName = "student";

		$array_fields = array(
			'uid'	=>  $uid
			'fname' =>  $fname,
			'lname' =>  $lname,
			'email' =>  $email,
			'cls'	=>	$cls, 
			'depart'=>	$depart,
			'dob'	=>	$dob, 
			'email'	=>	$email,
			'mobile'=>	$mobile, 
			'address'=>	$address,
			'pass'	=>	$pass,
		);
		$array_where = array(    
		  'row_id' => $row_id,
		);
		//Call it like this:  
		app_db()->Update($strTableName, $array_fields, $array_where);


		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'updated row entry', 
		));
		die();
	}
}
//--->update a whole row > end




//--->new row entry  > start
if(isset($_POST['call_type']) && $_POST['call_type'] =="new_row_entry")
{	

	$row_id 	= app_db()->CleanDBData($_POST['row_id']);
	$uid  		= app_db()->CleanDBData($_POST['uid']); 
	$fname  	= app_db()->CleanDBData($_POST['fname']); 
	$lname  	= app_db()->CleanDBData($_POST['lname']); 
	$cls  		= app_db()->CleanDBData($_POST['cls']); 
	$depart  	= app_db()->CleanDBData($_POST['depart']);
	$dob  		= app_db()->CleanDBData($_POST['dob']);  
	$email  	= app_db()->CleanDBData($_POST['email']); 
	$mobile  	= app_db()->CleanDBData($_POST['mobile']); 	
	$address  	= app_db()->CleanDBData($_POST['address']); 
	$pass  		= app_db()->CleanDBData($_POST['pass']); 
	
	$q1 = app_db()->select("select * from student where row_id='$row_id'");
	if($q1 < 1) 
	{
		//add new row
		$strTableName = "student";

		$insert_arrays = array
		(
			'row_id' => $row_id,
			'uid'	=>  $uid
			'fname' =>  $fname,
			'lname' =>  $lname,
			'email' =>  $email,
			'cls'	=>	$cls, 
			'depart'=>	$depart,
			'dob'	=>	$dob, 
			'email'	=>	$email,
			'mobile'=>	$mobile, 
			'address'=>	$address,
			'pass'	=>	$pass,
		);

		//Call it like this:
		app_db()->Insert($strTableName, $insert_arrays);

		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'added new entry', 
		));
		die();
	}	 
}
//--->new row entry  > end



//--->new row entry  > start
if(isset($_POST['call_type']) && $_POST['call_type'] =="delete_row_entry")
{	

	$row_id 	= app_db()->CleanDBData($_POST['row_id']);	 
	
	$q1 = app_db()->select("select * from student where row_id='$row_id'");
	if($q1 > 0) 
	{
		//found a row to be deleted
		$strTableName = "student";

		$array_where = array('row_id' => $row_id);

		//Call it like this:
		app_db()->Delete($strTableName,$array_where);

		echo json_encode(array(
			'status' => 'success', 
			'msg' => 'deleted entry', 
		));
		die();
	}	 
}
//--->new row entry  > end
<?php
	require './php/autoload.php';
	
	$output = null;
	if($_POST){

		$tableName = "users";
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$age = $_POST['age'];
		$data = [
				"fname" => $fname,
				"lname" => $lname,
				"age" => $age
			];

		if( $fname && $lname)
			insertData($tableName , $data);
		$_POST = null;
	}
	// header("location:javascript://history.go(-1)");
?>
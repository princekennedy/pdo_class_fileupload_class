<?php
	require './php/autoload.php';

	$output = null;
	if($_FILES){
		$output = multUploadFile();
	}
	// header("location:javascript://history.go(-1)");
?>
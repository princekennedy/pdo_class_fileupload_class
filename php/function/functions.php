<?php


function uploadFile(
	$dest = './resources/',
	$max = 50000,
	$format = ['jpg','jpeg','png','gif' ,'pdf' ,'ppt' ,'pptx' ,'PNG' ,'JPG']
){
	$uploader   =   new Uploader();
	$uploader->setDir($dest);
	$uploader->setExtensions($format);  //allowed extensions list//
	$uploader->setMaxSize($max);                          //set max file size to be allowed in MB//
	$uploader->uploadFile('file');
	return $uploader;
}

function multUploadFile(
	$dest = 'resources/',
	$max = 50000,
	$format = ['jpg','jpeg','png','gif' ,'pdf' ,'ppt' ,'pptx' ,'PNG' ,'JPG']
){
	$uploader   =   new Uploader();
	$uploader->setDir($dest);
	$uploader->setExtensions($format);  //allowed extensions list//
	$uploader->setMaxSize($max);                          //set max file size to be allowed in MB//
	$uploader->multUploadFile('file');
	return $uploader;
}

function insertData(
	$table = "users",
	$values = [
		'fname' =>"o",
		'lname' =>"o",
		'age' => 9,
	]
){
	insert($table)->values($values);
}

function getUsers(){
	$users = select("users")->results();
	return ($users) ? $users : [] ;
}






?>
<?php

//  minhtri95@yahoo.com

require_once("includes/application_top.php");
////make folder to upload images///////////////////////////////////////////////////	
	//$path ="../images/news/";
	$path = $_GET['path'];
	if( !file_exists($path) )
		mkdir($path , 0777);
	
	$error = "";
	$msg = "";
	$fileElementName = $_GET['file_name'];
	$file_name= $_FILES[$fileElementName]["name"];
	$info = pathinfo($file_name);
	$file_type = strtolower($info['extension']) ;


	move_uploaded_file($_FILES[$fileElementName]["tmp_name"] , $path . $file_name);			  
	$msg = $file_name;
	
	//for security reason, we force to remove all uploaded file
	@unlink($_FILES[$fileElementName]);
		
	echo "{";
	echo				"error: '" . $msg . "',\n";
	echo				"path: '" . $path . "'\n";
	echo "}";

?>

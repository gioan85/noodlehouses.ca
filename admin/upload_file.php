<?php

//  minhtri95@yahoo.com

require_once("includes/application_top.php");
////make folder to upload images///////////////////////////////////////////////////	
	$typeof = $_GET['typeof'];
	$path ="backup/import/" . date('Y_m_d');
	
	if(!file_exists($path))
		mkdir($path, 0777, true);
	
	$path .= '/';
////upload image to folder/////////////////////////////////////////////////////////	
	$error = "";
	$msg = "";
	$fileElementName = 'fileToUpload';
	if($_GET['file_name'] != '')
	{
		$fileElementName = $_GET['file_name'];
	}
	
/////upload image

	if(!empty($_FILES[$fileElementName]['error']))
	{
		switch($_FILES[$fileElementName]['error'])
		{
			case '1':
				$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
				break;
			case '2':
				$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
				break;
			case '3':
				$error = 'The uploaded file was only partially uploaded';
				break;
			case '4':
				$error = 'No file was uploaded.';
				break;
			case '6':
				$error = 'Missing a temporary folder';
				break;
			case '7':
				$error = 'Failed to write file to disk';
				break;
			case '8':
				$error = 'File upload stopped by extension';
				break;
			case '999':
			default:
				$error = 'No error code avaiable';
		}
	}elseif(empty($_FILES[$fileElementName]['tmp_name']) || $_FILES[$fileElementName]['tmp_name'] == 'none')
	{
		$error = 'No file was uploaded..';
	}else 
	{	
		$file_name= $_FILES[$fileElementName]["name"];
		$max_width = $_GET['max_width'];
		$info = pathinfo($path . $file_name);
		$file_type = strtolower($info['extension']) ;
		if( $file_type == $typeof)
		{
			move_uploaded_file($_FILES[$fileElementName]["tmp_name"] , $path . $file_name);			  
			$msg .= " File Name: " . $file_name;
			
			//for security reason, we force to remove all uploaded file
			@unlink($_FILES[$fileElementName]);
		}
		else
		{
			$error = "File upload không đúng định dạng (*.".$typeof.")!";
			$path = '';
		}
	}		
	echo "{";
	echo				"error: '" . $error . "',\n";
	echo				"filename: '" . $file_name . "',\n";
	echo				"path: '" . $path ."'\n";
	echo "}";

?>

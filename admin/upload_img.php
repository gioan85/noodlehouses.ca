<?php

//  minhtri95@yahoo.com

require_once("includes/application_top.php");
////make folder to upload images///////////////////////////////////////////////////	
	//$path ="../images/news/";
	$path = $_GET['path'];
	if( !file_exists($path) )
		mkdir($path , 0777);
	
////upload image to folder/////////////////////////////////////////////////////////	
	$error = "";
	$msg = "";
	$fileElementName = 'fileToUpload';
	if($_GET['file_name'] != '')
	{
		$fileElementName = $_GET['file_name'];
	}
////create thumbnails/////////////////////////////////////////////////////////////
	function create_thumbnail($path,$file_name)
	{
		///////////////resize image
		$img_size = getimagesize($path . $file_name);
		$width = $img_size[0];
		$height = $img_size[1];
		$info = pathinfo($path . $file_name);
		$file_type = strtolower($info['extension']) ;
		$thumb_path = str_replace('fullsize','thumbnails',$path);
		if( !file_exists($thumb_path) )
			mkdir($thumb_path , 0777);
		$thumb_size = 150;
		if($width > $thumb_size)
		{
			$new_width = $thumb_size;
			$new_height = floor( $height * ( $new_width / $width ) );
		}
		else
		{
			$new_width = $width;
			$new_height = $height;
		}
		// create a new temporary image
		$tmp_img = imagecreatetruecolor( $new_width, $new_height );
		// copy and resize old image into new image
		
		if ($file_type == 'png')
		{
			imagecopyresized( $tmp_img, imagecreatefrompng( "{$path}{$file_name}" ), 0, 0, 0, 0, $new_width, $new_height, $width, $height );	
			imagepng( $tmp_img, "{$thumb_path}{$file_name}" ); 
		}
		if ($file_type == 'jpg')
		{
			imagecopyresized( $tmp_img, imagecreatefromjpeg( "{$path}{$file_name}" ), 0, 0, 0, 0, $new_width, $new_height, $width, $height );	
			imagejpeg( $tmp_img, "{$thumb_path}{$file_name}" ); 
		}
		if ($file_type == 'gif')
		{
			imagecopyresized( $tmp_img, imagecreatefromgif( "{$path}{$file_name}" ), 0, 0, 0, 0, $new_width, $new_height, $width, $height );	
			imagegif( $tmp_img, "{$thumb_path}{$file_name}" ); 
		}
			
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
		if( $file_type == 'png' || $file_type == 'jpg' || $file_type == 'gif')
		{
			 if (file_exists( $path . $file_name))
			{
			  $error = $file_name . " đã tồn tại. ";
			  $path = '';
			}
			else
			{
				move_uploaded_file($_FILES[$fileElementName]["tmp_name"] , $path . $file_name);			  
				$msg .= " File Name: " . $file_name;
				
				//for security reason, we force to remove all uploaded file
				@unlink($_FILES[$fileElementName]);
				///////////////resize image
				$img_size = getimagesize($path . $file_name);
				$width = $img_size[0];
				$height = $img_size[1];
				if($width > $max_width)
				{
					$new_width = $max_width;
					$new_height = floor( $height * ( $new_width / $width ) );
				}
				else
				{
					$new_width = $width;
					$new_height = $height;
				}
				// create a new temporary image
				$tmp_img = imagecreatetruecolor( $new_width, $new_height );
				// copy and resize old image into new image
				  
				if ($file_type == 'png')
				{
					imagecopyresized( $tmp_img, imagecreatefrompng( "{$path}{$file_name}" ), 0, 0, 0, 0, $new_width, $new_height, $width, $height );	
					imagepng( $tmp_img, "{$path}{$file_name}" ); 
				}
				if ($file_type == 'jpg')
				{
					imagecopyresized( $tmp_img, imagecreatefromjpeg( "{$path}{$file_name}" ), 0, 0, 0, 0, $new_width, $new_height, $width, $height );	
					imagejpeg( $tmp_img, "{$path}{$file_name}" ); 
				}
				if ($file_type == 'gif')
				{
					imagecopyresized( $tmp_img, imagecreatefromgif( "{$path}{$file_name}" ), 0, 0, 0, 0, $new_width, $new_height, $width, $height );	
					imagegif( $tmp_img, "{$path}{$file_name}" ); 
				}
				///create thumbnails if true
				if($_GET['create_thumbnail']== 'true')
				{
					create_thumbnail($path,$file_name);
				}
			}
		}
		else
		{
			$error = "File upload không phải là hình ảnh";
			$path = '';
		}
	}		
	echo "{";
	echo				"error: '" . $error . "',\n";
	echo				"path: '" . $path . "'\n";
	echo "}";

?>

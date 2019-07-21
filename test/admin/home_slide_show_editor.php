
<?php
//  minhtri95@yahoo.com

require_once("includes/application_top.php");
	
	if($_POST['action'] == 'load_img')
	{
		$img_used = '_used';
		clearstatcache();
		$path = '../images/home_slideshow';
		$dir = opendir($path);
		if(!$dir)
		{
			$result = "Your folder is not exist";
			return $result;
		}
		while (false !== ($FileName = readdir ($dir)))
		{
			if ( $FileName!='.' && $FileName!=".." )
			{
				if( strpos($FileName, $img_used) || strstr($FileName, $img_used))
					echo'<div class="img_block actived">';
				else
					echo'<div class="img_block">';
					
				echo '
						<div class="img"><img src="'.$path.'/'.$FileName.'" width="200"></div>
						<div class="control_bar">
							<div class="delete" id="'.$FileName.'" rel="'.$path.'" onclick="update_img('."'".$FileName."','".$path."','Delete'".')">Delete</div>
							<div class="unused" id="'.$FileName.'" rel="'.$path.'" onclick="update_img('."'".$FileName."','".$path."','Unused'".')">Unused</div>
							<div class="used" id="'.$FileName.'" rel="'.$path.'" onclick="update_img('."'".$FileName."','".$path."','Used'".')" >Used</div>
						</div>
					</div>
				';
			}
		}
	}
	
	if($_POST['action'] == 'update_img')
	{
		$img = $_POST['img'];
		$path = $_POST['path'];
		$command = $_POST['command'];
		if( $command == 'Delete')
		{	
			unlink($path.'/'.$img);
		}
		if( $command == 'Unused')
		{
			$newname = str_replace('_used','',$img);
			$error = rename($path.'/'.$img, $path.'/'.$newname);
		}
		else
		{
			$newname = str_replace('.','_used.',$img);
			$error = rename($path.'/'.$img, $path.'/'.$newname);
		}
		echo $error;
	}
	
?> 
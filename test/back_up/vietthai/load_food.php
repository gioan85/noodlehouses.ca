<?php 

require_once("includes/application_top.php");

$action = $_POST['action'];
$dir = $_POST['dir'];

if($action == 'load_food')
{
	$menu_name = $_POST['menu_name'];
	$sub_menu = '';
	$food = tep_db_query("select foods.NAME, foods.PRICE, foods.MENU, foods.ID, foods.DESCRIPTION from foods, menu where foods.MENU = menu.ID and menu.NAME = '" . $menu_name . "' ORDER BY foods.ID");
	mysqli_query("SET character_set_results=utf8");
	
	echo '<div id="scroll_cover" class="food_menu_scroll">
	                            <div id="scroller">
                                	<table cellpadding="0" cellspacing="0" border="0" class="right_list">';
	
	while($row = tep_db_fetch_array($food))
	{
		if($row['PRICE'] == '0')
		{
			echo '<tr><td>'. $row['NAME'].'<br><span>'.$row['DESCRIPTION'].'</span></td><td></td><td></td></tr>';
			$sub_menu = $row['NAME'];
		}
		else
		{
			//echo '<tr><td>'.$row['NAME'].'<br><span>'.$row['DESCRIPTION'].'</span></td><td>'.$row['PRICE'].'</td><td><a href="javascript:void(0)" class="btn_add" onclick="add_to_bill('.$row['ID'].",'".$row['NAME']."','".$row['PRICE']."'".')"></a></td></tr>';
			if($sub_menu != '')
				echo '<tr><td>'.$row['NAME'].'<br><span>'.$row['DESCRIPTION'].'</span></td><td>'.$row['PRICE'].'</td><td><div class="btn_add" onclick="add_to_bill('."'".$row['ID']."','". $sub_menu . '<br>'.$row['NAME']."','".$row['PRICE']."'".')"></div></td></tr>';
			else
				echo '<tr><td>'.$row['NAME'].'<br><span>'.$row['DESCRIPTION'].'</span></td><td>'.$row['PRICE'].'</td><td><div class="btn_add" onclick="add_to_bill('."'".$row['ID']."','". $row['NAME']."','".$row['PRICE']."'".')"></div></td></tr>';
		}
	}
	
	echo '</table></div></div>';
}


if($action == 'load_img')
{
	$index = 1;
	$list_img = "";
	if (is_dir($dir)) {
		if ($dh = opendir($dir)) {
			while (($file = readdir($dh)) !== false) {
				$ext = pathinfo($file,PATHINFO_EXTENSION);
				if ($ext != '')
				{
					if( $index == 1)
						$list_img .="<img src='$dir$file' id='food_slide_show$index' class='actived' />";
					else
						$list_img .="<img src='$dir$file' id='food_slide_show$index' class='deactived' />";
					$index ++;
				}
			}
			closedir($dh);
			echo $list_img;
		}
		else
		{
			echo 0;
		}
	}
}

if($_GET['action'] == 'add_bill')
{
	$PHONE = $_GET['PHONE'];
	$CUSTOMER = $_GET['CUSTOMER'];	
	$ADDRESS = $_GET['ADDRESS'];
	$FOODS = $_GET['FOODS'];
	$PRICE = $_GET['PRICE'];
	$DATE = date('Y-m-d H:i:s');
	$STATUS = $_GET['STATUS'];
	$DESCRIPTION = $_GET['DESCRIPTION'];
	
	//$FOODS = str_replace(' ','',$FOODS);
	$FOODS = str_replace('<tr>','',$FOODS);
	$FOODS = str_replace('</tr>','',$FOODS);
	$FOODS = str_replace('<td>','<div>',$FOODS);
	$FOODS = str_replace('</td>','</div>',$FOODS);
	
	$query = "insert into bill(CUSTOMER,PHONE,ADDRESS,FOODS,PRICE,DATE,STATUS,DESCRIPTION) values('$CUSTOMER', '$PHONE', '$ADDRESS', '$FOODS','$PRICE','$DATE','$STATUS','$DESCRIPTION');";
	$result = tep_db_query($query);
	if($result == 1)
		echo "Your transaction is success!";
	else
		echo "Your transaction is fail!";
	
}


?>
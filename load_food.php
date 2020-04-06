<?php 



require_once("includes/application_top.php");

require_once("get_location_time.php");

$action = $_POST['action'];

$dir = $_POST['dir'];



//get time of location





if($action == 'load_food')

{

	$menu_name = $_POST['menu_name'];

	$sub_menu = '';

	$food = tep_db_query("select foods.KEY, foods.NAME, foods.PRICE, foods.MENU, foods.ID, foods.DESCRIPTION from foods, menu where foods.MENU = menu.ID and menu.NAME = '" . $menu_name . "' ORDER BY foods.ID");

	//mysqli_query("SET character_set_results=utf8");



	echo '<div class="menu_list_scroll">';

	echo '<div id="scroller" class="menu_list_scroller">';

	echo '<table cellpadding="0" cellspacing="0" border="0" class="right_list">';

	

	$main_key = '';

	$main_food = '';



	while($row = tep_db_fetch_array($food))

	{

		// if($row['PRICE'] == '0')

		// {

		// 	echo '<tr><td>'. str_replace('*','<p></p>',$row['NAME']) . '<br><span>'.$row['DESCRIPTION'].'</span></td><td></td><td></td></tr>';

		// 	$sub_menu = $row['NAME'];

		// }

		// else

		// {

		// 	//echo '<tr><td>'.$row['NAME'].'<br><span>'.$row['DESCRIPTION'].'</span></td><td>'.$row['PRICE'].'</td><td><a href="javascript:void(0)" class="btn_add" onclick="add_to_bill('.$row['ID'].",'".$row['NAME']."','".$row['PRICE']."'".')"></a></td></tr>';

		// 	if($sub_menu != '')

		// 		echo '<tr class="child"><td>'.$row['NAME'].'<br><span>'.$row['DESCRIPTION'].'</span></td><td>'.$row['PRICE'].'</td><td><div class="btn_add" onclick="add_to_bill('."'".$row['ID']."','". $sub_menu . '<br>'.$row['NAME']."','".$row['PRICE']."'".')" onmousedown="$(this).addClass('."'".'actived'."'".')" onmouseup="$(this).removeClass('."'".'actived'."'".')"></div></td></tr>';

		// 	else

		// 		echo '<tr class="child"><td>'.$row['NAME'].'<br><span>'.$row['DESCRIPTION'].'</span></td><td>'.$row['PRICE'].'</td><td><div class="btn_add" onclick="add_to_bill('."'".$row['ID']."','". $row['NAME']."','".$row['PRICE']."'".')" onmousedown="$(this).addClass('."'".'actived'."'".')" onmouseup="$(this).removeClass('."'".'actived'."'".')" ></div></td></tr>';

		// }

		$html = '';

		$key_ = explode('_',$row['KEY']);



		if($row['PRICE'] == '0.00')

			$row['PRICE'] = '';



		if(!$key_[1])

		{

			$main_key = $row['KEY'];

			$main_food = $row['NAME'];

			$html = '<tr><td>';

			$html .= $key_[0].'. '.$row['NAME'];

			$main_food = $key_[0].'. '.$row['NAME'];

		}	

		else

		{

			$html = '<tr class="child"><td>';

			$html .= $key_[1].')' .$row['NAME'];

		}

		

		$html .= '<br><span>'.$row['DESCRIPTION'].'</span></td><td>'. $row['PRICE'] . ($row['PRICE'] !='' ? '$': '');

		$html .= '</td>';

		$html .= '<td>';

		if( $row['PRICE'] != '')

		{

			$html .='<div class="btn_add" onclick="add_to_bill('."'".$row['ID']."','";

			if($key_[0] == $main_key)

				$html .=$key_[0]. '.' .$row['NAME']."','".$row['PRICE']."'".')" onmousedown="$(this).addClass('."'".'actived'."'".')" onmouseup="$(this).removeClass('."'".'actived'."'".')" ></div>';

			else

				$html .= $main_food .'<br>'. $key_[1] . ') ' . $row['NAME']."','".$row['PRICE']."'".')" onmousedown="$(this).addClass('."'".'actived'."'".')" onmouseup="$(this).removeClass('."'".'actived'."'".')" ></div>';

		}	

		$html .='</td></tr>';



		echo $html;		

	}

	

	echo '</table></div></div>';

}





if($action == 'load_img')

{

	$index = 1;

	$list_img = "";

	$list_icon = '<div class="menu_list_icon">';

	if (is_dir($dir)) {

		if ($dh = opendir($dir)) {

			while (($file = readdir($dh)) !== false) {

				$ext = pathinfo($file,PATHINFO_EXTENSION);

				if ($ext != '')

				{

					if( $index == 1)

					{

						$list_img .="<img src='$dir$file' id='food_slide_show$index' class='active' />";

						$list_icon .="<div class='icon_ icon_$index active'><a href='javascript:void(0)'></a></div>";

					}

					else

					{

						$list_img .="<img src='$dir$file' id='food_slide_show$index' class='deactive' />";

						$list_icon .="<div class='icon_ icon_$index'><a  href='javascript:void(0)'></a></div>";

					}

					$index ++;

				}

			}

			closedir($dh);

			$list_icon .= '</div>';

			echo $list_img . $list_icon;

		}

		else

		{

			echo 0;

		}

	}

}



//date_default_timezone_set('Canada/Mississauga');

//$DATE = date('Y-m-d H:i:s');

if($_GET['action'] == 'add_bill')

{

	$PHONE = $_GET['PHONE'];

	$CUSTOMER = $_GET['CUSTOMER'];	

	$ADDRESS = $_GET['ADDRESS'];

	$FOODS = $_GET['FOODS'];

	$PRICE = $_GET['PRICE'];	

	$STATUS = $_GET['STATUS'];

	$DATE = get_timee("Canada","Mississauga");

	$DESCRIPTION = $_GET['DESCRIPTION'];

	

	$FOODS = str_replace('<tbody>','',$FOODS);

	$FOODS = str_replace('</tbody>','',$FOODS);

	//$FOODS = str_replace('</tr>','',$FOODS);

	//$FOODS = str_replace('<td>','<div>',$FOODS);

	//$FOODS = str_replace('</td>','</div>',$FOODS);

	$FOODS = '<table>' . $FOODS . '</table>';

	

	

	$query = "insert into bill(CUSTOMER,PHONE,ADDRESS,FOODS,PRICE,DATE,STATUS,DESCRIPTION) values('$CUSTOMER', '$PHONE', '$ADDRESS', '$FOODS','$PRICE','$DATE','$STATUS','$DESCRIPTION');";

	$result = tep_db_query($query);

	if($result == 1)

		echo "Your transaction is success!";

	else

		echo "There is problem with our transaction!<br>Please try it again!";

	

}



?>
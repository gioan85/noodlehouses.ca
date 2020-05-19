
<?php
//  minhtri95@yahoo.com

require_once("includes/application_top.php");
	$start = $_POST['start'];
	$pagesize = $_POST['pagesize'];
	$MENU = $_POST['MENU'];
	
	function load_products($MENU)
	{
		$food = tep_db_query("select * from foods where foods.MENU = '" . $MENU . "'");
		mysql_query("SET character_set_results=utf8");
		if($food != null)
		{
			while($row = tep_db_fetch_array($food))
			{
				echo '<tr>';
				echo '<td>' . $row['KEY'] . '</td>';
				echo '<td>' . $row['NAME'] . '</td>';
				echo '<td>' . $row['PRICE'] . '</td>';
				echo '<td>' . substr($row['DESCRIPTION'], 0 , 255) . '</td>';
				echo '<td id="'.$row['ID'].'"><a href="javascript:void(0)" onclick="delete_food(' . $row['ID'] . ')">Delete</a> &nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="update_food('."'".$row['ID']. "','".$row['KEY']."',"."'".$row['NAME']."'".','."'".$row['PRICE']."'".','."'".$row['DESCRIPTION']."'".')">Update</a></td>';
				echo '</tr>';
			}
		}
		else
		{
			echo '<tr>';
			echo '<td>...</td>';
			echo '<td>...</td>';
			echo '<td>...</td>';
			echo '<td>...</td>';
			echo '<td></td>';
			echo '</tr>';
		}
		
	}
	
	if($_POST['action'] == 'load_food')
	{		
		load_products($MENU);
	}
	
		
	if($_POST['action']=='delete_food')
	{
		$food_id = $_POST['food_id'];
		tep_db_query("delete from foods where ID = " . $food_id . ";");
		load_products($MENU);
	}
	
	if($_POST['action'] == 'add_food')
	{
		$MENU = $_POST['menu_id'];
		$KEY = $_POST['food_key'];
		$NAME = $_POST['food_name'];
		$PRICE = $_POST['food_price'];
		$DESCRIPTION = $_POST['description'];
		$query = "insert into foods(foods.NAME,foods.DESCRIPTION,foods.MENU,foods.PRICE,foods.KEY) values('$NAME', '$DESCRIPTION', '$MENU', '$PRICE', '$KEY');";
		
		$result = tep_db_query($query);
		if($result == 1)
			echo "Add new food success!";
		else
			echo "Add new food fail!";
	}

	if($_POST['action']== 'search_product')
	{
		$content = $_POST['content'];
		$product = '';
		$product = tep_db_query("select * from products where NAME like '$content%' or NAME like '%$content' or NAME like '%$content%' or DESCRIPTION like '$content%' or DESCRIPTION like '%$content' or DESCRIPTION like '%$content%';");
		if(tep_db_num_rows($product) >0)
		{
			mysql_query("SET character_set_results=utf8");
			echo '<table border="1" cellpadding="0" cellspacing="0" width="100%" class="grid">';
			while($row = tep_db_fetch_array($product))
			{
				echo '<tr>';
				echo '<td width= "30%" valign= "top">' . $row['NAME'] . '</td>';
				echo '<td valign= "top">' . substr($row['DESCRIPTION'], 0 , 255) . '...</td>';
				echo '<td width="100" valign= "top"><a href="javascript:void(0)" onclick="delete_product(' . $row['ID'] . ','.$start.','.$pagesize.')">Xóa</a> &nbsp;&nbsp;&nbsp;<a href="update_product.php?product_id=' . $row['ID'] . '">Sửa</a></td>';
			}
			echo '</table>';
		}
		else
		{
			echo 'Không tìm thấy sản phẩm';
		}
		
	}
	
	if($_POST['action'] == 'update_food')
	{
		$ID = $_POST['food_id'];
		$KEY = $_POST['food_key'];
		$NAME = $_POST['food_name'];
		$DESCRIPTION = str_replace('&','and',$_POST['description']);
		$MENU_ID = $_POST['menu_id'];
		$PRICE = $_POST['food_price'];
		tep_db_query("update foods set foods.NAME ='" .$NAME. "', foods.DESCRIPTION = '" . $DESCRIPTION . "', foods.PRICE ='".$PRICE."', foods.MENU = '".$MENU_ID."', foods.KEY = '" .$KEY. " ' where foods.ID = '" . $ID . "' ;");
		echo 'Updated successfull!';
	}
	
	
	
?> 
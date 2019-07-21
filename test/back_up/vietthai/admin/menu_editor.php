
<?php
//  minhtri95@yahoo.com

require_once("includes/application_top.php");
	$start = $_POST['start'];
	$pagesize = $_POST['pagesize'];
	
	
	function load_menu()
	{
		$menu = tep_db_query("select * from menu");
		mysqli_query("SET character_set_results=utf8");
		if($menu != null)
		{
			while($row = tep_db_fetch_array($menu))
			{
				echo '<tr>';
				echo '<td>' . $row['NAME'] . '</td>';
				echo '<td>' . $row['RATE'] . '</td>';
				echo '<td id="'.$row['ID'].'"><a href="javascript:void(0)" onclick="delete_menu(' . $row['ID'] . ')">Delete</a> &nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="update_menu('.$row['ID'].','."'".$row['NAME']."'".','."'".$row['RATE']."'".')">Update</a></td>';
				echo '</tr>';
			}
		}
		else
		{
			echo '<tr>';
			echo '<td>...</td>';
			echo '<td></td>';
			echo '</tr>';
		}
		
	}
	
	if($_POST['action'] == 'load_menu')
	{		
		load_menu();
	}
	
		
	if($_POST['action']=='delete_menu')
	{
		$menu_id = $_POST['menu_id'];
		tep_db_query("delete from menu where ID = " . $menu_id . ";");
		load_menu();
	}
	
	if($_POST['action'] == 'add_menu')
	{
		$NAME = $_POST['menu_name'];
		$RATE = $_POST['menu_rate'];
		$query = "insert into menu(NAME,RATE) values('$NAME','$RATE');";
		
		$result = tep_db_query($query);
		if($result == 1)
			echo "Add new menu success!";
		else
			echo "Add new menu fail!";
	}

	if($_POST['action']== 'search_product')
	{
		$content = $_POST['content'];
		$product = '';
		$product = tep_db_query("select * from products where NAME like '$content%' or NAME like '%$content' or NAME like '%$content%' or DESCRIPTION like '$content%' or DESCRIPTION like '%$content' or DESCRIPTION like '%$content%';");
		if(tep_db_num_rows($product) >0)
		{
			mysqli_query("SET character_set_results=utf8");
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
	
	if($_POST['action'] == 'update_menu')
	{
		$ID = $_POST['menu_id'];
		$NAME = $_POST['menu_name'];
		$RATE = $_POST['menu_rate'];
		tep_db_query("update menu set NAME ='" .$NAME. "', RATE = '".$RATE."' where ID = '" . $ID . "' ;");
		echo 'Updated successfull!';
	}
	
	
	
?> 